<?php

namespace App\Http\Controllers\Admin;

use App\Components\CategoryRecursive;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductAddRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductTag;
use App\Models\Tag;
use App\Traits\StorageImageTrait;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    use StorageImageTrait;

    private Product $product;
    private Category $category;
    private ProductImage $productImage;
    private Tag $tag;
    private ProductTag $productTag;

    public function __construct(ProductTag $productTag, Tag $tag, Product $product, Category $category, ProductImage $productImage)
    {
        $this->tag = $tag;
        $this->productTag = $productTag;
        $this->product = $product;
        $this->category = $category;
        $this->productImage = $productImage;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $products = $this->product::query()->latest()->paginate(5);
        return view('admin.products.index', [
            'products' => $products
        ]);
    }

    public function getCategory($parentId)
    {
        $data = $this->category::all();
        $recursive = new CategoryRecursive($data);
        return $recursive->categoryRecursive($parentId);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $htmlOptionCategory = $this->getCategory("");
        return view('admin.products.create', [
            'htmlOptionCategory' => $htmlOptionCategory
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $dataProductCreate = [
                'name' => $request->get('name'),
                'content' => $request->get('content'),
                'price' => $request->get('price'),
                'amount' => $request->get('amount'),
                'category_id' => $request->get('category_id'),
                'user_id' => auth()->id(),
            ];
            $dataFileImage = $this->storageTraitUpload($request, "feature_image_path", "products");
            if (!empty($dataFileImage)) {
                $dataProductCreate['feature_image_path'] = $dataFileImage['file_path'];
                $dataProductCreate['feature_image_name'] = $dataFileImage['file_name'];
            }
            $productCreate = $this->product::query()->create($dataProductCreate);

            if ($request->hasFile('image_path')) {
                foreach ($request->file('image_path') as $each) {
                    $dataProductImage = $this->storageTraitUploadMultiple($each, 'products');
                    $productCreate->images()->create([
                        'image_path' => $dataProductImage['file_path'],
                        'image_name' => $dataProductImage['file_name'],
                    ]);
                }
            }

            // insert tags
            if (!empty($request->get('tags'))) {
                $tags = $request->get('tags');
                foreach ($tags as $tag) {
                    $tagInstance = $this->tag::query()->firstOrCreate([
                        'name' => $tag
                    ]);
                    $tagIds[] = $tagInstance->id;
                }
                $productCreate->tags()->attach($tagIds);
            }
            DB::commit();
            return redirect()->route('products.create')->with('success', "Successfully Added");
        } catch (Exception $e) {
            DB::rollBack();
            Log::error("Message: {$e->getMessage()}. Line: {$e->getLine()}");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $product = $this->product->query()->find($id); // tim san pham co ID la 1
        $htmlOptionCategory = $this->getCategory($product->category_id);
        return view('admin.products.edit', [
            'product' => $product,
            'htmlOptionCategory' => $htmlOptionCategory
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $dataProductUpdate = [
                'name' => $request->get('name'),
                'content' => $request->get('content'),
                'amount' => $request->get('amount'),
                'price' => $request->get('price'),
                'category_id' => $request->get('category_id'),
                'user_id' => auth()->id(),
            ];
            $dataFileImage = $this->storageTraitUpload($request, "feature_image_path", "products");
            if (!empty($dataFileImage)) {
                $dataProductUpdate['feature_image_path'] = $dataFileImage['file_path'];
                $dataProductUpdate['feature_image_name'] = $dataFileImage['file_name'];
            }
            $this->product::query()->find($id)->update($dataProductUpdate);
            $product = $this->product::query()->find($id);

            if ($request->hasFile('image_path')) {
                $this->productImage::query()->where('product_id', $id)->delete();
                foreach ($request->file('image_path') as $each) {
                    $dataProductImage = $this->storageTraitUploadMultiple($each, 'products');
                    $product->images()->create([
                        'image_path' => $dataProductImage['file_path'],
                        'image_name' => $dataProductImage['file_name'],
                    ]);
                }
            }

            // insert tags
            if (!empty($request->get('tags'))) {
                $tags = $request->get('tags');
                foreach ($tags as $tag) {
                    $tagInstance = $this->tag::query()->firstOrCreate([
                        'name' => $tag
                    ]);
                    $tagIds[] = $tagInstance->id;
                }
                $product->tags()->sync($tagIds);
            }
            DB::commit();
            return redirect()->route('products.index')->with('success', "Successfully Edited");
        } catch (Exception $e) {
            DB::rollBack();
            Log::error("Message: {$e->getMessage()}. Line: {$e->getLine()}");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        try {
            $this->product::query()->find($id)->delete();
            return response()->json(['code' => 200, 'message' => "Success"]);
        } catch (Exception $e) {
            return response()->json(['code' => 500, 'message' => "Fail"], 500);
            Log::error("Message: {$e->getMessage()}. Line: {$e->getLine()}");
        }
    }
}
