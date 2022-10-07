<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['name','parent_id','slug'];
    public function getChildren(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Category::class,'parent_id');
    }
    public function getParents(): \Illuminate\Database\Eloquent\Collection|array
    {
        return $this->query()->whereNull('parent_id')->with('getChildren')->get(['id','name']);
    }

    public function getProducts(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Product::class,'category_id', 'id');
    }
}
