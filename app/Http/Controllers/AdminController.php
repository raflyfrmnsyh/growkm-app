<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $admins = Admin::all();
        return view('_admin._manage.admin-data', [
            'title' => 'Kelola data admin',
            'admins' => $admins
        ]);
    }

    public function create()
    {
        return view('_admin._manage._create.add-admin-data', [
            'title' => 'Tambah data admin',
        ]);
    }

   public function destroy($id)
{
    $admin = Admin::findOrFail($id);

    if ($admin->user_role === 'S') {
        return back()->with('error', 'Super Admin tidak bisa dihapus.');
    }

    $admin->delete();

    return redirect()->route('admin.manage.admin')->with('success', 'Admin berhasil dihapus.');
}



    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:255',
            'user_email' => 'required|email|max:255',
            'user_phone' => 'required|string|max:15',
            'user_gender' => 'required|in:M,F',
            'user_address' => 'nullable|string',
            'user_password' => 'required|min:6',
            'user_role' => 'required|string',
        ]);

        $validated['user_password'] = bcrypt($validated['user_password']);

        Admin::create($validated);

        return redirect()->route('admin.manage.admin')->with('success', 'Admin berhasil ditambahkan');
    }
}
