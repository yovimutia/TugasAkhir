<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class jadwalController extends Controller
{
    public function create(){
        $ID_JADWAL=(DB::table('nilai_siswa'));
        $kelas = DB::table('kelas')->get();
        $matapelajaran = DB::table('mata_pelajaran')->get();
        $pegawai = DB::table('pegawai')->where ('STATUS_PEGAWAI','0')->get();
        $ruang = DB::table('ruangan')->get();
        return view('jadwal/create', [
            'ID_JADWAL' =>  $ID_JADWAL, 
            'kelas'=>$kelas,
            'pegawai'=>$pegawai,
            'ruang'=>$ruang,
            'matapelajaran'=>$matapelajaran]);
    }

    public function index(){
        //$jadwal = DB::table('jadwal_les')->get();
        $jadwal = DB::table('jadwal_les')->get();
        $kelas = DB::table('kelas')->get();
        $matapelajaran = DB::table('mata_pelajaran')->get();
        $ruang = DB::table('ruangan')
                ->get();
        $pegawai = DB::table('pegawai')->get();
        return view('jadwal/index', [
            'jadwal'=>$jadwal,
            'kelas'=>$kelas,
            'matapelajaran'=>$matapelajaran,
            'ruang'=>$ruang,
            'pegawai'=>$pegawai
            ]);
    }

    public function store(Request $request)
    {
        //MATIIN
        $kelas = DB::table('kelas')->get();
        $matapelajaran = DB::table('mata_pelajaran')->get();
        $pegawai = DB::table('pegawai')->where ('STATUS_PEGAWAI','0')->get();
        $ruang = DB::table('ruangan')->get();
        //MATIIN
        DB::table('jadwal_les')->insert([
        'TGL_LES' => $request->tglles,
        'ID_MAPEL' => $request->idmapel,
        'ID_PEGAWAI' => $request->idpegawai,
        'ID_KELAS' => $request->idkelas,
        'ID_RUANG' => $request->idruang,
        'JAM_LES' => $request->jamles
        ]);

            return redirect('jadwalindex');
        
       
    }

    
}
