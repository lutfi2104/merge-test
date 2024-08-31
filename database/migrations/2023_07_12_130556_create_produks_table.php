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
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('jenis');
            $table->string('kode_produk')->unique();
            $table->foreignID('template_id')->constrained()->onDelete('restrict');
            $table->integer('expired');
            $table->string('color');
            $table->string('texture');
            $table->string('flavor');
            $table->string('granule')->nullable();
            $table->string('appearance')->nullable();
            $table->string('packaging');
            $table->string('taste');
            $table->string('partical_size')->nullable();
            $table->string('screen_mm')->nullable();
            $table->string('filth_insect')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
