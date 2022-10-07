<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductTag;
use App\Models\Slider;
use App\Models\Tag;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SliderController extends Controller
{
    use StorageImageTrait;

    private Slider $slider;

    public function __construct(Slider $slider)
    {
        $this->slider = $slider;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = $this->slider::query()->latest()->paginate(5);
        return view('admin.sliders.index', [
            'sliders' => $sliders
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $sliderCreate = [
                'name' => $request->get('name'),
                'description' => $request->get('description'),
            ];
            $dataFileImage = $this->storageTraitUpload($request, "image_path", "sliders");
            if (!empty($dataFileImage)) {
                $sliderCreate['image_path'] = $dataFileImage['file_path'];
                $sliderCreate['image_name'] = $dataFileImage['file_name'];
            }
            $this->slider::query()->create($sliderCreate);
            return redirect()->route('sliders.create')->with('success', "Successfully Added");
        } catch (\Exception $e) {
            Log::error("Message: {$e->getMessage()}. Line: {$e->getLine()}");
        }
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
        $slider = $this->slider::query()->find($id);
        return view("admin.sliders.edit", [
            'slider' => $slider
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
        try {
            $sliderUpdate = [
                'name' => $request->get('name'),
                'description' => $request->get('description'),
            ];
            $dataFileImage = $this->storageTraitUpload($request, "image_path", "sliders");
            if (!empty($dataFileImage)) {
                $sliderUpdate['image_path'] = $dataFileImage['file_path'];
                $sliderUpdate['image_name'] = $dataFileImage['file_name'];
            }
            $this->slider::query()->find($id)->update($sliderUpdate);
            return redirect()->route('sliders.index')->with('success', "Successfully Edited");
        } catch (\Exception $e) {
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
            $this->slider::query()->find($id)->delete();
            return response()->json(['code' => 200, 'message' => "Success"]);
        } catch (Exception $e) {
            return response()->json(['code' => 500, 'message' => "Fail"], 500);
            Log::error("Message: {$e->getMessage()}. Line: {$e->getLine()}");
        }
    }
}
