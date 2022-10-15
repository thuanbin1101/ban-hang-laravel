<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RoleController extends Controller
{
    private Role $role;
    private Permission $permission;

    public function __construct(Role $role, Permission $permission)
    {
        $this->role = $role;
        $this->permission = $permission;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = $this->role::query()->paginate();
        return view('admin.roles.index', [
            'roles' => $roles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissionParent = $this->permission::query()->where('parent_id', 0)->get();
        return view('admin.roles.create', [
            'permissionParent' => $permissionParent
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $dataCreate = [
                'name' => $request->get('name'),
                'display_name' => $request->get('display_name')
            ];
            $roleCreate = $this->role::query()->create($dataCreate);
            $roleCreate->permissions()->attach($request->get('permission_id'));
            DB::commit();
            return redirect()->route('roles.create')->with('success', "Successfully Added");
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("Message: {$e->getMessage()}. Line: {$e->getLine()}");
            return redirect()->route('roles.create')->with('fail', "Fail Added");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Role $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Role $role
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Role $role)
    {
        $permissionParent = $this->permission::query()->where('parent_id', 0)->get();
        $roleOfPermission = $role->permissions;
        return view('admin.roles.edit', [
            'role' => $role,
            'permissionParent' => $permissionParent,
            'roleOfPermission' => $roleOfPermission
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Role $role
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $dataUpdate = [
                'name' => $request->get('name'),
                'display_name' => $request->get('display_name')
            ];
            $this->role::query()->find($id)->update($dataUpdate);
            $role = $this->role::query()->find($id);
            $role->permissions()->sync($request->get('permission_id'));
            DB::commit();
            return redirect()->route('roles.index')->with('success', "Successfully Added");
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("Message: {$e->getMessage()}. Line: {$e->getLine()}");
            return redirect()->route('roles.index')->with('fail', "Fail Added");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Role $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
    }
}
