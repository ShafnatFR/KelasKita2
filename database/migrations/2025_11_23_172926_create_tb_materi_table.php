<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tb_materi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kelas_id')->constrained('tb_kelas')->onDelete('cascade');
            $table->integer('urutan')->default('1');
            $table->string('judul_materi');
            $table->text('deskripsi_materi');
            $table->enum('status', ['draft', 'pending', 'diterima', 'ditolak', 'non-aktif']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_materi');
    }
};
