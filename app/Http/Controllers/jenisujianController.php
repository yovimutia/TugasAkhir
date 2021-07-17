<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class jenisujianController extends Controller
{
    public function create(){
        return view('jenisujian/create');
    }

    public function index(){
        $jenisujian = DB::table('jenis_ujian')->get();
        return view('jenisujian/index', ['jenisujian'=>$jenisujian]);
    }

    public function store(Request $request)
    {
        DB::table('jenis_ujian')->insert([
        'ID_UJIAN' => $request->idujian,
        'NAMA_UJIAN' => $request->namaujian
        
        ]);
        return redirect('jenisujianindex')->with(['success' => 'Input Jenis Ujian Berhasil']);
    }

    public function edit( $id )
    {
       $jenisujian = DB::table('jenis_ujian')->where('id_ujian',$id)->get();
        return view('jenisujian/edit',['jenisujian'=>$jenisujian]);
    }

    public function update(Request $request)
    {
         DB::table('jenis_ujian')->where('ID_UJIAN',$request->idujian)->update([
        'ID_UJIAN' => $request->idujian,
        'NAMA_UJIAN' => $request->namaujian
        ]);
        return redirect('jenisujianindex')->with(['success' => 'Update Jenis Ujian Berhasil']);
    }

    public function destroy( $id )
    {
        DB::table('jenis_ujian')->where('id_ujian',$id)->delete();
        return redirect('jenisujianindex')->with(['success' => 'Hapus Jenis Ujian Berhasil']);
    }
}
