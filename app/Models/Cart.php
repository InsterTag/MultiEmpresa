<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model {
    use HasFactory;
    protected $fillable = ['user_id', 'status'];
    protected $casts = ['status' => 'string'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function products() {
        return $this->belongsToMany(Product::class)->withPivot('quantity')->using(CartProduct::class);
    }

    public function order() {
        return $this->hasOne(Order::class);
    }

        /**
     * Obtener el carrito activo del usuario.
     */
    public static function getActiveCart($userId)
    {
        return self::firstOrCreate([
            'user_id' => $userId,
            'status' => 'pending'
        ]);
    }

    /**
     * Calcular el total del carrito.
     */
    public function getTotalAttribute()
    {
        return $this->products->sum(function($product) {
            return $product->price * $product->pivot->quantity;
        });
    }

    /**
     * Calcular la cantidad total de productos.
     */
    public function getTotalItemsAttribute()
    {
        return $this->products->sum('pivot.quantity');
    }
}
