<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function manager()
    {
        return view('roles.manager');
    }

    public function admin()
    {
        return view('roles.admin');
    }
}
