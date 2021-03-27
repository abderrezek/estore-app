<?php

namespace App\Http\Controllers\Admin\Auths;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function create()
    {
        return view('admin.auths.login');
    }

    public function store()
    {
        // return view('admin.auths.login');
    }
}
