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
        Schema::create('pengujians', function (Blueprint $table) {
            $table->id();
            $table->foreignID('produk_id')->constrained()->onDelete('restrict');
            $table->foreignID('mesin_id')->constrained()->onDelete('restrict');
            // $table->foreignId('spec_id')->constrained('specs')->onDelete('restrict'); // Menghubungkan ke tabel specs
            $table->date('tanggal_produksi');
            $table->date('tanggal_produksi_coa');
            $table->foreignID('shift_id')->constrained()->onDelete('restrict');
            $table->unsignedBigInteger('spec_id');
            $table->foreign('spec_id')->references('produk_id')->on('specs')->onDelete('restrict');
            $table->date('tanggal_expired');
            $table->date('tanggal_expired_coa');
            $table->integer('sak_awal');
            $table->integer('sak_akhir')->nullable();
            $table->integer('jumlah_sak');
            $table->string('no_batch');
            $table->string('no_batch_coa');
            $table->string('catatan')->nullable();
            $table->string('visual')->requaired();
            $table->json('bulk_density')->nullable();
            $table->string('salinity')->nullable();
            $table->string('mesh_20')->nullable();
            $table->string('mesh_40')->nullable();
            $table->string('mesh_4')->nullable();
            $table->string('mesh_4_6')->nullable();
            $table->string('mesh_5_6')->nullable();
            $table->string('mesh_20_max')->nullable();
            $table->string('mesh_1_4')->nullable();
            $table->string('mesh_1_4_5')->nullable();
            $table->string('mesh_6')->nullable();
            $table->string('mesh_6_10')->nullable();
            $table->string('kadar_air')->nullable();
            $table->string('salmonella')->nullable();
            $table->string('tpc')->nullable();
            $table->string('entero')->nullable();
            $table->string('ym')->nullable();
            $table->string('bulan')->nullable();
            $table->integer('tahun')->nullable();
            $table->string('qc')->nullable();
            $table->string('jenis')->nullable();
            $table->string('method_prd')->required();
            $table->string('ash')->nullable();
            $table->string('wet_gluten')->nullable();
            $table->string('protein')->nullable();
            $table->string('lab')->nullable();
            $table->string('f_number')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengujians');
    }
};
