<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class mengabsen extends Model
{
    protected $fillable = ['tanggal_absen', 'jam_absen', 'id_siswa', 'id_guru'];
    
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa');
    }

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'id_guru');
    }
}
