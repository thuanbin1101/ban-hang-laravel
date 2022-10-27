<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function product()
    {
        return $this->hasOne(Product::class,'id','product_id');
    }
    public function customer(){
        return $this->belongsTo(Customer::class,'id','customer_id');
    }
}
