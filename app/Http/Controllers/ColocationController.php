<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ColocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
        return view('collocation', compact('userCollocation', 'TotalExpenses', 'individualExpenses', 'balance', 'membersNumber', 'expenses'));
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
    public function store(Request $request)
    {

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
}
