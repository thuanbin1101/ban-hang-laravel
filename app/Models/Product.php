<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name','content','feature_image_path','price','category_id','user_id'];
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
