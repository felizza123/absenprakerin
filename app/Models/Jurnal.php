<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurnal extends Model
{
    use HasFactory;
    protected $fillable = ['nis','namasiswa_id','jurusan','haritanggal','waktumulai','waktuselesai','jurnal'];

    public function datasiswa()
    {
        return $this->belongsTo(Datasiswa::class, 'namasiswa_id');
    }
}
