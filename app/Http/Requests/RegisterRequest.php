<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        // Bolehkan semua orang mengakses request ini
        return true;
    }

    public function rules(): array
    {
        return [
        'user_name' => ['required', 'string', 'max:100'],
        'email' => ['required', 'email', 'max:100', 'unique:users,email'],
        'password' => ['required', 'min:6', 'confirmed'],
        'user_gender' => ['required', 'string'],
        'user_phone' => ['required', 'string', 'max:15', 'unique:users,user_phone'],
        'user_address' => ['nullable', 'string', 'max:255'],
        'user_profile' => ['nullable', 'string', 'max:255'],
        ];

    }

    public function messages(): array
    {
        return [
            'user_name.required' => 'Nama wajib diisi.',
        'email.required' => 'Email wajib diisi.',
        'email.email' => 'Format email tidak valid.',
        'email.unique' => 'Email sudah terdaftar.',
        'password.required' => 'Password wajib diisi.',
        'password.min' => 'Password minimal 6 karakter.',
        'password.confirmed' => 'Konfirmasi password tidak cocok.',
        'user_gender.required' => 'Gender wajib diisi.',
        'user_phone.required' => 'Nomor telepon wajib diisi.',
        'user_phone.unique' => 'Nomor telepon sudah terdaftar.',
        ];
    }
}
