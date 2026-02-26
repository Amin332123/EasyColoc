<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreExpenseRequest;
use App\Models\Categorie;
use App\Models\Expense;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Payment;
class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

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
    public function store(StoreExpenseRequest $request)
    {
        $user = auth()->user();
        $membership = auth()->user()->memberships()->first();

        $colocation = $membership->colocation;

        $expense = Expense::create([
            'amount' => $request->amount,
            'colocation_id' => $colocation->id,
            'payer_id' => $request->payer,
            'payment_status' => 'unpaid',
            'user_id' => $user->id,
            'categorie_id' => $request->category,
        ]);

        $userIds = $colocation->memberships()->pluck('user_id');
        
        $share = $request->amount / $userIds->count();
        foreach ($userIds as $id) {
            Payment::create([
                'user_id' => $id,
                'expense_id' => $expense->id,
                'amount' => $share,
                'status' => ($id == $request->payer) ? 'paid' : 'unpaid'
            ]);
        }

        return redirect()->back()->with('success', 'Expense added and split successfully!');
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
