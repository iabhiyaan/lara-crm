<?php

use App\Constants\PermissionConstant;

if (!function_exists('permissionConstant')) {
    function permissionConstant(): PermissionConstant
    {
        return new PermissionConstant();
    }
}
