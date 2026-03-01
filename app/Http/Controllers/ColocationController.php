<?php

namespace App\Http\Controllers;

use App\Http\Requests\JoinColocationRequest;
use App\Http\Requests\StoreColocationRequest;
use App\Models\Colocation;
use App\Models\Membership;
use App\Models\Payment;
use App\Models\User;
use App\Models\Categorie;
use Carbon\Traits\Timestamp;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
class ColocationController extends Controller
{
    public function index()
    {






        $user = auth()->user();
        $ActiveMemberShip = $user->memberships()
            ->whereNull('left_at')
            ->whereHas('colocation', function ($query) {
                $query->where('status', 'active');
            })->first();



        if (!$ActiveMemberShip) {
            return redirect()->route('dashboard')->with('error', 'You are not in an active house yet.');
        }
        if ($ActiveMemberShip->left_at != NULL) {
            return redirect()->route('dashboard')->with('error', 'you alredy left the colocation . ');
        }
        $userCollocation = $ActiveMemberShip->colocation;
        $TotalExpenses = $ActiveMemberShip->colocation->Expenses()->sum('amount');
        $membersNumber = $userCollocation->Memberships()->count();
        $individualExpenses = $TotalExpenses / $membersNumber;

        $expenses = $userCollocation->expenses()->with('user', 'categorie')->get();

        $balance = $user->getBalance();
        $roommates = $userCollocation->memberships()->with('user')->get()->pluck('user');
        $categories = $userCollocation->categories()->get();

        $finalDebts = [];
        $processedPairs = [];

        foreach ($roommates as $userA) {
            foreach ($roommates as $userB) {
                if ($userA->id == $userB->id)
                    continue;

                $pairKey = min($userA->id, $userB->id) . '-' . max($userA->id, $userB->id);
                if (in_array($pairKey, $processedPairs))
                    continue;
                $aOwesB = Payment::where('user_id', $userA->id)
                    ->where('status', 'unpaid')
                    ->whereHas('expense', fn($q) => $q->where('payer_id', $userB->id))
                    ->sum('amount');

                $bOwesA = Payment::where('user_id', $userB->id)
                    ->where('status', 'unpaid')
                    ->whereHas('expense', fn($q) => $q->where('payer_id', $userA->id))
                    ->sum('amount');

                if ($aOwesB > $bOwesA) {
                    $finalDebts[] = [
                        'from' => $userA,
                        'to' => $userB,
                        'amount' => $aOwesB - $bOwesA
                    ];
                } elseif ($bOwesA > $aOwesB) {
                    $finalDebts[] = [
                        'from' => $userB,
                        'to' => $userA,
                        'amount' => $bOwesA - $aOwesB
                    ];
                }

                $processedPairs[] = $pairKey;
            }
        }
        return view('collocation', compact('userCollocation', 'TotalExpenses', 'individualExpenses', 'balance', 'membersNumber', 'expenses', 'finalDebts', 'roommates', 'categories', 'ActiveMemberShip'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }



    public function store(StoreColocationRequest $request)
    {
        $user = auth()->user();
        $isAlreadyInHouse = $user->memberships()->whereNull('left_at')->exists();

        if ($isAlreadyInHouse) {
            return redirect()->route('dashboard')->with('error', 'You are already in a colocation. You should Leave it to join this one');
        }

        $colocation = Colocation::create([
            'name' => $request->name,
            'token' => hash('sha256', Str::random(8)),
            'status' => 'active',
        ]);

        Membership::create([
            'user_id' => $user->id,
            'colocation_id' => $colocation->id,
            'role' => 'owner',
        ]);
        return redirect()->route('collocation.show', $colocation->id)->with('success', 'House created successfully');
    }
    public function join(JoinColocationRequest $request)
    {
        $user = auth()->user();
        $colocation = Colocation::where('token', $request->token)->first();

        if (!$colocation) {
            return redirect()->back()->with('error', 'Invalid token.');
        }
        $activeInAnyHouse = $user->memberships()->whereNull('left_at')->first();

        if ($activeInAnyHouse) {
            if ($activeInAnyHouse->colocation_id == $colocation->id) {
                return redirect()->route('collocation.show', $colocation->id)->with('success', 'You are already here!');
            }
            return redirect()->route('dashboard')->with('error', 'You must leave your current house first.');
        }

        $hasHistoryWithThisHouse = $user->memberships()
            ->where('colocation_id', $colocation->id)
            ->whereNotNull('left_at')
            ->exists();

        if ($hasHistoryWithThisHouse) {
            return redirect()->route('dashboard')->with('error', 'You already left this house. You cannot join it again .');
        }

        Membership::create([
            'user_id' => $user->id,
            'colocation_id' => $colocation->id,
            'role' => 'member',
        ]);
        return redirect()->route('collocation.show', $colocation->id)->with('success', 'Welcome to your new house');
    }

    public function leave($id)
    {
        $user = User::findOrFail($id);

        $ActiveMembership = Membership::where('user_id', $user->id)
            ->whereNull('left_at')
            ->whereHas('colocation', function ($q) {
                $q->where('status', 'active');
            })->first();


        if (!$ActiveMembership || $ActiveMembership->role === 'owner') {
            return redirect()->back()->with('error', 'You cant leave');
        }

        $colocation = $ActiveMembership->colocation;

        $owner = User::whereHas('memberships', function ($q) use ($colocation) {
            $q->where('colocation_id', $colocation->id)
                ->where('role', 'owner')
                ->whereNull('left_at');
        })->first();

        if ($owner) {

            $colocation->expenses()
                ->where('payer_id', $user->id)
                ->update(['payer_id' => $owner->id]);
            Payment::where('user_id', $user->id)
                ->update(['user_id' => $owner->id]);
        }

        $ActiveMembership->update([
            'left_at' => now()->format('Y-m-d H:i:s'),
        ]);
        $balance = $user->getBalance();

        if ($balance >= 0) {
            $user->increment('reputation_score');
        } else {
            $user->decrement('reputation_score');
        }

        return redirect()->route('dashboard')->with('success', 'You have left the colocation.');
    }

    // ----- category helpers -----
    public function storeCategory(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255']);

        $user = auth()->user();
        $membership = $user->memberships()
            ->whereNull('left_at')
            ->whereHas('colocation', fn($q) => $q->where('status', 'active'))
            ->first();

        if (!$membership) {
            return redirect()->back()->with('error', 'Not in a colocation');
        }

        Categorie::create([
            'name' => $request->name,
            'colocation_id' => $membership->colocation_id,
        ]);

        return redirect()->back()->with('success', 'Category created');
    }

    public function destroyCategory($id)
    {
        $user = auth()->user();
        $membership = $user->memberships()
            ->whereNull('left_at')
            ->whereHas('colocation', fn($q) => $q->where('status', 'active'))
            ->first();

        $category = Categorie::findOrFail($id);
        if (!$membership || $category->colocation_id !== $membership->colocation_id) {
            abort(403);
        }

        $category->delete();
        return redirect()->back()->with('success', 'Category removed');
    }



}