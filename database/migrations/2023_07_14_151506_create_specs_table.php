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
        Schema::create('specs', function (Blueprint $table) {
            $table->id();
            $table->foreignID('produk_id')->constrained()->onDelete('restrict');
            $table->json('bulk_density')->nullable();
            $table->string('salinity')->nullable();
            $table->string('mesh_20')->nullable();
            $table->string('mesh_40')->nullable();
            $table->string('mesh_4')->nullable();
            $table->string('mesh_4_6')->nullable();
            $table->string('mesh_40_min')->nullable();
            $table->string('mesh_20_max')->nullable();
            $table->string('mesh_1_4')->nullable();
            $table->string('mesh_5_6')->nullable();
            $table->string('mesh_1_4_5')->nullable();
            $table->string('mesh_6')->nullable();
            $table->string('mesh_6_10')->nullable();
            $table->string('kadar_air')->nullable();
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
        Schema::dropIfExists('specs');
    }
};
