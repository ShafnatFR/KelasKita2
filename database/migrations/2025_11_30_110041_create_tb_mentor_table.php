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
        Schema::create('tb_mentor', function (Blueprint $table) {
        $table->id(); // PK
        $table->unsignedBigInteger('user_id');
        $table->enum('status', ['aktif', 'non-aktif'])->default('aktif');
        $table->string('keahlian')->nullable();
        $table->text('pengalaman')->nullable();
        $table->text('deskripsi')->nullable();
        $table->string('website_url')->nullable();
        $table->timestamps();

        $table->foreign('user_id')
            ->references('id')
            ->on('tb_users')
            ->onDelete('cascade');
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_mentor');
    }
};
