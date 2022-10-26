<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\Customer;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use PHPUnit\Exception;

class CartService
{
    public function create($request, $idProduct)
    {
//        Session::forget('carts');
        $productId = (int)$idProduct;
        $quantityProduct = (int)$request->get('quantity_product');
        $product = Product::query()->find($productId);

        if ($quantityProduct <= 0 || $productId <= 0) {
            Session::flash('error', 'Số lượng hoặc sản phẩm không chính xác');
            return false;
        }

        if ($product->quantity <= 0) {
            Session::flash('error', 'Đã hết sản phẩm này, chúng tôi sẽ cập nhật lại sau!');
            return false;
        }

        // KP
        $carts = Session::get('carts');

        // Tạo mới giỏ hàng
        if (is_null($carts)) {
            Session::put('carts', [
                $productId => $quantityProduct
            ]);
            $this->updateQuantity($product, $quantityProduct);
            return true;
        }

        // Tăng số lượng sp khi sp này đã có trong giỏ hàng
        $cartsExists = Arr::exists($carts, $productId);
        if ($cartsExists) {
            $newQuantityProduct = $carts[$productId] + $quantityProduct;
            $carts[$productId] = $newQuantityProduct;
            Session::put('carts', $carts);
            $this->updateQuantity($product, $quantityProduct);
            return true;
        }

        // Thêm mới 1 sp trong giỏ hàng
        $carts[$productId] = $quantityProduct;
        Session::put('carts', $carts);
        $this->updateQuantity($product, $quantityProduct);
        return true;
    }

    public function getProduct()
    {
        $carts = Session::get('carts');
        if (is_null($carts)) {
            return [];
        }
        $productIds = array_keys($carts);
        return Product::query()
            ->select(['id', 'name', 'price', 'quantity', 'feature_image_path'])
            ->whereIn('id', $productIds)
            ->get();
    }

    public function updateCart($request)
    {
        Session::put('carts', $request->get('quantity'));
        return true;
    }

    public function updateQuantity($model, $quantity)
    {
        $quantityUpdate = $model->quantity - $quantity;
        $model->update([
            'quantity' => $quantityUpdate
        ]);
    }

    public function deleteCart($request)
    {
        $idProduct = (int)$request->get('id');
        if ($idProduct) {
            $carts = Session::get('carts');
            unset($carts[$idProduct]);
            Session::put('carts', $carts);
            $products = $this->getProduct();
            $carts = Session::get('carts');
            $cartComponent = view('client.components.cart_component', [
                'products' => $products,
                'carts' => $carts
            ])->render();
            return response()->json([
                'code' => 200,
                'cart_component' => $cartComponent,
                'message' => 'Success'
            ]);
        }
        return response()->json([
            'code' => 500,
            'message' => 'Fail'
        ], 500);
    }

    public function checkout($request)
    {
        try {
            DB::beginTransaction();
            $customerCreate = Customer::query()->create([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'address' => $request->get('address'),
                'phone' => $request->get('phone'),
                'created_at' => Carbon::now('Asia/Ho_Chi_Minh'),
                'updated_at' => Carbon::now('Asia/Ho_Chi_Minh'),
            ]);
            $carts = Session::get('carts');
            $this->infoProductCart($carts, $customerCreate->id);
            Session::forget('carts');
            Session::flash('success', 'Đặt hàng thành công');
            DB::commit();
            return true;

        } catch (Exception $e) {
            DB::rollBack();
            Session::flash('error', 'Đặt hàng lỗi, vui lòng thử lại sau');
            Log::error("Message: {$e->getMessage()}. Line: {$e->getLine()}");
            return false;
        }
    }

    public function infoProductCart($carts, $customer_id)
    {
        $productIds = array_keys($carts);
        $products = Product::query()
            ->select(['id', 'quantity'])
            ->whereIn('id', $productIds)
            ->get();
        $data = array();
        foreach ($products as $each) {
            $data[] = [
                'customer_id' => $customer_id,
                'product_id' => $each->id,
                'quantity' => $carts[$each->id],
            ];
        }
        return Cart::query()->insert($data);
    }


    public function getCustomer()
    {
        return Customer::query()->orderByDesc('id')->paginate(5);
    }

    public function getProductsForCarts($customer)
    {
        return $customer->carts()->with(['product' => function ($query) {
            $query->select('id', 'name', 'feature_image_path', 'price');
        }])->get();
    }
}
