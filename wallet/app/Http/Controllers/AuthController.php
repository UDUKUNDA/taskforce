<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User; // Ensure this is the correct User model namespace
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Auth;

class AuthController extends Controller
{
    public function registration_post(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:5',
            'confirm_password' => 'required_with:password|same:password|min:5'
        ]);

        // Create a new user
        $user = new User;
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->password = Hash::make(trim($request->password)); // Hash password
        $user->remember_token = Str::random(50);
        $user->save();

        // Redirect to login with success message
        return redirect('login')->with('success', 'You have been registered successfully');
    }


    public function login(){
        return view('Auth.login');
      }

      public function login_post(Request $request)
{
 
    // Validate input
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:6',
    ]);

    // Attempt to log in the user
    if (Auth::attempt(['email' => $request->email, 'password' => $request->password], true)) {
        $request->session()->put('email',$request->input('email'));
        // Check user role
        if (Auth::user()->is_role == '1') {
            return redirect()->intended('admin/dashboard');
        } else if (Auth::user()->is_role == '0') {
            return redirect()->intended('main');
        } else {
            Auth::logout();
            return redirect()->back()->with('error', 'Credentials not found');
        }
    } else {
        // Invalid credentials
        return redirect()->back()->with('error', 'Please enter the correct credentials');
    }
}

      public function signup(){
        return view('Auth.signup');
      }
    
}
