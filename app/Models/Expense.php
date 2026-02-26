<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    /** @use HasFactory<\Database\Factories\ExpenseFactory> */
    use HasFactory;
    protected $fillable = ['user_id', 'payer_id', 'amount', 'categorie_id', 'colocation_id'];


    public function Colocation()
    {
        return $this->belongsTo(Colocation::class);
    }

    public function Categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function payer()
    {
        return $this->belongsTo(User::class, 'payer_id');
    }


    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'payments')
            ->withPivot('amount', 'status')
            ->withTimestamps();
    }





}
