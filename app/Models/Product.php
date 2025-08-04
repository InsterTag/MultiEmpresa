<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model {
    use HasFactory;
    protected $fillable = [
        'branch_id', 'name', 'description', 'barcode', 'unit_price', 'media', 'state'
    ];

    public function branch() {
        return $this->belongsTo(Branch::class);
    }

    public function reviews() {
        return $this->hasMany(Review::class);
    }

    public function stocks() {
        return $this->hasMany(Stock::class);
    }

    public function categories() {
        return $this->belongsToMany(Category::class, 'characteristic_category_product')
                    ->withPivot('characteristic_id');
    }

    public function characteristics() {
    return $this->belongsToMany(Characteristic::class, 'characteristic_category_product')->withTimestamps();
    }


    // Accesor para la URL de la imagen
    public function getImageUrlAttribute()
    {
        return $this->media ? asset('storage/' . $this->media) : asset('images/default-product.png');
    }
    
}