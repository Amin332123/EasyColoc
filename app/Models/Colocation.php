<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colocation extends Model
{
    /** @use HasFactory<\Database\Factories\ColocationFactory> */
    use HasFactory;
    protected $fillable = [
        'name', 
        'status', 
        'token'
    ];


    public function Memberships() {
        return $this->hasMany(Membership::class);
    }


    public function categories() {
        return $this->hasMany(Categorie::class);
    }

     public function Expenses() {
        return $this->hasMany(Expense::class);
    }
}
