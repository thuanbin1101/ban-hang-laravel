<?php

namespace App\Http\Controllers\Admin;

use App\Components\MenuRecursive;
use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    private MenuRecursive $menuRecursive;
    private Menu $menu;

    public function __construct(Menu $menu, MenuRecursive $menuRecursive)
    {
        $this->menu = $menu;
        $this->menuRecursive = $menuRecursive;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $menus = $this->menu::query()->latest()->paginate(10);
        return view('admin.menus.index', [
            'menus' => $menus
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $htmlOptionMenu = $this->menuRecursive->menuRecursiveAdd();
        return view('admin.menus.create', [
            'htmlOptionMenu' => $htmlOptionMenu
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $this->menu::query()->create([
            'name' => $request->get('name'),
            'parent_id' => $request->get('parent_id'),
            'slug' => Str::slug($request->get('name'))
        ]);
        return redirect()->route('menus.create')->with('success', "Successfully Added");
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
        $menu = $this->menu::query()->find($id);
        $htmlOptionMenu = $this->menuRecursive->menuRecursiveEdit($menu->parent_id);
        return view('admin.menus.edit', [
            'menu' => $menu,
            'htmlOptionMenu' => $htmlOptionMenu
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
        $this->menu::query()->find($id)->update([
            'name' => $request->get('name'),
            'parent_id' => $request->get('parent_id'),
            'slug' => Str::slug($request->get('name'))
        ]);
        return redirect()->route('menus.index')->with('success', "Successfully Edited");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->menu::query()->find($id)->delete();
        return redirect()->route('menus.index')->with('success', "Successfully Deleted");
    }
}
