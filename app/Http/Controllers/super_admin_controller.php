<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class super_admin_controller extends Controller
{
    public function super_admin_register_form()
    {
        return view('project.super_admin_register');
    }
    public function super_admin_home()
    {
        return view('project.admin.home');
    }
}
