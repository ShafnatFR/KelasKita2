<?php

namespace App\Http\Controllers;

use App\Models\KursusPengguna;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class KursusPenggunaController extends Controller
{
    
    public function cekKepemilikan($kursus_id)
    {
        $punya = KursusPengguna::where('user_id', Auth::id())
                ->where('kursus_id', $kursus_id)
                ->exists();

        return response()->json(['punya' => $punya]);
    }

   
    public function show($kursusId)
    {
        $userId = Auth::id();

        
        $kursusPengguna = KursusPengguna::where('user_id', $userId)
            ->where('kursus_id', $kursusId)
            ->with([
                'kursus',             
                'kursus.materi.isiMateri',
                'kursus.ulasan',     
                'progres'             
            ])
            ->firstOrFail();

        
        $totalMateri = $kursusPengguna->kursus->materi->flatMap(fn($m) => $m->isiMateri)->count();
        $materiSelesai = $kursusPengguna->progres->where('selesai', true)->count();
        $progressPercent = ($totalMateri > 0) ? round(($materiSelesai / $totalMateri) * 100) : 0;
      
        $sudahUlas = $kursusPengguna->ulasan()->exists();

        return view('murid.kursus.detail', compact('kursusPengguna', 'progressPercent', 'sudahUlas'));
    }
}