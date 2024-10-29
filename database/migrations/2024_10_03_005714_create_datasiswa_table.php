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
        Schema::create('datasiswa', function (Blueprint $table) {
            $table->id();
            $table->string('nis', 8);
            $table->string('nama');
            $table->string('jurusan');
            $table->date('mulaiprakerin');
            $table->date('akhirprakerin');
            $table->string('foto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datasiswa');
    }
};
