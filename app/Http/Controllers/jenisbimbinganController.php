<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class jenisbimbinganController extends Controller
{
    public function create(){
        return view('jenisbimbingan/create');
    }

    public function index(){
        $bimbingan = DB::table('jenis_bimbingan')->get();
        return view('jenisbimbingan/index', ['bimbingan'=>$bimbingan]);
    }

    public function store(Request $request)
    {
        DB::table('jenis_bimbingan')->insert([
        'ID_BIMBINGAN' => $request->idbimbingan,
        'NAMA_BIMBINGAN' => $request->namabimbingan
        
        ]);
        return redirect('bimbinganindex')->with(['success' => 'Input Jenis Bimbingan Berhasil']);
    }

    public function edit( $id )
    {
       $bimbingan = DB::table('jenis_bimbingan')->where('id_bimbingan',$id)->get();
        return view('jenisbimbingan/edit',['bimbingan'=>$bimbingan]);
    }

    public function update(Request $request)
    {
         DB::table('jenis_bimbingan')->where('ID_BIMBINGAN',$request->idbimbingan)->update([
        'ID_BIMBINGAN' => $request->idbimbingan,
        'NAMA_BIMBINGAN' => $request->namabimbingan
        ]);
        return redirect('bimbinganindex')->with(['success' => 'Update Jenis Bimbingan Berhasil']);
    }

    public function destroy( $id )
    {
        DB::table('jenis_bimbingan')->where('id_bimbingan',$id)->delete();
        return redirect('bimbinganindex')->with(['success' => 'Hapus Jenis Bimbingan Berhasil']);
    }
}
