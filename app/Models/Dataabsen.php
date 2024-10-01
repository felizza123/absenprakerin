<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dataabsen extends Model
{
    use HasFactory;
    protected $fillable = ['nis', 'namasiswa', 'jurusan', 'status' ,'jam', 'keterangan'];


    public function dataabsen()
    {
        return $this->hasMany(Dataabsen::class);
    }
}
