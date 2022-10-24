<?php
namespace App\Http\Traits;

use Illuminate\Support\Facades\Gate;

trait PermissionTo
{
    protected function abortForbidden(string $permission)
    {
        if (Gate::denies($permission)) {
            return abort(403);
        }
    }
}
