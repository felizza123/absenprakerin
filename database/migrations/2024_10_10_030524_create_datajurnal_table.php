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
            $table->string('nis', 8);
            $table->string('namasiswa_id', 128)->references('id')->on('datasiswa')->onDelete('cascade');;
            $table->string('jurusan');
            $table->date('haritanggal');
            $table->time('waktumulai');
            $table->time('waktuselesai');
            $table->longText('jurnal', 255);
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
