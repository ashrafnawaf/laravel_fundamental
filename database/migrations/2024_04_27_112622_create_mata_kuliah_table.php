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
        Schema::create('mata_kuliah', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('prodi_id');
            $table->foreign('prodi_id')->references('id')->on('prodi');
            $table->integer('dosen_id');
            $table->foreign('dosen_id')->references('id')->on('dosen');
            $table->string('nama');
            $table->dateTime('waktu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mata_kuliah');
    }
};