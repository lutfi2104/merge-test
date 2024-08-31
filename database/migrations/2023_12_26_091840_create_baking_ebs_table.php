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
        Schema::create('baking_ebs', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->foreignID('nama_produk_id')->constrained()->onDelete('cascade');
            $table->integer('no_batch');
            $table->string('no_mixer');
            $table->float('tambah_air');
            $table->time('mixing_in');
            $table->time('mixing_out');
            $table->time('proofing_in');
            $table->time('profing_out');
            $table->time('baking_in');
            $table->time('baking_out');
            $table->integer('no_eb');
            $table->integer('no_gerobak');
            $table->float('suhu_produk');
            $table->string('bulan');
            $table->integer('tahun');
            $table->string('op');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('baking_ebs');
    }
};
