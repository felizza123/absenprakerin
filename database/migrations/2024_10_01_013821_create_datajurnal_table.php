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
        Schema::create('datajurnal', function (Blueprint $table) {
            $table->id();
            $table->string('nis', 8)->unique();
            $table->string('nama', 128);
            $table->date('hari_tanggal');
            $table->time('jam');
            $table->longText('jurnal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datajurnal');
    }
};
