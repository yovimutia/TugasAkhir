<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class periodebulanController extends Controller
{
    public function create(){
        return view('periodebulan/create');
    }

    public function index(){
        $periode = DB::table('periode_bulan')->get();
        return view('periodebulan/index', ['periode'=>$periode]);
    }

    public function store(Request $request)
    {
        DB::table('periode_bulan')->insert([
        'ID_BULAN' => $request->idbulan,
        'NAMA_BULAN' => $request->namabulan
        
        ]);
        return redirect('periodeindex')->with(['success' => 'Input Periode Bulan Berhasil']);
    }

    public function edit( $id )
    {
       $periode = DB::table('periode_bulan')->where('id_bulan',$id)->get();
        return view('periodebulan/edit',['periode'=>$periode]);
    }

    public function update(Request $request)
    {
         DB::table('periode_bulan')->where('ID_BULAN',$request->idbulan)->update([
        'ID_BULAN' => $request->idbulan,
        'NAMA_BULAN' => $request->namabulan
        ]);
        return redirect('periodeindex')->with(['success' => 'Update Periode Bulan Berhasil']);
    }

    public function destroy( $id )
    {
        DB::table('periode_bulan')->where('id_bulan',$id)->delete();
        return redirect('periodeindex')->with(['success' => 'Hapus Periode Bulan Berhasil']);
    }
}
