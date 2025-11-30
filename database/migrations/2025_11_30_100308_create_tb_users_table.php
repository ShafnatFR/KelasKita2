<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tb_users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('no_telpon')->nullable();
            $table->string('alamat')->nullable();
            $table->string('foto_profil')->nullable()->default('default.png');
            $table->enum('status', ['aktif', 'non-aktif'])->default('aktif');
            $table->enum('role', ['murid', 'mentor', 'admin'])->default('murid');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tb_users');
    }
};
