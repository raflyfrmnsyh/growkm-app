<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        
        // Debug: lihat data yang dikirim
        //dd($request->all());
        
        // Validasi input
        $validated = $request->validate([
            'user_name' => 'nullable|string|max:100',
            'user_email' => 'nullable|email|max:100|unique:users,user_email,' . $user->user_id . ',user_id',
            'user_phone' => 'nullable|string|max:15|unique:users,user_phone,' . $user->user_id . ',user_id',
            'user_gender' => 'nullable|string|max:50',
            'user_address' => 'nullable|string|max:255',
            'user_profile' => 'nullable|image|mimes:jpeg,png,jpg|max:1024',
            'old_password' => 'nullable|string',
            'new_password' => 'nullable|string|min:6|confirmed',
        ]);

        $changes = [];
        $messages = [];

        // Bandingkan setiap field yang di-request dengan data lama
        foreach ($validated as $key => $value) {
            // Skip password fields, akan ditangani terpisah
            if (in_array($key, ['old_password', 'new_password', 'new_password_confirmation'])) {
                continue;
            }

            // Skip null values (field yang tidak diisi)
            if ($value === null) {
                continue;
            }

            // Handle file upload untuk profile picture
            if ($key === 'user_profile' && $request->hasFile('user_profile')) {
                // Hapus foto lama jika ada
                if ($user->user_profile) {
                    Storage::delete(str_replace('/storage', 'public', $user->user_profile));
                }
                
                // Upload foto baru
                $path = $request->file('user_profile')->store('public/user_profiles');
                $value = Storage::url($path);
            }

            // Bandingkan dengan data lama
            if ($user->$key != $value) {
                $changes[$key] = $value;
                $messages[] = ucfirst(str_replace('_', ' ', $key));
            }
        }

        // Handle password update
        if ($request->filled('old_password') && $request->filled('new_password')) {
            // Verifikasi password lama
            if (!Hash::check($request->old_password, $user->user_password)) {
                return back()->withErrors(['old_password' => 'Password lama tidak sesuai']);
            }

            // Update password baru
            $changes['user_password'] = Hash::make($request->new_password);
            $messages[] = 'Password';
        }

        // Jika ada perubahan, update database
        if (!empty($changes)) {
            $user->update($changes);
            
            $successMessage = count($messages) > 1 
                ? 'Berhasil mengupdate: ' . implode(', ', $messages)
                : $messages[0] . ' berhasil diupdate';
                
            return back()->with('success', $successMessage);
        } else {
            return back()->with('info', 'Tidak ada perubahan data');
        }
    }

    public function showProfile()
    {
        $user = Auth::user();
        
        return view('_users._settings.profile-info', [
            'title' => 'Profile Information - Growkm app',
            'user' => $user
        ]);
    }
} 