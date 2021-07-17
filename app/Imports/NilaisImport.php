<?php

namespace App\Imports;

use App\Models\Penilaian;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;
use Throwable;

class NilaisImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        // dd($collection());
        // dd($rows);

        // dd($request);

        // dd($collection);

        foreach ($collection as $key => $row) 
        {
            if($key >= 1){
                // dd($row);
                DB::table('nilai_siswa')->insert([
                    'ID_KELAS'      => $row[0],
                    'ID_UJIAN'      => $row[1],
                    'ID_MAPEL'      => $row[2],
                    'NO_INDUK'      => $row[3],
                    'KODE_NILAI'    => $row[4],
                    'JUMLAH_NILAI'  => $row[5]
                ]);
            }
        }
    }

    public function rules(): array{
        return[
            '*.0' => ['unique:nilai_siswa,ID_NILAI']
        ];
    }
}
