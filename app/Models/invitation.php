<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invitation extends Model
{
    /** @use HasFactory<\Database\Factories\InvitationFactory> */
    use HasFactory;


    protected $fillable = [
        'sender_id',
        'user_id',
        'type',
        'colocation_id',
        'status'
    ];






    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'user_id');
    }



    public function colocation()
    {
        return $this->belongsTo(Colocation::class);
    }
}
