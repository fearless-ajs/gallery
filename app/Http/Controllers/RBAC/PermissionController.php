<?php

namespace App\Http\Controllers\RBAC;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class PermissionController extends Controller
{

    public function store(Request $request)
    {
        $rules = [
            'name'          => 'required|max:50|unique:permissions',
            'display_name'  => 'required|max:100',
            'description'   => 'required|max:255',
        ];
        $this->validate($request, $rules); //Validates the request using the rules we set

        $permission = Permission::create($request->all());

        return $this->showOne($permission, 201);
    }

}
