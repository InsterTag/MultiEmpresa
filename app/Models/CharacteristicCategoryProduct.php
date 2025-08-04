<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CharacteristicCategoryProduct extends Model
{
    use HasFactory;
    protected $table = 'characteristic_category_product';

    protected $fillable = [
        'product_id',
        'category_id',
        'characteristic_id',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function characteristic()
    {
        return $this->belongsTo(Characteristic::class);
    }
}