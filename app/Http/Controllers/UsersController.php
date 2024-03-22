<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function register()
    {
        $data = [
            'title' => 'Register',

        ];
        return view('auth.register',$data);
    }
    public function login()
    {
        $data = [
            'title' => 'Login',

        ];
        return view('auth.login',$data);
    }

    
    
}
