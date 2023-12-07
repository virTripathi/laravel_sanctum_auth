<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request) {
        if($request->isMethod('post')) {
            $request->validate([
                'name'=>'required|string',
                'email'=>'required|email',
                'password'=>'required|min:8|confirmed',
                'password_confirmation'=>'required'
            ]);
            try {
                $user = User::create([
                    'name'=>$request->name,
                    'email'=>$request->email,
                    'role_id'=>2,
                    'password'=>Hash::make($request->password)
                ]);
                Auth::login($user);
                return redirect()->route('dashboard')->with('success', "You've been successfully registered!");
            } catch(\Exception $e) {
                dd($e);
                return redirect()->back()->with('error', "You've already registered!");
            }
           
        }
    }

    public function login(Request $request) {
        if($request->isMethod('post')) {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);
    
            $credentials = $request->only('email', 'password');
    
            if (Auth::attempt($credentials)) {
                $user = Auth::user();
                // Optionally, you can perform additional actions upon successful login.
    
                return redirect()->route('dashboard')->with('success', "Logged In successfully!");
            }
    
            throw ValidationException::withMessages([
                'email' => ['The provided credentials do not match our records.'],
            ]);
        }
        return view('login');
    }

    public function logout(Request $request) {
        Auth::guard('web')->logout();
        return redirect()->route('login')->with('success', "You've been successfully Logged Out!");
    }
}
