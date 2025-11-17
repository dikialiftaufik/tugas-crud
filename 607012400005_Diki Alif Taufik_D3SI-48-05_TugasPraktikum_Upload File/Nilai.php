<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;

    protected $table = 'nilai';
    protected $primaryKey = 'id_nilai';
    protected $fillable = [
        'NIM',
        'id_mk',
        'nilai', 
        'berkas'
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(\App\Models\Mahasiswa::class, 'NIM', 'NIM');
    }

    public function mataKuliah()
    {
        return $this->belongsTo(\App\Models\MataKuliah::class, 'id_mk', 'id_mk');
    }
}
