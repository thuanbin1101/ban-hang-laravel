<?php

namespace App\Http\Controllers\Admin;

use App\Components\PermissionRecursive;
use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class PermissionController extends Controller
{

    private Permission $permission;
    private PermissionRecursive $permissionRecursive;

    public function __construct(Permission $permission, PermissionRecursive $permissionRecursive)
    {
        $this->permission = $permission;
        $this->permissionRecursive = $permissionRecursive;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $permissions = $this->permission::query()->latest()->paginate();
        return view('admin.permissions.index', [
            'permissions' => $permissions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $htmlOptionPermission = $this->permissionRecursive->permissionRecursiveAdd();
        return view('admin.permissions.create', [
            'htmlOptionPermission' => $htmlOptionPermission
        ]);

        return view('admin.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        try {
            DB::beginTransaction();
            $this->permission::query()->create([
                'name' => $request->get('name'),
                'parent_id' => $request->get('parent_id'),
                'display_name' => $request->get('display_name'),
                'key_code' => $request->get('key_code')
            ]);
            DB::commit();
            return redirect()->route('permissions.create')->with('success', "Successfully Added");
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("Message: {$e->getMessage()}. Line: {$e->getLine()}");
            return redirect()->route('permissions.create')->with('fail', "Fail Added");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        $htmlOptionPermission = $this->permissionRecursive->permissionRecursiveEdit($permission->parent_id);
        return view('admin.permissions.edit', [
            'permission' => $permission,
            'htmlOptionPermission' => $htmlOptionPermission
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $this->permission::query()->find($id)->update([
                'name' => $request->get('name'),
                'parent_id' => $request->get('parent_id'),
                'display_name' => $request->get('display_name'),
                'key_code' => $request->get('key_code')
            ]);
            DB::commit();
            return redirect()->route('permissions.index')->with('success', "Successfully Edited");
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("Message: {$e->getMessage()}. Line: {$e->getLine()}");
            return redirect()->route('permissions.index')->with('fail', "Fail Edited");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Permission $permission
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        try {
            $this->permission::query()->find($id)->delete();
            return response()->json(['code' => 200, 'message' => "Success"]);
        } catch (Exception $e) {
            return response()->json(['code' => 500, 'message' => "Fail"], 500);
            Log::error("Message: {$e->getMessage()}. Line: {$e->getLine()}");
        }
    }
}
