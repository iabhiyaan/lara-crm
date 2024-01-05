<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:' . permissionConstant()::ROLES['view-roles'])->only('index');
        $this->middleware('permission:' . permissionConstant()::ROLES['alter-roles'])->only('edit', 'update');
        $this->middleware('permission:' . permissionConstant()::ROLES['delete-roles'])->only('destroy');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $details = Role::all();
        return view('admin.roles.list', compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissionGroups = Permission::all()->groupBy('group');
        return view('admin.roles.create', compact('permissionGroups'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'display_name' => ['required', 'string', 'max: 100'],
            'permissions' => ['required', 'array'],
            'permissions.*' => ['exists:permissions,name']
        ]);

        $formData = $request->except(['_token', 'permissions']);
        $formData['guard_name'] = 'super-admin';

        $role = Role::create($formData);

        $role->givePermissionTo($request->input('permissions'));

        return redirect()->route('roles.index')->with('successMessage', 'Role created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        $role->load('permissions');
        $permissionGroups = Permission::all()->groupBy('group');

        return view('admin.roles.edit', compact('role', 'permissionGroups'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'display_name' => ['required', 'string', 'max: 100'],
            'permissions' => ['required', 'array'],
            'permissions.*' => ['exists:permissions,name']
        ]);

        $formData = $request->except(['_token', 'permissions']);
        $formData['guard_name'] = 'super-admin';

        $role->syncPermissions($request->input('permissions'));

        $role->update($formData);

        return redirect()->route('roles.index')->with('successMessage', 'Role updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('roles.index')->with('successMessage', 'Role deleted successfully');
    }
}
