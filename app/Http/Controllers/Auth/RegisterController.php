<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User; // Pastikan ini yang digunakan
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    public function show()
    {
        return view('_auth.sign-up');
    }

    public function store(RegisterRequest $request)
    {
        $data = $request->validated();

        $user = User::create([
            'user_name' => $data['user_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'user_gender' => $data['user_gender'],
            'user_phone' => $data['user_phone'],
            'user_address' => $data['user_address'],
            'user_profile' => $data['user_profile'] ?? null,
            'user_role' => 'user'
        ]);

        Auth::login($user);
        return redirect()->route('login')->with('success', 'Akun berhasil dibuat!');
    }
}
