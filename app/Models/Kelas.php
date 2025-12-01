<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function mentor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'mentor_id');
    }

    public function materi(): HasMany
    {
    return $this->hasMany(Materi::class, 'kelas_id');
    }
}
