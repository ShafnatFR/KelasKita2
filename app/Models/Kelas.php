<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'tb_kelas';

    protected $fillable = [
        'mentor_id',
        'nama_kelas',
        'kategori',
        'harga',
        'foto',
        'deskripsi_kelas',
        'status_publikasi'
    ];
}
