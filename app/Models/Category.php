<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model {
    use HasFactory;
    protected $fillable = ['name'];

    public function products() {
        return $this->belongsToMany(Product::class, 'characteristic_category_product')
                    ->withPivot('characteristic_id');
    }
    public function characteristics() {
    return $this->belongsToMany(Characteristic::class, 'characteristic_category_product')->withTimestamps();
}
}
