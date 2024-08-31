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
        Schema::create('bintik_hitams', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->time('jam');

            $table->unsignedBigInteger('produk_id_1');
            $table->foreign('produk_id_1')->references('id')->on('nama_produks')->onDelete('cascade');

            $table->string('bintik_hitam_dd1')->nullable();
            $table->string('partikel_hitam_dd1')->nullable();
            $table->string('benda_asing_dd1')->nullable();
            $table->string('catatan_dd1')->nullable();
            $table->float('gumpalan_dd1')->nullable();
            $table->float('dd1')->nullable();


            $table->unsignedBigInteger('produk_id_2');
            $table->foreign('produk_id_2')->references('id')->on('nama_produks')->onDelete('cascade');

            $table->string('bintik_hitam_dd2')->nullable();
            $table->string('partikel_hitam_dd2')->nullable();
            $table->string('benda_asing_dd2')->nullable();
            $table->string('catatan_dd2')->nullable();
            $table->float('gumpalan_dd2')->nullable();
            $table->float('dd2')->nullable();

            $table->unsignedBigInteger('produk_id_3');
            $table->foreign('produk_id_3')->references('id')->on('nama_produks')->onDelete('cascade');

            $table->string('bintik_hitam_dd3')->nullable();
            $table->string('partikel_hitam_dd3')->nullable();
            $table->string('benda_asing_dd3')->nullable();
            $table->string('catatan_dd3')->nullable();
            $table->float('gumpalan_dd3')->nullable();
            $table->float('dd3')->nullable();

            $table->unsignedBigInteger('produk_id_4');
            $table->foreign('produk_id_4')->references('id')->on('nama_produks')->onDelete('cascade');

            $table->string('bintik_hitam_dd4')->nullable();
            $table->string('partikel_hitam_dd4')->nullable();
            $table->string('benda_asing_dd4')->nullable();
            $table->string('catatan_dd4')->nullable();
            $table->float('gumpalan_dd4')->nullable();
            $table->float('dd4')->nullable();
            $table->string('bulan')->nullable();
            $table->integer('tahun')->nullable();
            $table->string('op')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bintik_hitams');
    }
};
