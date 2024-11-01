<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        // Validate registration data
        $request->validate([
            'email' => 'required|email|unique:mahasiswa',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);
    
        // Create a new Mahasiswa instance
        $mahasiswa = new Mahasiswa([
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
    
        $mahasiswa->save();
    
        return redirect()->route('login')->with('success', 'Registration successful. Please login.');
    }
    
}


