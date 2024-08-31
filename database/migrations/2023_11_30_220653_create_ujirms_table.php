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
        Schema::create('ujirms', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_datang')->required();
            $table->foreignId('nama_produk_supplier_id')->required()->constrained()->onDelete('cascade');
            $table->string('supplier_id')->nullable()->default(null);
            $table->string('no_batch')->required();
            $table->date('halal');
            $table->string('bersih');
            $table->string('kondisi');
            $table->string('aroma');
            $table->string('bentuk');
            $table->string('warna')->required();
            $table->string('sebutkan')->nullable();
            $table->integer('sample');
            $table->string('asing')->required();
            $table->string('coa')->nullable();
            $table->string('rasa')->nullable();
            $table->float('suhu')->nullable();
            $table->text('note')->nullable()->default(null);
            $table->text('status')->required();
            $table->string('qty')->required();
            $table->time('start_smp')->nullable();
            $table->time('end_smp')->nullable();
            $table->string('date_smp')->nullable();
            $table->string('user_name')->nullable();
            $table->string('comp_doc')->required();
            $table->string('cek_area')->required();
            $table->string('from_area')->required();
            $table->string('sj')->nullable();
            $table->string('uom')->required();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ujirms');
    }
};
