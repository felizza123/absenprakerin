<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;
    protected $fillable = ['nis', 'namasiswa', 'jurusan', 'status' , 'keterangan'];

    public function absensi()
    {
        return $this->belongsTo(Absensi::class);
    }

}
