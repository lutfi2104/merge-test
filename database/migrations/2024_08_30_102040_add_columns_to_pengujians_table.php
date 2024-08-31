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
        Schema::table('pengujians', function (Blueprint $table) {
            $table->string('mesh_30')->nullable();
            $table->string('mesh_40_kurang')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pengujians', function (Blueprint $table) {
            //
        });
    }
};
