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
        Schema::create('kalibrasis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_alat')->required();
            $table->string('merk')->nullable();
            $table->string('type')->nullable();
            $table->string('nomor_seri')->nullable();
            $table->string('rentang_ukur')->required();
            $table->string('resolusi')->required();
            $table->string('tempat')->required();
            $table->date('tgl_kalibrasi')->required(); // Fixed missing arrow
            $table->string('kalibrasi')->nullable();
            $table->string('verifikasi')->nullable();
            $table->string('kalibrator')->nullable(); // Fixed typo in the variable name
            $table->string('sertifikat')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kalibrasis');
    }
};
