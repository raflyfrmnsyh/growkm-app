<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $query = Admin::query();

        // Cek apakah ada input pencarian
        if ($request->has('searchBox') && $request->searchBox !== '') {
            $search = $request->searchBox;
            $query->where(function ($q) use ($search) {
                $q->where('username', 'like', "%$search%")
                ->orWhere('user_phone', 'like', "%$search%")
                ->orWhere('user_email', 'like', "%$search%");
            });
        }

        // Ambil data 10 per halaman
        $admins = $query->orderBy('created_at', 'desc')->paginate(2);

        // Kirim ke view
        return view('_admin._manage.admin-data', [
            'title' => 'Kelola data admin',
            'admins' => $admins,
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

    public function edit($id)
{
    $admin = Admin::findOrFail($id);

    return view('_admin._manage._update.admin-update_data', [
        'title' => 'Edit data admin',
        'admin' => $admin
    ]);
}

    public function update(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);

        $validated = $request->validate([
            'username' => 'required|string|max:255',
            'user_email' => 'required|email|max:255',
            'user_phone' => 'required|string|max:15',
            'user_gender' => 'required|in:M,F',
            'user_address' => 'nullable|string',
            'user_role' => 'required|string',
        ]);

        $admin->update($validated);

        return redirect()->route('admin.manage.admin')->with('success', 'Data admin berhasil diperbarui.');
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
