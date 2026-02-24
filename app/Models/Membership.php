<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    /** @use HasFactory<\Database\Factories\MembershipFactory> */
    use HasFactory;
    protected $fillable = ['user_id', 'colocation_id', 'role', 'joined_at', 'left_at'];




    public function User() {
        return $this->belongsTo(User::class);
    }

    public function Colocation() {
        return $this->BelongsTo(Colocation::class);
    }



}
