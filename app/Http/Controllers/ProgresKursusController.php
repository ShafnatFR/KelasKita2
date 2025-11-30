<?php

namespace App\Http\Controllers;

use App\Models\ProgresKursus;
use App\Models\KursusPengguna; 
use App\Models\IsiMateri; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProgresKursusController extends Controller
{
    public function updateProgress(Request $request)
    {
        $request->validate([
            'isi_materi_id' => 'required|exists:isi_materi,id',
            'is_checked' => 'required|boolean',
        ]);

        $userId = Auth::id();
        $isiMateri = IsiMateri::findOrFail($request->isi_materi_id);
        $kursusId = $isiMateri->materi->kursus_id; 
        $isChecked = $request->is_checked;

        
        ProgresKursus::updateOrCreate(
            [
                'kursus_id' => $kursusId,
                'user_id' => $userId,
                'isi_materi_id' => $isiMateri->id,
            ],
            [
                'selesai' => $isChecked,
            ]
        );

        
        $totalMateri = IsiMateri::whereHas('materi', function ($query) use ($kursusId) {
            $query->where('kursus_id', $kursusId);
        })->count();

        $materiSelesai = ProgresKursus::where('kursus_id', $kursusId)
                                     ->where('user_id', $userId)
                                     ->where('selesai', true)
                                     ->count();

        $persentaseBaru = ($totalMateri > 0) ? round(($materiSelesai / $totalMateri) * 100) : 0;

       
        KursusPengguna::where('user_id', $userId)
                       ->where('kursus_id', $kursusId)
                       ->update(['persentase_progress' => $persentaseBaru]);


        return response()->json([
            'success' => true, 
            'persentase_baru' => $persentaseBaru,
        ]);
    }
}