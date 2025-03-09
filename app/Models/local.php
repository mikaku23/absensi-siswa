<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class local extends Model
{
    protected $fillable = ['nama', 'id_jurusan', 'id_guru'];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'id_jurusan');
    }

    // Relasi ke tabel guru
    public function guru()
    {
        return $this->belongsTo(Guru::class, 'id_guru');
    }
}
