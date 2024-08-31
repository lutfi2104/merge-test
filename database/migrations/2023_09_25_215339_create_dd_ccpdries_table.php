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
        Schema::create('dd_ccpdries', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal')->required();
            $table->time('jam')->required();
            $table->float('dd1')->nullable();
            $table->string('foto1')->nullable();
            $table->float('dd2')->nullable();
            $table->string('foto2')->nullable();
            $table->float('dd3')->nullable();
            $table->string('foto3')->nullable();
            $table->float('dd4')->nullable();
            $table->string('foto4')->nullable();
            $table->string('catatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dd_ccpdries');
    }
};
