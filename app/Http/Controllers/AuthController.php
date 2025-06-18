<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function show()
    {
        return view('_auth.sign-in', [
            'title' => 'Login - Growkm app'
        ]);
    }

    public function registerView()
    {
        return view('_auth.sign-up', [
            'title' => "Register - Growkm app"
        ]);
    }

    public function registerProces(Request $request)
    {
        dd($request->all());
    }


    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'user_email' => 'required|email',
            'user_password' => 'required',
        ]);

        // Coba login
        if (Auth::attempt(['user_email' => $request->user_email, 'password' => $request->user_password])) {
            $request->session()->regenerate();

            $user = Auth::user();
            switch ($user->user_role) {
                case 'super_admin':
                case 'admin_product':
                case 'admin_event':
                    return redirect()->route('admin.dashboard');
                case 'user':
                    return redirect()->route('user.dashboard');
                default:
                    Auth::logout();
                    return redirect('/')->withErrors(['login_error' => 'Role tidak dikenali.']);
            }
        }

        // Jika gagal
        return back()->withErrors([
            'login_error' => 'Email atau password salah.',
        ])->onlyInput('user_email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
