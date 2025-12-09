<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kelas;
use Illuminate\Support\Facades\Auth;

class KelasController extends Controller
{
    public function index()
    {
        $mentorId = Auth::id();

        $kelas = Kelas::where('mentor_id', $mentorId)->get();

        return view('mentor.kelas.index', compact('kelas'));
    }

    public function create()
    {
        return view('mentor.kelas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required',
            'kategori' => 'required',
            'harga' => 'required|numeric',
            'deskripsi_kelas' => 'required'
        ]);

        Kelas::create([
            'mentor_id' => Auth::id(),
            'nama_kelas' => $request->nama_kelas,
            'kategori' => $request->kategori,
            'harga' => $request->harga,
            'deskripsi_kelas' => $request->deskripsi_kelas,
            'status_publikasi' => 'draft',
        ]);

        return redirect()->route('mentor.kelas.index')
                         ->with('success', 'Kelas berhasil dibuat!');
    }

    public function edit($id)
    {
        $kelas = Kelas::findOrFail($id);

        return view('mentor.kelas.edit', compact('kelas'));
    }

    public function update(Request $request, $id)
    {
        $kelas = Kelas::findOrFail($id);

        $kelas->update($request->all());

        return redirect()->route('mentor.kelas.index')
                         ->with('success', 'Kelas berhasil diperbarui!');
    }

    public function destroy($id)
    {
        Kelas::findOrFail($id)->delete();

        return redirect()->route('mentor.kelas.index')
                         ->with('success', 'Kelas berhasil dihapus!');
    }

    
}
