<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

public function showLoginForm()
{
    return view('login');
}



public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $locale = 'ar'; // Set this to the appropriate locale
    
        return redirect()->route('home', ['locale' => $locale]);
          // return redirect()->intended('/ar');
    }


    return redirect('/login')->with('error', 'Invalid credentials. Please try again.');
}
}
