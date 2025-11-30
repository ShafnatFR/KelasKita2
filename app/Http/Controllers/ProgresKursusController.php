<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProgresKursus;
use Illuminate\Support\Facades\Auth;

class ProgresKursusController extends Controller
{
    
    public function updateProgress(Request $request)
    {
        $request->validate([
            'kursus_id' => 'required|integer',
            'materi_id' => 'required|integer',
            'selesai'   => 'required|boolean',
        ]);

        $progress = ProgresKursus::updateOrCreate(
            [
                'user_id'   => Auth::id(),
                'kursus_id' => $request->kursus_id,
                'materi_id' => $request->materi_id,
            ],
            [
                'selesai' => $request->selesai,
            ]
        );

        return response()->json([
            'status' => 'success',
            'progress' => $progress
        ]);
    }
}
