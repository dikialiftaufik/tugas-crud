<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Prodi extends Model
{
    use HasFactory;

    protected $table = 'prodi';
    protected $primaryKey = 'id_prodi';
    public $incrementing = true;
    protected $fillable = [
        'nama_prodi',
        'fakultas',
    ];
    public $timestamps = true;

    
    public function mahasiswa()
    {
        return $this->hasMany(\App\Models\Mahasiswa::class, 'id_prodi', 'id_prodi');
    }

}
