<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRolePermission;
use App\Http\Resources\Permission as PermissionResource;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:roles.permissions.view')->only(['index']);
        $this->middleware('can:roles.permissions.create')->only(['store']);
        $this->middleware('can:roles.permissions.delete')->only(['destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Role $role)
    {
        return PermissionResource::collection($role->permissions()->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Spatie\Permission\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRolePermission $request, Role $role)
    {
        $role->givePermissionTo(Permission::findOrFail($request->permission_id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Spatie\Permission\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role, Permission $permission)
    {
        $role->revokePermissionTo($permission);
    }
}
