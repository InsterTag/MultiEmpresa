<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PaymentCard extends Model {
    use HasFactory;
    protected $fillable = ['card_number', 'holder_name', 'expiry', 'cvv', 'card_type', 'balance', 'user_id'];

    public function user() {
        return $this->belongsTo(User::class);
    }
}