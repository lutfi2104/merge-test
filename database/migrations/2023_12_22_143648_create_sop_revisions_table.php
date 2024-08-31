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
        Schema::create('sop_revisions', function (Blueprint $table) {
            $table->id();
            $table->string('sop_id');
            $table->string('judul');
            $table->string('kode_dokumen');
            $table->string('rincian_revisi');
            $table->string('revisi');
            $table->date('tgl_efektif');
            $table->unsignedBigInteger('pic');
            $table->foreign('pic')->references('id')->on('users')->onDelete('cascade');
            $table->string('jenis');
            $table->unsignedBigInteger('dept');
            $table->foreign('dept')->references('id')->on('departements')->onDelete('cascade');
            $table->string('file');
            $table->string('status');
            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sop_revisions');
    }
};
