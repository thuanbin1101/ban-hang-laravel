<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductAddRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    private Product $product;
    private Category $category;

    public function __construct(Product $product, Category $category)
    {
        $this->product = $product;
        $this->category = $category;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->product::query()->latest()->paginate(5);
        return view('admin.products.index', [
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->category::all();
        return view('admin.products.create', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductAddRequest $request)
    {
        $dataProductCreate = [
            'name' => $request->get('name'),
            'content' => $request->get('content'),
            'price' => $request->get('price'),
            'category_id' => $request->get('category_id'),
//            'user_id' => auth()->id(),
            'user_id' => 31,

        ];
        $file = $request->file('feature_image_path');
        $fileNameOrigin = $file->getClientOriginalName();
        $fileNameHash = Str::random(20) . "." . $file->getClientOriginalExtension();
//        $filePath = $file->storeAs('public/products/' . auth()->id(), $fileNameHash);
        $filePath = $file->storeAs('public/products/', $fileNameHash);
        $dataFile = [
            'file_name' => $fileNameOrigin,
            'file_path' => Storage::url($filePath)
        ];
        if (!empty($dataFile)) {
            $dataProductCreate['feature_image_path'] = $dataFile['file_path'];
        }
        $this->product::query()->create($dataProductCreate);
        return redirect()->route('products.create')->with('success', "Successfully Added");
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->product->query()->find($id);
        $categories = $this->category::all();
        return view('admin.products.edit', [
            'product' => $product,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dataProductUpdate = [
            'name' => $request->get('name'),
            'content' => $request->get('content'),
            'price' => $request->get('price'),
            'category_id' => $request->get('category_id'),
//            'user_id' => auth()->id(),
            'user_id' => 31,
        ];
        if($request->hasFile('feature_image_path')){
            $file = $request->file('feature_image_path');
            $fileNameOrigin = $file->getClientOriginalName();
            $fileNameHash = Str::random(20) . "." . $file->getClientOriginalExtension();
//            $filePath = $file->storeAs('public/products/' . auth()->id(), $fileNameHash);
            $filePath = $file->storeAs('public/products/', $fileNameHash);

            $dataFile = [
                'file_name' => $fileNameOrigin,
                'file_path' => Storage::url($filePath)
            ];
            if (!empty($dataFile)) {
                $dataProductUpdate['feature_image_path'] = $dataFile['file_path'];
            }
        }
        $this->product::query()->find($id)->update($dataProductUpdate);
        return redirect()->route('products.index')->with('success', "Successfully Edited");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->product::query()->find($id)->delete();
        return redirect()->route('products.index')->with('success', "Successfully Deleted");

    }
}
