<?php

namespace App\Imports;

use App\Penilaian;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PenilaianImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Penilaian([
            'ID_NILAI' => $row['id_nilai'],
            'ID_KELAS' => $row['id_kelas'], 
            'ID_UJIAN' => $row['id_ujian'],
            'ID_MAPEL' => $row['id_mapel'],
            'NO_INDUK' => $row['no_induk'],
            'KODE_NILAI' => $row['kode_nilai'],
            'JUMLAH_NILAI' => $row['jumlah_nilai'],
            'TGL_INPUT' => $row['tgl_input']
        ]);
    }
}