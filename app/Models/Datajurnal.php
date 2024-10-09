<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datajurnal extends Model
{
    use HasFactory;
    protected $fillable = ['nis', 'namasiswa_id', 'haritanggal', 'jurusan', 'waktumulai', 'waktuselesai', 'jurnal'];


    public function datajurnal()
    {
        return $this->hasMany(Datajurnal::class);
    }

    public function datasiswa()
    {
        return $this->belongsTo(Datasiswa::class, 'namasiswa_id');
    }
}
