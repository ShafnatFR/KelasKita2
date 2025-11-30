<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KursusPengguna extends Model
{
    use HasFactory;

    protected $table = 'kursus_pengguna';

    protected $fillable = [
        'user_id',
        'kursus_id',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function kursus()
    {
        return $this->belongsTo(Kursus::class, 'kursus_id');
    }

    public function progres()
    {
        return $this->hasMany(ProgresKursus::class, 'kursus_id', 'kursus_id')
                    ->where('user_id', $this->user_id);
    }

    public function ulasan()
    {
        return $this->hasOne(Ulasan::class, 'kursus_id', 'kursus_id')
                    ->where('user_id', $this->user_id);
    }
}
