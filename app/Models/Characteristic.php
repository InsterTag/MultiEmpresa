<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Characteristic extends Model {
    use HasFactory;
    protected $fillable = [
        'name', 'brand', 'model', 'size', 'weight', 'material', 'dimensions', 'origin'
    ];

    public function products() {
        return $this->belongsToMany(Product::class, 'characteristic_category_product')
                    ->withPivot('category_id');
    }
    public function categories() {
    return $this->belongsToMany(Category::class, 'characteristic_category_product')->withTimestamps();
}
}