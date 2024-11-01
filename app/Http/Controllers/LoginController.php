<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function loginvalid(Request $request) {
        // Validate the request
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
    
        // Prepare credentials
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];
    
        // Check if credentials match for Mahasiswa
        if (Auth::guard('mahasiswa')->attempt($credentials)) {
            $mahasiswa = Auth::guard('mahasiswa')->user();
    
            // Verify if the user is allowed to log in (is_verified is 'verified')
            if ($mahasiswa->is_verified !== 'verified') {
                Auth::guard('mahasiswa')->logout(); // Log out to prevent access
                return redirect()->back()->withErrors(['email' => 'Your account is not verified. Please wait for admin verification.'])->withInput();
            }
    
            // If verified, regenerate the session and redirect to mahasiswa dashboard
            $request->session()->regenerate();
            return redirect()->route('pendaftaran_add');
        }
    
        // Attempt to login as Admin if Mahasiswa login fails
        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard_admin');
        }
    
        // If all login attempts fail, return back with an error message
        return redirect()->back()->withErrors(['email' => 'Invalid email or password.'])->withInput();
    }    

    public function logout(Request $request)
    {
        Auth::guard('mahasiswa')->logout();
        Auth::guard('admin')->logout();

        // Invalidate the session
        $request->session()->invalidate();

        // Regenerate the CSRF token
        $request->session()->regenerateToken();

        return redirect('/login');
    }

}
