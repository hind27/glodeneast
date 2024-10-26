<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Spatie\Permission\Models\Role;

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
        $user = Auth::user();
        $locale = 'ar'; // Set this to the appropriate locale

        // Check if the user is an admin
        if (auth()->user()->hasRole('admin')) {
            return redirect()->route('admin.dashboard');
        }

        // Redirect regular users to the home page
        return redirect()->route('home', ['locale' => $locale]);
    }

    return redirect('/login')->with('error', 'Invalid credentials. Please try again.');
}

}
