<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Customer;
use Box\Spout\Reader\ReaderFactory;
use Box\Spout\Writer\WriterFactory;
use Box\Spout\Common\Type;

class excelController extends Controller
{
    public function index()
    {
        return view('excel');
    }

    public function upload(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');// get file
            $reader = ReaderFactory::create(Type::XLSX); // for XLSX files
            $reader->open($file);
            // loop semua sheet dan dapatkan sheet orders
            foreach ($reader->getSheetIterator() as $sheet) {
                if ($sheet->getName() === 'Orders') {
                    $this->readOrderSheet($sheet);// baca sheet orders
                }
            }
            $reader->close();
        }
    }
    
    public function readOrderSheet($sheet)
    {
        //loop untuk setiap baris pada excel
        foreach ($sheet->getRowIterator() as $idx => $row) {
            if ($idx>1) { // skip baris pertama excel (Judul)
                $data = [
                'ID_NILAI' => $row[0],
                'ID_KELAS' => $row[1],
                'ID_UJIAN' => $row[2],
                'ID_MAPEL' => $row[3],
                'NO_INDUK' => $row[4],
                'KODE_NILAI' => $row[5],
                'JUMLAH_NILAI' => $row[6],
                'TGL_INPUT' => $row[7],
                ];
                $nilai_siswa = new nilai_siswa();// buat customer baru
                $nilai_siswa->fill($data);// isi customer dari data excel
                $nilai_siswa->save(); // simpan customer
            }
        }
    }

    public function exportExcel()
    {
        $title = ['ID_NILAI','ID_KELAS','ID_UJIAN','ID_MAPEL','NO_INDUK','KODE_NILAI','JUMLAH_NILAI','TGL_INPUT'];

        $fileName = 'Export Excel.xlsx';

        $writer = WriterFactory::create(Type::XLSX); // for XLSX files

        $nilai_siswa = nilai_siswa::all(); // dapatkan seluruh data customer
        
        $writer->openToBrowser($fileName); // stream data directly to the browser
        $writer->addRow($title); // tambahkan judul dibaris pertama

        foreach ($customers as $idx => $data) {
            $writer->addRow($data->toArray()); // tambakan data data per baris
        }
        $writer->close();
    }
}