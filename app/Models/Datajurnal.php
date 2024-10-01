<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datajurnal extends Model
{
    use HasFactory;
    protected $fillable = ['nis', 'nama', 'hari_tanggal', 'jam', 'jurnal'];


    public function datajurnal()
    {
        return $this->hasMany(Datajurnal::class);
    }
}
