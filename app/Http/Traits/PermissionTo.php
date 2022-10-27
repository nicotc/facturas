<?php
namespace App\Http\Traits;

use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Permission;

trait PermissionTo
{
    protected function abortForbidden(string $permission)
    {
        if (Gate::denies($permission)) {
            return abort(403);
        }
    }

    protected function module_permission()
    {
        $permissionsData = Permission::all()->pluck('name', 'id');

        foreach ($permissionsData as $permissionKey => $permissionValue) {
            list($module, $permission) = explode('_', $permissionValue);
            $permissions[$module][$permissionKey] = $permissionValue;
        }

        return $permissions;
    }

}