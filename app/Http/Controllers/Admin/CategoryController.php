<?php

namespace App\Http\Controllers\Admin;

use App\Components\Recursive;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{

    private Category $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->category::query()->latest()->paginate(5);
        return view('admin.categories.index', [
            'categories' => $categories
        ]);
    }


    public function create()
    {
        $htmlOptionCategory = $this->getCategory();
        return view('admin.categories.create', [
            'htmlOptionCategory' => $htmlOptionCategory
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $this->category->query()->create([
            'name' => $request->get('name'),
            'parent_id' => $request->get('parent_id'),
            'slug' => Str::slug($request->get('name'))
        ]);
        return redirect()->route('categories.create')->with('success', "Successfully Added");
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

    public function getCategory($parentId = '')
    {
        $data = Category::all();
        $recursive = new Recursive($data);
        return $recursive->categoryRecursive($parentId);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = $this->category->query()->find($id);
        $htmlOptionCategory = $this->getCategory($category->parent_id);
        return view('admin.categories.edit', [
            'category' => $category,
            'htmlOptionCategory' => $htmlOptionCategory
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
        $category = $this->category->query()->find($id);
        $category->update([
            'name' => $request->get('name'),
            'parent_id' => $request->get('parent_id'),
            'slug' => Str::slug($request->get('name'))
        ]);
        return redirect()->route('categories.index')->with('success', "Successfully Edited");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->category->query()->find($id)->delete();
        return redirect()->route('categories.index')->with('success', "Successfully Deleted");

    }
}