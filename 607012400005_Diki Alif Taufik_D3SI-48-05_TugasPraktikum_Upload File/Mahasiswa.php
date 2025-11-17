<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $table = "mahasiswa";
    protected $primaryKey = 'NIM';
    protected $fillable = ['NIM', 'nama', 'email', 'id_prodi', 'foto'];
    public $incrementing = false;
    protected $keyType = 'string';

  
    public function prodi()
    {
        return $this->belongsTo(\App\Models\Prodi::class, 'id_prodi', 'id_prodi');
    }

    public function nilai()
    {
        return $this->hasMany(\App\Models\Nilai::class, 'NIM', 'NIM');
    }
}