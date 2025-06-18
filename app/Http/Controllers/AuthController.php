<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        $validation = $request->validate([
            'user_name' => 'required|string|max:255',
            'user_email' => 'required|email|unique:users,user_email',
            'user_password' => 'required|string|min:4',
            'user_gender' => 'required|in:Laki-laki,Perempuan',
            'user_phone' => 'required|string|max:20',
        ]);

        do {
            $generatedId = fake()->numberBetween(1, 999999);
        } while (User::where('user_id', $generatedId)->exists());

        User::create([
            'user_id' => $generatedId,
            'user_name' => $validation['user_name'],
            'user_email' => $validation['user_email'],
            'user_password' => $validation['user_password'] = Hash::make($validation['user_password']),
            'user_gender' => $validation['user_gender'],
            'user_phone' => $validation['user_phone'],
            'user_address' => null,
            'user_profile' => null,
            'user_role' => 'user'
        ]);

        return redirect()->route('auth.login')->with('success', 'Registrasi berhasil! Silakan login.');
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
