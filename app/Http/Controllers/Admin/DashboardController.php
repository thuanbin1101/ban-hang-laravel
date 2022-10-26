<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    private Product $product;
    private Customer $customer;
    private Category $category;
    private Role $role;
    private User $user;

    public function __construct(User $user,Role $role,Category $category,Customer $customer,Product $product)
    {
        $this->product = $product;
        $this->customer = $customer;
        $this->category = $category;
        $this->role = $role;
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $productCount = $this->product::query()->count();
        $ordersCount = $this->customer::query()->count();
        $usersCount = $this->user::query()->count();
        $categoriesCount = $this->category::query()->count();
        $rolesCount = $this->role::query()->count();
        $totalPrice = 0;
        $salaries = DB::table('carts')
            ->selectRaw('products.feature_image_path as product_image, products.name as product_name, products.price as product_price, SUM(carts.quantity) as productSold_quantity,SUM(carts.quantity) * products.price as productPrice_sum')
            ->join('products', 'carts.product_id', '=', 'products.id')
            ->groupBy('carts.product_id')
            ->orderByDesc('productSold_quantity')
            ->limit(5)
            ->get();
        foreach ($salaries as $each){
            $totalPrice+=$each->productPrice_sum;
        }

        return view('admin.dashboard.index',[
            'productCount'=>$productCount,
            'ordersCount'=>$ordersCount,
            'rolesCount'=>$rolesCount,
            'categoriesCount'=>$categoriesCount,
            'salaries'=>$salaries,
            'totalPrice'=>$totalPrice,
            'usersCount'=>$usersCount
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
