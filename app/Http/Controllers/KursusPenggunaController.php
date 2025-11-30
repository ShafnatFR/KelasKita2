<?php

namespace App\Http\Controllers;

use App\Models\KursusPengguna;
use Illuminate\Support\Facades\Auth;

class KursusPenggunaController extends Controller
{
   
    public function cekKepemilikan($kursus_id)
    {
        $punya = KursusPengguna::where('user_id', Auth::id())
                ->where('kursus_id', $kursus_id)
                ->exists();

        return response()->json(['punya' => $punya]);
    }
}
