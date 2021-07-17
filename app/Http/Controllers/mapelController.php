<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class mapelController extends Controller
{
    public function create(){
        $pegawai = DB::table('pegawai')->get();
        return view('mapel/create', ['pegawai'=>$pegawai]);
    }

    public function index(){
        $matapelajaran = DB::table('mata_pelajaran')->get();
        return view('mapel/index', ['matapelajaran'=>$matapelajaran]);
    }

    public function store(Request $request)
    {
        DB::table('pegawai')->get();
        DB::table('mata_pelajaran')->insert([
        'ID_MAPEL' => $request->idmapel,
        'ID_PEGAWAI' => $request->idpegawai,
        'NAMA_MAPEL' => $request->namamapel
        
        ]);
        return redirect('mapelindex')->with(['success' => 'Input Mata Pelajaran Berhasil']);
    }

    public function edit( $id )
    {
       $matapelajaran = DB::table('mata_pelajaran')->where('id_mapel',$id)->get();
        return view('mapel/edit',['matapelajaran'=>$matapelajaran]);
    }

    public function update(Request $request)
    {
         DB::table('mata_pelajaran')->where('ID_MAPEL',$request->idmapel)->update([
            'NAMA_MAPEL' => $request->namamapel,
        ]);
        return redirect('mapelindex')->with(['success' => 'Update Mata Pelajaran Berhasil']);
    }

    public function destroy( $id )
    {
        DB::table('mata_pelajaran')->where('id_mapel',$id)->delete();
        return redirect('mapelindex')->with(['success' => 'Hapus Mata Pelajaran Berhasil']);
    }
}
