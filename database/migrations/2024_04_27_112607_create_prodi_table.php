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
        Schema::create('prodi', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('fakultas_id');
            $table->foreign('fakultas_id')->references('id')->on('fakultas');
            $table->string('nama');
            $table->enum('jenjang', ['D3', 'S1', 'S2'])->default('S1');
            $table->integer('kaprodi_id');
            $table->foreign('kaprodi_id')->references('id')->on('dosen');
            $table->string('telp_number');
            $table->text('deskripsi')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prodi');
    }
};