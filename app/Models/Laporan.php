<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $table = 'tb_laporan';
    protected $fillable = ['kategori_report', 'keterangan_report', 'status_laporan', 'kelas_id', 'user_id'];

    // --- TAMBAHKAN KODE DI BAWAH INI ---
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }
}