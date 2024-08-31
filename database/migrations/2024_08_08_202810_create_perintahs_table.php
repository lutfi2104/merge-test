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
        Schema::create('perintahs', function (Blueprint $table) {
            $table->id();
            $table->foreignID('produk_id')->constrained()->onDelete('restrict');
            $table->foreignID('mesin_id')->constrained()->onDelete('restrict');
            $table->date('tanggal_produksi_coa')->nullable();
            $table->date('tanggal_expired_coa')->nullable();
            $table->date('tanggal_produksi');
            $table->date('tanggal_expired');
            $table->string('komposisi')->nullable();
            $table->string('screen')->nullable();
            $table->string('bobot')->nullable();
            $table->string('appearance')->nullable();
            $table->string('created_by')->nullable();
            $table->string('packaging')->nullable();
            $table->text('catatan')->nullable();
            $table->foreignID('shift_id')->constrained()->onDelete('restrict');
            $table->string('no_batch');
            $table->foreignID('spec_id')->constrained()->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perintahs');
    }
};
