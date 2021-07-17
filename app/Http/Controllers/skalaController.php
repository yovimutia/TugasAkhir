<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class skalaController extends Controller
{
    public function create(){
        return view('skalanilai/create');
    }

    public function index(){
        $skalanilai = DB::table('skala_nilai')->get();
        return view('skalanilai/index', ['skalanilai'=>$skalanilai]);
    }

    public function store(Request $request)
    {
        DB::table('skala_nilai')->insert([
        'KODE_NILAI' => $request->kodenilai,
        'RANGE_NILAI' => $request->rangenilai
        
        ]);
        return redirect('skalaindex')->with(['success' => 'Input Skala Nilai Berhasil']);
    }

    public function edit( $id )
    {
       $skalanilai = DB::table('skala_nilai')->where('kode_nilai',$id)->get();
        return view('skalanilai/edit',['skalanilai'=>$skalanilai]);
    }

    public function update(Request $request)
    {
         DB::table('skala_nilai')->where('KODE_NILAI',$request->kodenilai)->update([
            'KODE_NILAI' => $request->kodenilai,
            'RANGE_NILAI' => $request->rangenilai
        ]);
        return redirect('skalaindex')->with(['success' => 'Update Skala Nilai Berhasil']);
    }

    public function destroy( $id )
    {
        DB::table('skala_nilai')->where('kode_nilai',$id)->delete();
        return redirect('skalaindex')->with(['success' => 'Hapus Skala Nilai Berhasil']);
    }
}
