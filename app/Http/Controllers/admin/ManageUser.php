<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ManageUser extends Controller
{
    // TAMPILKAN SEMUA USER
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    // FORM TAMBAH USER
    public function create()
    {
        return view('admin.users.create');
    }

    // SIMPAN USER BARU
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:tb_users',
            'email'    => 'required|email|unique:tb_users',
            'password' => 'required|min:6',
            'role'     => 'required|in:murid,mentor,admin',
            'status'   => 'required|in:aktif,non-aktif',
        ]);

        User::create([
            'username' => $request->username,
            'email'    => $request->email,
            'password' => Hash::make($request->password), 
            'role'     => $request->role,
            'status'   => $request->status,
            'no_telpon'=> $request->no_telpon,
            'alamat'   => $request->alamat,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User berhasil ditambahkan');
    }

    // FORM EDIT USER
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    // UPDATE DATA USER
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'username' => 'required|unique:tb_users,username,'.$id,
            'email'    => 'required|email|unique:tb_users,email,'.$id,
            'role'     => 'required|in:murid,mentor,admin',
            'status'   => 'required|in:aktif,non-aktif',
        ]);

        $data = [
            'username' => $request->username,
            'email'    => $request->email,
            'role'     => $request->role,
            'status'   => $request->status,
            'no_telpon'=> $request->no_telpon,
            'alamat'   => $request->alamat,
        ];

        // Update password hanya jika diisi
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('admin.users.index')->with('success', 'User berhasil diperbarui');
    }

    // HAPUS USER
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User berhasil dihapus');
    }
}