<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function authenticate(Request $request){
        $formFields = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        // return $formFields;
        if (Auth::attempt($formFields)) {
            // Authentication successful
            // return "lol";
            return redirect()->view('admin.dashboard');
        } else {
            // Authentication failed
            // return "not lol";
            return redirect()->back()->with('error', 'Invalid credentials');
        }
    }
}
