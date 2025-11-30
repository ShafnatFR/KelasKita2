<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kursus', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('deskripsi');
            $table->string('thumbnail')->nullable();
            $table->unsignedBigInteger('mentor_id'); 
            $table->timestamps();

            $table->foreign('mentor_id')
                  ->references('id')
                  ->on('tb_users')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kursus');
    }
};
