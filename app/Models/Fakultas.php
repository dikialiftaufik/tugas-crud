<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ProgramStudi;

class Fakultas extends Model
{
    protected $table = 'fakultas';
    protected $fillable = ['nama_fakultas', 'kode_fakultas'];

    public function programStudi() {
        return $this->hasMany(ProgramStudi::class);
    }
}
