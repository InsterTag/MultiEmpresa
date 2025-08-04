<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Warehouse extends Model {
    use HasFactory;
    protected $fillable = ['company_id', 'name', 'address', 'email', 'phone'];

    public function company() {
        return $this->belongsTo(Company::class);
    }

    public function purchaseRequests() {
        return $this->hasMany(PurchaseRequest::class);
    }
}