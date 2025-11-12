<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ProgramStudi;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fakultas extends Model
{
    use HasFactory;

    protected $table = 'fakultas';
    protected $fillable = ['nama_fakultas', 'kode_fakultas'];

    public function programStudi() {
        return $this->hasMany(ProgramStudi::class);
    }
}
