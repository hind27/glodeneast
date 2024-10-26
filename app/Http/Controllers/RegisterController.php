<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Contracts\Role;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */



    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /*protected function redirectTo(){

        return Redirect::intended();
    }*/

    public function showRegistrationForm()
    {
        return view('register');
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */


     public function register(Request $request)
     {
         // Validate the request data
         $validatedData = $request->validate([
             'name' => ['required', 'string', 'max:255'],
             'name_ar' => ['nullable', 'string', 'max:255'],
             'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
             'password' => ['required', 'string', 'min:6', 'confirmed'],
         ]);

         // Create the user
         $user = User::create([
             'name' => $validatedData['name'],
             'email' => $validatedData['email'],
             'password' => Hash::make($validatedData['password']),
         ]);

         // Assign default role
         $defaultRole = Role::where('name', 'User')->first(); // Change 'user' to your desired default role name

         if ($defaultRole) {
             $user->roles()->attach($defaultRole); // Assuming you have a roles relationship defined in User model
         }

         // Check if the request is an AJAX request
         if ($request->ajax()) {
             return response()->json(['message' => 'Registration successful! Please log in.'], 201);
         }

         // Redirect to the login page for non-AJAX requests
         return redirect('/login')->with('success', 'Registration successful! Please log in.');
     }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'name_ar' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \App\Models\User
     */


    protected function registered(Request $request, $user)
    {
        // You can implement any additional actions to be taken after registration here.
    }

    /**
     * Get the post-registration redirect path.
     *
     * @return string
     */
    public function redirectPath()
    {
        return '/home';
    }
}
