<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AdminLoginController extends Controller
{
    // Show the login form for admin
    public function showLoginForm()
    {
        return view('auth.admin_login');
    }

    // Handle the login request
    public function login(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        // Attempt to log the user in
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // If the user has the admin role, continue to the dashboard
            $user = Auth::user();

            if ($user->hasRole('admin')) {
                // Redirect admin to the admin dashboard
                return redirect()->route('admin.dashboard');
            } else {
                // If the user is not an admin, log them out and show an error message
                Auth::logout();
                return redirect()->back()->withErrors(['email' => 'You are not authorized to access this area.']);
            }
        }

        // If authentication fails, redirect back with error
        return redirect()->back()->withErrors(['email' => 'Invalid credentials.']);
    }

    // Handle the admin logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/');
    }
}
