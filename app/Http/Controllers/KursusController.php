<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\KursusPengguna;

class KursusController extends Controller
{
    public function index()
    {
        $kursus = KursusPengguna::where('user_id', Auth::id())
                    ->with('kursus.materi')
                    ->get();

        return view('murid.kursus.index', compact('kursus'));
    }

    public function show($id)
    {
        $kp = KursusPengguna::where('user_id', Auth::id())
                ->where('kursus_id', $id)
                ->with(['kursus.materi.progres'])
                ->firstOrFail();

        return view('murid.kursus.detail', compact('kp'));
    }
}
