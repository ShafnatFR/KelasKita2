<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kursus extends Model
{
    use HasFactory;

    protected $table = 'kursus';

    protected $fillable = [
        'judul',
        'deskripsi',
        'thumbnail',
        'mentor_id',
    ];

    // Relasi ke mentor
    public function mentor()
    {
        return $this->belongsTo(User::class, 'mentor_id');
    }

    // Relasi ke materi
    public function materi()
    {
        //return $this->hasMany(Materi::class, 'kursus_id');
    }

    // Relasi ke kursus pengguna (murid)
    public function kursusPengguna()
    {
        return $this->hasMany(KursusPengguna::class, 'kursus_id');
    }

    // Relasi ke ulasan
    public function ulasan()
    {
        return $this->hasMany(Ulasan::class, 'kursus_id');
    }
}
