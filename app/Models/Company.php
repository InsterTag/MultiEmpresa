<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable = [
    'user_id',
    'name',
    'nit',
    'website',
    'email',
    'address',
    'phone',
    ];


    public function user() {
        return $this->belongsTo(User::class);
    }

    public function branches() {
        return $this->hasMany(Branch::class);
    }

    public function warehouses() {
        return $this->hasMany(Warehouse::class);
    }
}
