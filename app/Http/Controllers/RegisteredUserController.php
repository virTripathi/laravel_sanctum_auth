<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisteredUserController extends Controller
{
    public function dashboard(Request $request) {
        $users = User::all();
        return view('dashboard',compact('users'));
    }
}
