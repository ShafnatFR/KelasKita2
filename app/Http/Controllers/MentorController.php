<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;

class MentorController extends Controller
{
    public function upgrade()
    {
        $user = auth()->user();

        $user->role = 'mentor';
        $user->save();

        return redirect('/mentor/kelas')->with('success', 'Anda sekarang menjadi mentor');
    }
}
