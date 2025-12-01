<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'tb_users'; // <- penting

    protected $fillable = [
        'username',
        'email',
        'password',
        'no_telpon',
        'alamat',
        'status',
        'foto_profil',
        'role',
    ];

    protected $hidden = [
        'password'
    ];

    protected $casts = [
        'password' => 'hashed',
    ];

    // app/Models/User.php
    public function mentor()
    {
        // Relasi 1-to-1 ke tabel tb_mentor
        return $this->hasOne(Mentor::class, 'user_id');
    }

    public function kelas()
    {
        // Jika user adalah mentor, dia punya banyak kelas
        return $this->hasMany(Kelas::class, 'mentor_id');
    }
}
