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
        Schema::create('lkts', function (Blueprint $table) {
            $table->id();
            $table->string('nama_inisiator')->required(); //0k
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); //ok
            $table->foreignId('departement_id')->constrained()->onDelete('cascade'); //ok
            $table->string('departement')->required();
            $table->string('type_lkt')->required(); //0k
            $table->string('subject')->required(); //0k
            $table->string('isi')->required();//
            $table->string('jenis')->required(); //jenis
            $table->date('tanggal')->required(); // tanggal
            $table->string('nama_produk')->nullable(); //
            $table->string('kode_produk')->nullable();
            $table->string('jumlah_produk')->nullable();
            $table->string('status')->nullable();
            $table->string('data_pelanggan')->nullable();
            $table->string('halal')->required();
            $table->string('nama_pic')->nullable();
            // $table->string('root_cause')->nullable();
            // $table->string('corrective_action')->nullable();
            // $table->string('preventive_action')->nullable();
            // $table->string('nama_pic')->nullable();
            // $table->date('tanggal_isi')->nullable();
            // $table->date('due_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lkts');
    }
};
