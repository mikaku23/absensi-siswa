<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class local extends Model
{
    protected $fillable = ['nama', 'id_jurusan', 'id_guru'];

    public function siswa()
    {
        return $this->hasMany(siswa::class);
    }
}
