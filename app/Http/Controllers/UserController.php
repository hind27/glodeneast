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
    public function showPasswordForm()
    {
        return view('update-passwaord');
    }
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required'],
            'new_password' => ['required', 'min:8', 'confirmed'],
        ]);

        if (!Hash::check($request->current_password, auth()->user()->password)) {
            return response()->json(['error' => 'Current password is incorrect.'], 422);
        }

        auth()->user()->update(['password' => Hash::make($request->new_password)]);

        return response()->json(['success' => 'Password updated successfully.']);
    }
}
