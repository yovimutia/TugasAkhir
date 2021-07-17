<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class kelasController extends Controller
{
    public function create(){
        return view('kelas/create');
    }

    public function index(){
        $kelas = DB::table('kelas')->get();
        return view('kelas/index', ['kelas'=>$kelas]);
    }

    public function store(Request $request)
    {
        DB::table('kelas')->insert([
        
        'NAMA_KELAS' => $request->namakelas
        
        ]);
        return redirect('kelasindex')->with(['success' => 'Input Kelas Berhasil']);
    }

    public function edit( $id )
    {
       $kelas = DB::table('kelas')->where('id_kelas',$id)->get();
        return view('kelas/edit',['kelas'=>$kelas]);
    }

    public function update(Request $request)
    {
         DB::table('kelas')->where('ID_KELAS',$request->idkelas)->update([
        
        'NAMA_KELAS' => $request->namakelas
        ]);
        return redirect('kelasindex')->with(['success' => 'Update Kelas Berhasil']);
    }

    public function destroy( $id )
    {
        DB::table('kelas')->where('id_kelas',$id)->delete();
        return redirect('kelasindex')->with(['success' => 'Hapus Kelas Berhasil']);
    }
}
