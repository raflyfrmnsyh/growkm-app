<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;

class AdminController extends Controller
{
    public function index(Request $request)
    {

        $searchInput = $request->input('searchBox');
        $sortByRole = $request->input('role_name');

        $admins = User::select(
            'user_id',
            'created_at',
            'user_name',
            'user_phone',
            'user_role'
        )
            ->whereIn('user_role', ['admin_event', 'admin_product'])
            ->when($searchInput, function ($query, $searchInput) {
                $query->where(function ($q) use ($searchInput) {
                    $q->where('user_name', 'like', "%$searchInput%")
                        ->orWhere('user_email', 'like', "%$searchInput%")
                        ->orWhere('user_phone', 'like', "%$searchInput%");
                });
            })
            ->when($sortByRole, function ($query, $sortByRole) {
                $query->where('user_role', $sortByRole);
            })
            ->latest()
            ->paginate(10)
            ->withQueryString(); // mempertahankan filter saat paginasi

        // Format data
        $admins->getCollection()->transform(function ($item) {
            return [
                'user_id'    => $item->user_id,
                'join_date'  => Carbon::parse($item->created_at)->locale('id')->isoFormat('dddd, D MMMM Y'),
                'username'   => $item->user_name,
                'user_phone' => $item->user_phone,
                'user_role'  => $item->user_role
            ];
        });

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
        $admin = User::findOrFail($id);

        if ($admin->user_role === 'super_admin') {
            return back()->with('error', 'Super Admin tidak bisa dihapus.');
        }

        $admin->delete();

        return redirect()->route('admin.manage.admin')->with('success', 'Admin berhasil dihapus.');
    }

    public function edit($id)
    {
        $admins = User::select(
            'user_id',
            'user_name',
            'user_email',
            'user_phone',
            'user_role',
            'user_gender',
            'user_address'
        )->where('user_id', $id)->first();

        $admin = [
            'user_id',
            'user_name',
            'user_email',
            'user_phone',
            'user_role',
            'user_gender',
            'user_address'
        ];

        return view('_admin._manage._update.admin-update_data', [
            'title' => 'Edit data admin',
            'admin' => $admins
        ]);
    }

    public function update(Request $request, $id)
    {
        $admin = User::findOrFail($id);

        $validated = $request->validate([
            'user_name' => 'required|string|max:255',
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
            'user_name' => 'required|string|max:100',
            'user_email' => 'required|email',
            'user_phone' => 'required|string',
            'user_gender' => 'required',
            'user_password' => 'required|string|min:4',
            'user_role' => 'required|in:admin_event,admin_product',
            'user_address' => 'required|string'
        ]);

        do {
            $generatedId = fake()->numberBetween(1, 999999);
        } while (User::where('user_id', $generatedId)->exists());

        User::create([
            'user_id'       => $generatedId,
            'user_name'     => $validated['user_name'],
            'user_email'    => $validated['user_email'],
            'user_phone'    => $validated['user_phone'],
            'user_gender'   => $validated['user_gender'],
            'user_password' => Hash::make($validated['user_password']),
            'user_role'     => $validated['user_role'],
            'user_address'  => $validated['user_address'],
        ]);

        return redirect()->route('admin.manage.admin')->with('success', 'Admin berhasil ditambahkan');
    }
}
