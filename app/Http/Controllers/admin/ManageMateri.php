<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Materi;
use Illuminate\Http\Request;

class ManageMateri extends Controller
{
    // MENAMPILKAN SEMUA MATERI
    public function index()
    {
        // Mengambil materi beserta relasi kelas dan mentornya (via kelas)
        // Diurutkan dari yang terbaru
        $materi = Materi::with(['kelas.mentor'])->latest()->get();
        return view('admin.materi.index', compact('materi'));
    }

    // FORM EDIT STATUS MATERI
    public function edit($id)
    {
        $materi = Materi::with('kelas')->findOrFail($id);
        return view('admin.materi.edit', compact('materi'));
    }

    // UPDATE STATUS MATERI
    public function update(Request $request, $id)
    {
        $materi = Materi::findOrFail($id);

        $request->validate([
            'status' => 'required|in:draft,pending,diterima,ditolak,non-aktif',
        ]);

        $materi->update([
            'status' => $request->status,
        ]);

        return redirect()->route('admin.materi.index')
                         ->with('success', 'Status materi berhasil diperbarui');
    }

    // HAPUS MATERI
    public function destroy($id)
    {
        $materi = Materi::findOrFail($id);
        $materi->delete();

        return redirect()->route('admin.materi.index')
                         ->with('success', 'Materi berhasil dihapus');
    }
}