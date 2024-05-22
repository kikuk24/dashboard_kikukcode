<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required','email','unique:users'],
            'password' => ['required','min:8'],
        ]);
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/login')->with('success', 'Registration Successful, dan Silahkan Login');
    }

    public function login(Request $request){
        $request->validate([
            'email' => ['required','email'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($request->only('email','password'))){
            return redirect()->route('dashboard.index')->with('success', 'Login Successful');
        }
        return redirect('/login')->with('error', 'Login Failed');
    }
    
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
