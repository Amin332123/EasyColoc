<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Membership;
use Symfony\Component\CssSelector\Node\FunctionNode;
class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'reputation_score',
        'is_banned'
    ];


    public function Memberships()
    {
        return $this->hasMany(Membership::class);
    }

    public function Role()
    {
        return $this->belongsTo(Role::class);
    }

    public function Expenses()
    {
        return $this->hasMany(Expense::class);
    }


    public function invitations()
    {
        return $this->hasMany(invitation::class);
    }

    public function payments()
    {

        return $this->belongsToMany(Expense::class, 'payments')
            ->withPivot('amount', 'status')
            ->withTimestamps();
    }







    public function getBalance()
    {
        // Use $this->id to refer to the specific user instance
        $userId = $this->id;

        $moneyIWillReceive = Payment::whereHas('expense', function ($q) use ($userId) {
            $q->where('payer_id', $userId);
        })
            ->where('user_id', '!=', $userId)
            ->where('status', 'unpaid')
            ->sum('amount');

        $moneyIWillGive = Payment::where('user_id', $userId)
            ->where('status', 'unpaid')
            ->whereHas('expense', function ($q) use ($userId) {
                $q->where('payer_id', '!=', $userId);
            })
            ->sum('amount');

        return $moneyIWillReceive - $moneyIWillGive;
    }


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
