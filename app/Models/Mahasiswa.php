<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function laporan(){
        return $this->hasOne(Laporan::class);
    }
    public function bimbingan(){
        return $this->hasOne(Bimbingan::class);
    }
}
