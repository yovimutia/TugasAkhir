<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class jabatanController extends Controller
{
    public function create(){
        return view('jabatan/create');
    }

    public function index(){
        $jabatan = DB::table('jabatan')->get();
        return view('jabatan/index', ['jabatan'=>$jabatan]);
    }

    public function store(Request $request)
    {
        if(strlen($request->namajabatan)>30)
        {
            return redirect('jabatanindex')->with(['error' => 'Nama Jabatan Terlalu Panjang']);
        }
        else
        {
            DB::table('jabatan')->insert([
                'ID_JABATAN' => $request->idjabatan,
                'NAMA_JABATAN' => $request->namajabatan,
                'STATUS_JABATAN' => '0'
                ]);
                return redirect('jabatanindex')->with(['success' => 'Input Jabatan Berhasil']);
        }
        
    }

    public function edit( $id )
    {
       $jabatan = DB::table('jabatan')->where('id_jabatan',$id)->get();
        return view('jabatan/edit',['jabatan'=>$jabatan]);
    }

    public function update(Request $request)
    {
         DB::table('jabatan')->where('ID_JABATAN',$request->idjabatan)->update([
        'NAMA_JABATAN' => $request->namajabatan
        ]);
        return redirect('jabatanindex')->with(['success' => 'Update Jabatan Berhasil']);
    }

    public function destroy( $id )
    {
        DB::table('jabatan')->where('id_jabatan',$id)->delete();
        return redirect('jabatanindex')->with(['success' => 'Hapus Jabatan Berhasil']);
    }
}
