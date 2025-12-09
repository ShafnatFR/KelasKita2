<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Materi;
use App\Models\Kelas;
use Illuminate\Support\Facades\Auth;

class MateriController extends Controller
{
    public function index()
    {
        $mentorId = Auth::id();

        $materi = Materi::whereHas('kelas', function ($q) use ($mentorId) {
            $q->where('mentor_id', $mentorId);
        })->get();

        return view('mentor.materi.index', compact('materi'));
    }

    public function create()
    {
        $kelas = Kelas::where('mentor_id', Auth::id())->get();

        return view('mentor.materi.create', compact('kelas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kelas_id' => 'required',
            'judul_materi' => 'required',
            'urutan' => 'required|integer',
        ]);

        Materi::create($request->all());

        return redirect()->route('mentor.materi.index')
                         ->with('success', 'Materi berhasil ditambahkan');
    }

    public function edit($id)
    {
        $materi = Materi::findOrFail($id);

        $kelas = Kelas::where('mentor_id', Auth::id())->get();

        return view('mentor.materi.edit', compact('materi', 'kelas'));
    }

    public function update(Request $request, $id)
    {
        $materi = Materi::findOrFail($id);

        $materi->update($request->all());

        return redirect()->route('mentor.materi.index')
                         ->with('success', 'Materi berhasil diperbarui');
    }

    public function destroy($id)
    {
        Materi::findOrFail($id)->delete();

        return redirect()->route('mentor.materi.index')
                         ->with('success', 'Materi berhasil dihapus');
    }
	
	public function search($id){
		$materi = Materi::findOrFail($id);
		
		return redirect()->route('mentor.materi.index')
						->with('Materi sudah ditemukan');
		}
		
}
