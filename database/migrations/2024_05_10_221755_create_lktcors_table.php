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
        Schema::create('lktcors', function (Blueprint $table) {
            $table->id();
            $table->string('root_cause')->required();
            $table->string('corrective_action')->required();
            $table->string('preventive_action')->required();
            $table->string('nama_pic')->required();
            $table->date('tanggal_isi')->required();
            $table->date('due_date')->required();
            $table->foreignId('lkt_id')->constrained()->onDelete('cascade'); //ok
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lktcors');
    }
};
