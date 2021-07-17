<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    protected $table = 'presensi_siswa';
    protected $fillable = ['ID_PRESENSI','NO_INDUK','STATUS_PRESENSI','TGL_PRESENSI'];
    public $timestamps = false;
}

