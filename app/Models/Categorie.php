<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    /** @use HasFactory<\Database\Factories\CategorieFactory> */
    use HasFactory;


    protected $fillable = [
        'name'
    ];


    public function Colocation() {
        return $this->belongsTo(Colocation::class);
    }


    public function Expenses() {
        return $this->hasMany(Expense::class);
    }
}
