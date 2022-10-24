<?php

namespace Modules\Users\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Http\Traits\PermissionTo;

class RolesController extends Controller
{

    use PermissionTo;

    public function index()
    {
        $this->abortForbidden('roles list');
        return view('users::roles.index');
    }

    public function show($id)
    {
        $this->abortForbidden('roles show');
        $role = Role::findOrFail($id);
        return view('users::roles.show', compact('role'));
    }

    public function edit($id)
    {
        $this->abortForbidden('roles edit');
        $role = Role::findOrFail($id);
        $permissions = Permission::all()->pluck('name', 'id');
        return view('users::roles.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, $id)
    {
        $this->abortForbidden('roles edit');
        $role = Role::findOrFail($id);
        $role->name = $request->name;
        $role->save();
        $role->syncPermissions($request->permissions);
        return redirect()->route('roles.index')->with('success', 'Role updated successfully');
    }

    public function create()
    {
        $this->abortForbidden('roles create');
        $permissions = Permission::all()->pluck('name', 'id');
        return view('users::roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $this->abortForbidden('roles create');
        $role = Role::create(['name' => $request->name]);
        $role->syncPermissions($request->permissions);
        return redirect()->route('roles.index')->with('success', 'Role created successfully');
    }

    public function destroy($id)
    {
        $this->abortForbidden('roles delete');
        $role = Role::findOrFail($id);
        $role->delete();
        return redirect()->route('roles.index')->with('success', 'Role deleted successfully');
    }


}