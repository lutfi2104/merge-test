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
        Schema::create('sops', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('kode_dokumen');
            $table->string('revisi');
            $table->string('rincian_revisi')->nullable();
            $table->date('tgl_efektif');
            $table->integer('pic');
            $table->string('jenis');
            $table->integer('dept');
            $table->string('file')->nullable();
            $table->json('copy_doc')->nullable();
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sops');
    }
};
