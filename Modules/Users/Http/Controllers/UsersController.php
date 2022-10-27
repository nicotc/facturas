<?php

namespace Modules\Users\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Traits\PermissionTo;
use Illuminate\Routing\Controller;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{
    use PermissionTo;

    public function index()
    {
        $this->abortForbidden('users_list');
        return view('users::users.index');
    }

    public function show($id)
    {
        $user = User::select('users.id', 'users.name', 'email', 'avatar', 'roles.name as rol')
            ->leftJoin('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->leftJoin('roles', 'model_has_roles.role_id', '=', 'roles.id')->findOrFail($id);
        return view('users::users.show', compact('user'));
    }

    public function edit($id)
    {

        $user =User::select('users.id', 'users.name', 'email', 'avatar', 'roles.name as rol')
        ->leftJoin('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
        ->leftJoin('roles', 'model_has_roles.role_id', '=', 'roles.id')->findOrFail($id);
        $roles = Role::all()->pluck('name', 'id');
        return view('users::users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        $user->syncRoles($request->rol);
        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

    public function create()
    {
        $roles = Role::all()->pluck('name', 'id');
        return view('users::users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        $user->syncRoles($request->rol);
        return redirect()->route('users.index')->with('success', 'User created successfully');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }

}