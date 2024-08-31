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
        Schema::create('data', function (Blueprint $table) {
            $table->id();
            $table->foreignID('produk_id')->constrained()->onDelete('cascade');
            $table->date('tanggal_produksi');
            $table->date('tanggal_expired');
            $table->integer('expired');
            $table->float('bulk_density')->nullable();
            $table->string('nilai');
            $table->float('salinity');
            $table->string('mesh_20')->nullable();
            $table->string('mesh_40')->nullable();
            $table->float('kadar_air');
            $table->string('salmonella')->nullable();
            $table->string('tpc')->nullable();
            $table->string('entero')->nullable();
            $table->string('ym')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data');
    }
};
