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
        Schema::create('nama_produk_suppliers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('supplier_id')->constrained()->onDelete('cascade');
            $table->foreignId('produk_supplier_id')->constrained()->onDelete('cascade');
            $table->string('nama_produk')->required();
            $table->string('satuan')->required();
            $table->string('kemasan')->required();
            $table->integer('berat')->required();
            $table->date('masa_halal')->nullable();
            $table->string('by_halal')->nullable();
            $table->string('kode')->required()->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nama_produk_suppliers');
    }
};
