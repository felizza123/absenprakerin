<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datasiswa extends Model
{
    use HasFactory;

    protected $fillable = ['nama'];

    public function datasiswa()
    {
        return $this->hasMany(Datasiswa::class);
    }
}
