<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ulasan;
use App\Models\ProgresKursus;
use Illuminate\Support\Facades\Auth;

class UlasanController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'kursus_id' => 'required|integer',
            'rating'    => 'required|integer|min:1|max:5',
            'isi_ulasan' => 'nullable|string'
        ]);

       
        $totalMateri = ProgresKursus::where('kursus_id', $request->kursus_id)->count();
        $selesai = ProgresKursus::where('kursus_id', $request->kursus_id)
                                ->where('selesai', true)
                                ->count();

        if ($totalMateri == 0 || $selesai < $totalMateri) {
            return back()->with('error', 'Anda harus menyelesaikan semua materi sebelum memberi ulasan.');
        }

        Ulasan::updateOrCreate(
            [
                'user_id'   => Auth::id(),
                'kursus_id' => $request->kursus_id,
            ],
            [
                'rating'     => $request->rating,
                'isi_ulasan' => $request->isi_ulasan,
            ]
        );

        
        return redirect()->route('ulasan.hasil', $request->kursus_id)
                         ->with('success', 'Ulasan berhasil dikirim!');
    }

    public function hasilUlasan($kursus_id)
    {
        $ulasan = Ulasan::where('user_id', Auth::id())
                         ->where('kursus_id', $kursus_id)
                         ->firstOrFail();

        return view('murid.kursus.hasil_ulasan', compact('ulasan'));
    }
}
