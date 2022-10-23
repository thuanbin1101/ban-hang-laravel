<?php

namespace App\View\Composers;

use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class CartComposer
{

    public function __construct()
    {
    }


    public function compose(View $view)
    {
        $carts = Session::get('carts');
        if (is_null($carts)) {
            return [];
        }
        $productIds = array_keys($carts);
        $products = Product::query()
            ->select(['id', 'name', 'price', 'quantity', 'feature_image_path'])
            ->whereIn('id', $productIds)
            ->get();
        $view->with('products', $products);
        $view->with('carts', $carts);
    }
}
