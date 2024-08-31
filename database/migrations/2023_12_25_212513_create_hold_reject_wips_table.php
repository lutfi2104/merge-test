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
        Schema::create('hold_reject_wips', function (Blueprint $table) {
            $table->id();
            $table->foreignID('produk_id')->constrained()->onDelete('cascade');
            $table->foreignID('mesin_id')->constrained()->onDelete('cascade');
            $table->date('tanggal_produksi');
            $table->foreignID('shift_id')->constrained()->onDelete('cascade');
            $table->date('tanggal_expired');
            $table->string('kode_batch');
            $table->float('jumlah');
            $table->string('status');
            $table->string('alasan');
            $table->string('rekomendasi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hold_reject_wips');
    }
};
