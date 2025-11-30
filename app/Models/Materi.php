<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;

    protected $table = 'tb_materi';

    protected $fillable = [
        'kelas_id',
        'urutan',
        'judul_materi',
        'deskripsi_materi',
        'status'
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    public function isiMateri()
    {
        return $this->hasMany(IsiMateri::class, 'id_materi');
    }

     
    public function progres()
    {
        return $this->hasMany(ProgresKursus::class, 'materi_id');
    }

 
    public function kursusPengguna()
    {
        return $this->hasManyThrough(
            KursusPengguna::class,
            Kursus::class,
            'id',        
            'kursus_id', 
            'kelas_id',  
            'id'       
        );
    }
}

