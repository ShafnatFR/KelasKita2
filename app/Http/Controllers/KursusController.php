<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KursusPengguna;
use Illuminate\Support\Facades\Auth;

class KursusController extends Controller
{
    
    public function index()
    {
        $kursus = KursusPengguna::where('user_id', Auth::id())
                    ->with('kursus')
                    ->get();

        return view('murid.kursus.index', compact('kursus'));
    }

  
    public function show($kursus_id)
    {
        $kp = KursusPengguna::where('user_id', Auth::id())
                ->where('kursus_id', $kursus_id)
                ->with(['kursus.materi'])
                ->firstOrFail();

        return view('murid.kursus.detail', compact('kp'));
    }
}
