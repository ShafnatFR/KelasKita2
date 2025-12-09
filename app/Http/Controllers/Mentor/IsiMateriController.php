<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use App\Models\IsiMateri;
use App\Models\Materi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsiMateriController extends Controller
{
    // LIST SEMUA ISI MATERI MENTOR
    public function index()
    {
        $mentorId = Auth::id();

        $isi = IsiMateri::whereHas('materi.kelas', function ($q) use ($mentorId) {
            $q->where('mentor_id', $mentorId);
        })->get();

        return view('mentor.isi_materi.index', compact('isi'));
    }


    // FORM TAMBAH ISI MATERI
    public function create()
    {
        // Ambil materi milik mentor
        $materi = Materi::whereHas('kelas', function ($q) {
            $q->where('mentor_id', Auth::id());
        })->get();

        return view('mentor.isi_materi.create', compact('materi'));
    }

    // SIMPAN ISI MATERI BARU
    public function store(Request $request)
    {
        $request->validate([
            'id_materi' => 'required',
            'judul'     => 'required',
            'tipe'      => 'required|in:text,video,file',
        ]);

        $data = $request->all();

        // -----------------------------
        // TIPE TEXT
        // -----------------------------
        if ($request->tipe === 'text') {
            $request->validate(['konten' => 'required']);
        }

        // -----------------------------
        // TIPE VIDEO (auto embed)
        // -----------------------------
        if ($request->tipe === 'video') {
            $request->validate(['konten' => 'required']);
            $data['konten'] = $this->convertYoutubeToEmbed($request->konten);
        }

        // -----------------------------
        // TIPE FILE
        // -----------------------------
        if ($request->tipe === 'file') {

            if ($request->hasFile('file_path')) {
                $file = $request->file('file_path');
                $data['file_path'] = $file->store('materi/files', 'public');

                // konten tidak dipakai untuk file → isi default
                $data['konten'] = '-';

            } else {
                return back()->with('error', 'Harap upload file jika tipe adalah file.');
            }
        }

        IsiMateri::create($data);

        return redirect()->route('mentor.isi-materi.index')
            ->with('success', 'Isi materi berhasil ditambahkan');
    }


    // =============================
    // FORM EDIT ISI MATERI
    // =============================
    public function edit($id)
    {
        $isi = IsiMateri::findOrFail($id);

        $materi = Materi::whereHas('kelas', function ($q) {
            $q->where('mentor_id', Auth::id());
        })->get();

        return view('mentor.isi_materi.edit', compact('isi', 'materi'));
    }


    // =============================
    // UPDATE ISI MATERI
    // =============================
    public function update(Request $request, $id)
    {
        $isi = IsiMateri::findOrFail($id);

        $request->validate([
            'id_materi' => 'required',
            'judul'     => 'required',
            'tipe'      => 'required|in:text,video,file',
        ]);

        $data = $request->all();

        // TEXT
        if ($request->tipe === 'text') {
            $request->validate(['konten' => 'required']);
        }

        // VIDEO
        if ($request->tipe === 'video') {
            $request->validate(['konten' => 'required']);
            $data['konten'] = $this->convertYoutubeToEmbed($request->konten);
        }

        // FILE
        if ($request->tipe === 'file') {

            // Jika upload file baru
            if ($request->hasFile('file_path')) {
                $file = $request->file('file_path');
                $data['file_path'] = $file->store('materi/files', 'public');
            }

            // konten default
            $data['konten'] = '-';
        }

        $isi->update($data);

        return redirect()->route('mentor.isi-materi.index')
            ->with('success', 'Isi materi berhasil diperbarui');
    }


  
    // HAPUS ISI MATERI
    public function destroy($id)
    {
        IsiMateri::findOrFail($id)->delete();

        return redirect()->route('mentor.isi-materi.index')
            ->with('success', 'Isi materi berhasil dihapus');
    }


    // KONVERSI LINK YOUTUBE BIASA → EMBED
    private function convertYoutubeToEmbed($url)
    {
        // format watch?v=
        if (str_contains($url, 'watch?v=')) {
            return str_replace('watch?v=', 'embed/', $url);
        }

        // format youtu.be
        if (str_contains($url, 'youtu.be')) {
            $videoId = substr($url, strrpos($url, '/') + 1);
            return "https://www.youtube.com/embed/$videoId";
        }

        return $url;
    }
}
