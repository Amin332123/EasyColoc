<?php

namespace App\Http\Controllers;

use App\Http\Requests\handleInvitationRequest;
use App\Models\invitation;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Membership;

class InvitationController extends Controller
{





    public function send(handleInvitationRequest $invitation)
    {


        $user = User::where('email', $invitation->email)->first();


        if (!$user) {
            return redirect()->route('collocation.show')->with('error', 'this email does not exists in the app');
        }

        $membership = auth()->user()->Memberships()->whereHas('colocation', function ($q) {
            $q->where('status', 'active');
        })->first();


        $colocation = $membership->colocation;



        $alredyExists = Membership::where('user_id', $user->id)->whereHas('colocation', function ($q) {
            $q->where('status', 'active');
        })->exists();


        if ($alredyExists) {
            return redirect()->route('collocation.show')->with('error', 'the email you are requesting is alredy in a house');
        }



        invitation::create([
            'user_id' => $user->id,
            'sender_id' => auth()->id(),
            'type' => 'invite_sent',
            'status' => 'pending',
            'colocation_id' => $colocation->id
        ])
        ;

        return redirect()->route('collocation.show')->with('success', 'invitation sent successfully');
    }





    public function accept($id)
    {
        $invite = Invitation::findOrFail($id);
        $user = auth()->user();
        if ($invite->user_id !== auth()->id()) {
           abort(403);
       }
        $colocation = $invite->colocation;

        $checkIfIsJoined = $user->Memberships()
            ->whereHas('colocation', function ($q) {
                $q->where('status', 'active');
            })->first();

        if ($checkIfIsJoined) {
            if ($checkIfIsJoined->colocation->id == $colocation->id) {

                if ($invite->status === 'pending') {
                    $invite->update(['status' => 'accepted']);
                }
                return redirect()->route('dashboard')
                    ->with('error', 'You are already joined in this colocation');
            }
            return redirect()->route('dashboard')
                ->with('error', 'You are already joined in a colocation');
        }


        Membership::create([
            'user_id' => auth()->id(),
            'colocation_id' => $invite->colocation_id,
            'status' => 'active'
        ]);

        $invite->update(['status' => 'accepted']);

        return redirect()->route('collocation.show')->with('success', 'You have joined the house!');
    }





    public function decline($id)
    {
        $invite = Invitation::findOrFail($id);
        if ($invite->user_id !== auth()->id()) {
            abort(403);
        }
        $invite->update(['status' => 'declined']);
        return redirect()->route('dashboard')->with('success', 'Invitation declined');
    }

}
