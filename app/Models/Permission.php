<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission as PermissionModel;

class Permission extends PermissionModel
{
    protected $guard_name = 'admin';
}
