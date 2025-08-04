<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model {
    use HasFactory;
    protected $fillable = ['user_id', 'cart_id', 'payment_card_id', 'total', 'status'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function cart() {
        return $this->belongsTo(Cart::class);
    }

    public function paymentCard() {
        return $this->belongsTo(PaymentCard::class);
    }

    public function products() {
        return $this->belongsToMany(Product::class)->withPivot('quantity', 'unit_price', 'total')->using(OrderProduct::class);
    }

    public function invoice() {
        return $this->hasOne(Invoice::class);
    }
}
