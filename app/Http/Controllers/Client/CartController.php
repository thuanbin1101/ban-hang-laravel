<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductTag;
use App\Models\Tag;
use App\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    private Product $product;
    private CartService $cartService;

    public function __construct(CartService $cartService, Product $product)
    {
        $this->product = $product;
        $this->cartService = $cartService;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request, $id)
    {
        $result = $this->cartService->create($request, $id);
        if ($result) {
            return response()->json([
                'code' => 200,
                'message' => 'Success'
            ]);
        }
        return response()->json([
            'code' => 500,
            'message' => Session::get('error')
        ], 500);

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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show()
    {
        $carts = Session::get('carts');
        $products = $this->cartService->getProduct();
        $totalPrice = 0;
        foreach ($products as $each) {
            $totalPrice += (int)$each->price * $carts[$each->id];
        }
        return view('client.cart', [
            'products' => $products,
            'carts' => $carts,
            'totalPrice' => $totalPrice
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->cartService->updateCart($request);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request)
    {
        return $this->cartService->deleteCart($request);
    }


}
