<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class AuthController extends Controller
{
    // Show login page
    public function showLogin()
    {
        return view('auth.login');
    }

    // Handle login (NO HASH)
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $admin = Admin::where('username', $request->username)->first();

        // Direct password match (NOT SECURE – only for testing)
        if ($admin && $request->password === $admin->password) {
            session(['admin_username' => $admin->username]);
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['admin_username' => 'Invalid credentials']);
    }

    // Logout
    public function logout(Request $request)
    {
        $request->session()->forget('admin_username');
        return redirect()->route('login');
    }
}
