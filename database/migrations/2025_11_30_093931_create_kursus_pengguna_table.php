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
         
            $table->foreignId('user_id')->constrained('tb_users')->onDelete('cascade');
            $table->foreignId('course_id')->constrained('kursus')->onDelete('cascade'); 
            $table->integer('progress_percentage')->default(0);
            $table->timestamp('enrolled_at')->useCurrent();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kursus_pengguna');
    }
};