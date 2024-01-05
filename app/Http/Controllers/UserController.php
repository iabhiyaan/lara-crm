<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:' . permissionConstant()::USERS['view-users'])->only('index');
        $this->middleware('permission:' . permissionConstant()::USERS['alter-users'])->only('edit', 'update');
        $this->middleware('permission:' . permissionConstant()::USERS['delete-users'])->only('destroy');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perPage = request()->query('perPage') ?? 10;
        $searchUser = request()->query('searchUser');

        $userQ = User::with('roles')->where('name', 'LIKE', "%{$searchUser}%");

        if ($perPage === 0) {
            $details = $userQ->get();
        } else {
            $details = $userQ->paginate($perPage);
        }

        return view('admin.users.list', compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users,email'],
            'role' => ['required', 'exists:roles,name'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $formData = $request->except(['token', 'role', 'password_confirmation', 'password']);
        $formData['password'] = bcrypt($request->password);
        $formData['publish'] = 1;

        $user = User::create($formData);
        $user->assignRole($request->role);

        return redirect()->route('users.index')->with('successMessage', 'User created successfully');
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
    public function edit(User $user)
    {
        $user->load('roles');
        $roles = Role::all();
        return view('admin.users.edit', compact('roles', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users,email,' . $user->id],
            'role' => ['required', 'exists:roles,name'],
        ]);

        $formData = $request->except(['token', 'role', 'password_confirmation', 'password']);
        $formData['publish'] = 1;

        $user->syncRoles([$request->role]);
        $user->update($formData);

        return redirect()->route('users.index')->with('successMessage', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('successMessage', 'User deleted successfully');
    }
}
