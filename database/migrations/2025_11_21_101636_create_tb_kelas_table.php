<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tb_kelas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mentor_id'); // id user yang menjadi mentor
            $table->string('nama_kelas');
            $table->string('kategori');
            $table->integer('harga')->default(0);
            $table->string('foto')->nullable();
            $table->text('deskripsi_kelas')->nullable();
            $table->enum('status_publikasi', ['draft', 'pending', 'diterima', 'ditolak', 'non-aktif'])
                  ->default('draft');
            $table->timestamps();

            // relasi ke tabel user
            $table->foreign('mentor_id')->references('id')->on('tb_users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tb_kelas');
    }
};
