<?php

namespace App\Http\Controllers\RBAC;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    public function store(Request $request)
    {

//        $rules = [
//            'name'          => 'required|max:50',
//            'display_name'  => 'required|max:100',
//            'description'   => 'required|max:255',
//        ];
//        $this->validate($request, $rules); //Validates the request using the rules we set

        Role::create([
            'name'         => 'administrator',
            'display_name' => 'administrator', // optional By default but i made it compulsory
            'description'  => 'system administrator', // optional By default but i made it compulsory
        ]);

    }


}

