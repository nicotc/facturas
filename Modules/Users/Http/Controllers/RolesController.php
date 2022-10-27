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
        $this->abortForbidden('roles_list');
        return view('users::roles.index');
    }

    public function show($id)
    {
        $this->abortForbidden('roles_show');
        $role = Role::findOrFail($id);

        $a_permissions = $role->permissions->toArray();


        foreach ($a_permissions as $a_permission) {
            $permissionsA[$a_permission['id']] = $a_permission['name'];

        }

        if(isset($permissionsA)){
            foreach ($permissionsA as $permissionKey => $permissionValue) {
                list($module, $permission) = explode('_', $permissionValue);
                $permissions[$module][$permissionKey] = $permissionValue;
            }
        }else{
            $permissions = [];
        }





        return view('users::roles.show', compact('role', 'permissions'));
    }

    public function edit($id)
    {
        $this->abortForbidden('roles_edit');
        $role = Role::findOrFail($id);
        $permissions = $this->module_permission();
        return view('users::roles.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, $id)
    {
        $this->abortForbidden('roles_edit');
        $role = Role::findOrFail($id);
        $role->name = $request->name;
        $role->save();
        $role->syncPermissions($request->permissions);
        return redirect()->route('roles.index')->with('success', 'Role updated successfully');
    }

    public function create()
    {
        $this->abortForbidden('roles_create');
        $permissions = $this->module_permission();

        // dd($permissions);

        return view('users::roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $this->abortForbidden('roles_create');
        $role = Role::create(['name' => $request->name]);
        $role->syncPermissions($request->permissions);
        return redirect()->route('roles.index')->with('success', 'Role created successfully');
    }

    public function destroy($id)
    {
        $this->abortForbidden('roles_delete');
        $role = Role::findOrFail($id);
        $role->delete();
        return redirect()->route('roles.index')->with('success', 'Role deleted successfully');
    }


}