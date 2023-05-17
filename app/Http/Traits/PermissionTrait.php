<?php

namespace App\Http\Traits;


use App\Models\Permission;
use App\Models\Role;

trait PermissionTrait
{

    private function getPermission()
    {
        return Permission::get();
    }

    private function getRoles()
    {
        return Role::get();
    }
}