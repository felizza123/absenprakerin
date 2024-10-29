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
        Schema::create('dataabsen', function (Blueprint $table) {
            $table->id();
            $table->string('nis', 8);
            $table->string('namasiswa_id', 128);
            $table->string('jurusan');
            $table->date('haritanggal');
            $table->enum('status' , ['Hadir' , ['Izin', 'Sakit']])->default('Hadir');
            $table->longText('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dataabsen');
    }
};
