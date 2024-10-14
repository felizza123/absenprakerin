<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Datasiswa;

class Riwayatabsensi extends Model
{
    use HasFactory;
    protected $fillable = ['nis','namasiswa_id','jurusan','haritanggal','status','keterangan'];

    public function datasiswa()
    {
        return $this->belongsTo(Datasiswa::class, 'namasiswa_id','id');
    }
}
