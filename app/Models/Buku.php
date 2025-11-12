<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Buku extends Model
{
    use HasFactory;
    protected $table = 'buku';
    protected $fillable = ['judul_buku', 'penulis', 'perpustakaan_id'];

    public function perpustakaan(): BelongsTo{
        return $this->belongsTo(Perpustakaan::class);
    }
}