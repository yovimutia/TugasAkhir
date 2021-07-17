<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ruangController extends Controller
{
    public function create(){
        return view('ruang/create');
    }

    public function index(){
        $ruang = DB::table('ruangan')->get();
        return view('ruang/index', ['ruang'=>$ruang]);
    }

    public function store(Request $request)
    {
        DB::table('ruangan')->insert([
        'NAMA_RUANG' => $request->namaruang
        
        ]);
        return redirect('ruangindex');
    }

    public function edit( $id )
    {
       $ruang = DB::table('ruangan')->where('id_ruang',$id)->get();
        return view('ruang/edit',['ruang'=>$ruang]);
    }

    public function update(Request $request)
    {
         DB::table('ruangan')->where('ID_RUANG',$request->idruang)->update([
            'NAMA_RUANG' => $request->namaruang
        ]);
        return redirect('ruangindex');
    }

    public function destroy( $id )
    {
        DB::table('ruangan')->where('id_ruang',$id)->delete();
        return redirect('ruangindex');
    }
}
