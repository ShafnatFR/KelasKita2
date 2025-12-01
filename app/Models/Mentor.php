<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mentor extends Model
{
    protected $table = 'tb_mentor';
<<<<<<< HEAD
    protected $fillable = ['user_id', 'status'];
=======

    protected $fillable = [
        'user_id',
        'status',
    ];
>>>>>>> 7963d1fc0c914805c72044fdcdd1c1aaac1cc9af
}
