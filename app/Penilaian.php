<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    protected $table = 'nilai_siswa';

    protected $fillable = ['ID_KELAS', 'ID_UJIAN', 'ID_MAPEL', 'NO_INDUK', 'KODE_NILAI', 'JUMLAH_NILAI'];

    public $timestamps = false;
}