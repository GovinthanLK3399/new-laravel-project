<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class forgot_password_controller extends Controller
{
    public function forgot_password_form()
    {
        return view('project.admin.forgot_password_form');
    }
}
