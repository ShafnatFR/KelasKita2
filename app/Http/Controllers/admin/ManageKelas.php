<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ManageKelas extends Controller
{
    // MENAMPILKAN DAFTAR KELAS
    public function index()
    {
        // Mengambil data kelas beserta data mentornya
        $kelas = Kelas::with('mentor')->get(); 
        return view('admin.kelas.index', compact('kelas'));
    }

    // FORM EDIT KELAS
    public function edit($id)
    {
        $kelas = Kelas::findOrFail($id);
        return view('admin.kelas.edit', compact('kelas'));
    }

    // UPDATE KELAS
    public function update(Request $request, $id)
    {
        $kelas = Kelas::findOrFail($id);

        $request->validate([
            'nama_kelas' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'status_publikasi' => 'required|in:draft,publikasi',
        ]);

        $kelas->update([
            'nama_kelas' => $request->nama_kelas,
            'harga' => $request->harga,
            'status_publikasi' => $request->status_publikasi,
        ]);

        return redirect()->route('admin.kelas.index')->with('success', 'Data kelas berhasil diperbarui');
    }

    // HAPUS KELAS
    public function destroy($id)
    {
        $kelas = Kelas::findOrFail($id);

        if ($kelas->foto && Storage::exists('public/' . $kelas->foto)) {
            Storage::delete('public/' . $kelas->foto);
        }

        $kelas->delete();

        return redirect()->route('admin.kelas.index')->with('success', 'Kelas berhasil dihapus');
    }
}