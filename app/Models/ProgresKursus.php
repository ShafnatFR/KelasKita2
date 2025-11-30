<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgresKursus extends Model
{
    use HasFactory;

    protected $table = 'progres_kursus';

    protected $fillable = [
        'user_id',
        'kursus_id',
        'materi_id',
        'selesai',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function kursus()
    {
        return $this->belongsTo(Kursus::class, 'kursus_id');
    }

    public function materi()
    {
        //return $this->belongsTo(Materi::class, 'materi_id');
    }
}
