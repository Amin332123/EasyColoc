<?php

namespace App\Http\Controllers;

use App\Http\Requests\JoinColocationRequest;
use App\Http\Requests\StoreColocationRequest;
use App\Models\Colocation;
use App\Models\Membership;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class ColocationController extends Controller
{
    public function index()
    {

        
        $user = auth()->user();
        $ActiveMemberShip = $user->memberships()
            ->whereHas('colocation', function ($query) {
                $query->where('status', 'active');
            })->first();
        if (!$ActiveMemberShip) {
            return redirect()->route('dashboard')->with('error', 'You are not in an active house yet.');
        }
        $userCollocation = $ActiveMemberShip->colocation;
        $TotalExpenses = $ActiveMemberShip->colocation->Expenses()->sum('amount');
        $membersNumber = $userCollocation->Memberships()->count();
        $individualExpenses = $TotalExpenses / $membersNumber;
        $whatIpaid = $ActiveMemberShip->colocation->Expenses()->where('payer_id', auth()->id())->sum('amount');
        $balance = $whatIpaid - $individualExpenses;
        $expenses = $userCollocation->expenses()->with('user', 'categorie')->get();

       

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
        return view('collocation', compact('userCollocation', 'TotalExpenses', 'individualExpenses', 'balance', 'membersNumber', 'expenses', 'finalDebts', 'roommates', 'categories'));
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
    public function store(StoreColocationRequest $request)
    {
        $checkifJoining = auth()->user()->Memberships()->whereHas('colocation', function ($q) {
            $q->where('status', 'active');
        })->first();

        if($checkifJoining) {
            return redirect()->route('dashboard')->with('error', 'You are already joied in  a colocation');
        }

        $colocation = Colocation::create([
            'name' => $request->name,
            'token' => hash('sha256', Str::random(8)),
            'status' => 'active',

        ]);
        Membership::create([
            'user_id' => auth()->id(),
            'colocation_id' => $colocation->id,
            'role' => 'owner',
        ]);
        return redirect()->route('collocation.show')->with('success', 'House created successfully');
        ;
    }

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


    public function join(JoinColocationRequest $request) {
        $user = auth()->user();
        $colocation = Colocation::where('token',$request->token)->first();
        
        $checkIfIsJoined = $user->Memberships()->where('user_id', $user->id)->whereHas('colocation' , function ($q) {
            $q->where('status', 'active');
        })->exists();

        if ($checkIfIsJoined) {  return redirect()->route('dashboard')->with('error', 'You are already joied in  a colocation');     }


        Membership::create([
            'user_id' => $user->id,
            'colocation_id' => $colocation->id,
            'role' => 'member'
        ]);

        return redirect()->route('collocation.show')->with('success', 'welcome to your new house');

    }

    
}
