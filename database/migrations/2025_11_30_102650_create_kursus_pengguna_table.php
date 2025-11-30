<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kursus_pengguna', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');   
            $table->unsignedBigInteger('kursus_id');
            $table->enum('status', ['berlangsung', 'selesai'])->default('berlangsung');
            $table->timestamps();

            $table->foreign('user_id')
                  ->references('id')
                  ->on('tb_users')
                  ->onDelete('cascade');

            $table->foreign('kursus_id')
                  ->references('id')
                  ->on('kursus')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kursus_pengguna');
    }
};
