<?php

namespace App\Http\Controllers\admin; // Perbaikan Namespace

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Laporan;

class ManageLaporan extends Controller
{
    // Menampilkan semua laporan
    public function index()
    {
        $laporans = Laporan::with(['user', 'kelas'])->latest()->get();
        return view('admin.laporan.index', compact('laporans'));
    }

    // Mengupdate status laporan (misal: dari 'belum diproses' jadi 'selesai')
    public function update(Request $request, string $id)
    {
        $laporan = Laporan::findOrFail($id);

        $request->validate([
            'status_laporan' => 'required|in:belum diproses,diproses,selesai,ditolak'
        ]);

        $laporan->update([
            'status_laporan' => $request->status_laporan
        ]);

        return redirect()->route('admin.laporan.index')->with('success', 'Status laporan berhasil diperbarui');
    }

    // Menghapus laporan
    public function destroy(string $id)
    {
        $laporan = Laporan::findOrFail($id);
        $laporan->delete();

        return redirect()->route('admin.laporan.index')->with('success', 'Laporan berhasil dihapus');
    }
}