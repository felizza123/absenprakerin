<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dataabsen extends Model
{
    use HasFactory;
    protected $fillable = ['nis', 'namasiswa_id', 'jurusan', 'haritanggal', 'status' ,'jam', 'keterangan'];


    public function dataabsen()
    {
        return $this->hasMany(Dataabsen::class);
    }

    public function datasiswa()
    {
        return $this->belongsTo(Datasiswa::class, 'namasiswa_id','id');
    }
    
}
