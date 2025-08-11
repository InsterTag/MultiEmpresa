<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{

    use HasFactory;
    protected $fillable = [
    'name',
    'last_name',
    'document_type',
    'document',
    'phone',
    'address',
    'email',
    'password',
    'username',
];



    public function roles()
    {
    return $this->belongsToMany(Role::class, 'role_user')
                ->using(RoleUser::class)
                ->withTimestamps();
    }

    public function company() {
        return $this->hasOne(Company::class);
    }

    public function carts() {
        return $this->hasMany(Cart::class);
    }

    public function orders() {
        return $this->hasMany(Order::class);
    }

    public function paymentCards() {
        return $this->hasMany(PaymentCard::class);
    }

    public function reviews() {
        return $this->hasMany(Review::class);
    }

    public function invoices() {
        return $this->hasMany(Invoice::class);
    }



































    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
