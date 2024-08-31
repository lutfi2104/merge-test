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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('nama_supplier')->nullable();
            $table->string('asal_supplier')->nullable();
            $table->string('nama_produsen')->required();
            $table->string('asal_produsen')->required();
            $table->string('alamat1')->required();
            $table->string('alamat2')->nullable();
            $table->string('no_tlp')->nullable();
            $table->string('nama_pic')->required();
            $table->string('jabatan')->required();
            $table->string('email')->required();
            $table->string('no_hp')->required();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};
