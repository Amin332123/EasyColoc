<?php

namespace App\Http\Controllers;

use App\Models\Colocation;
use App\Models\invitation;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $users = User::all()->where('role_id', '!=', 1);
        $collocations = Colocation::count();
        $activeColls = Colocation::where('status', 'active')->count();


       
        $invitations = Invitation::where('user_id', auth()->id())
            ->with('sender', 'colocation') 
            ->where('status', 'pending')
            ->get();

        return view('dashboard', compact('users', 'collocations', 'activeColls', 'invitations'));
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
        //
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

    public function banUser($userID)
    {
        $user = User::find($userID);
        $user->is_banned = 1;
        $user->save();

        return redirect()->route('dashboard');
    }
    public function UnbanUser($userID)
    {
        $user = User::find($userID);
        $user->is_banned = 0;
        $user->save();
        return redirect()->route('dashboard');

    }
}
