<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kursus_pengguna', function (Blueprint $table) {
    
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('course_id');
            
            $table->integer('progress_percentage')->default(0);
            $table->timestamp('enrolled_at')->useCurrent();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('tb_users')->onDelete('cascade');
            $table->foreign('course_id')->references('id')->on('kursus')->onDelete('cascade');
            $table->primary(['user_id', 'course_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kursus_pengguna');
    }
};