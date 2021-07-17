<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = 'pegawai';
    protected $fillable = ['ID_PEGAWAI','ID_JABATAN','NAMA_PEGAWAI','ALAMAT_OEGAWAI','JK_PEGAWAI','TGL_LAHIR_PEGAWAI','TELP_PEGAWAI','EMAIL_PEGAWAI','PASSWORD_PEGAWAI','STATUS_PEGAWAI'];
    public $timestamps = false;
}

