<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class siswaController extends Controller
{
    public function create(){
        $bimbingan = DB::table('jenis_bimbingan')->get();
        $kelas = DB::table('kelas')->get();
        return view('siswa/create', ['bimbingan'=>$bimbingan], ['kelas'=>$kelas]);
    }

    public function index(){
        $siswa = DB::table('siswa')
                    ->join('jenis_bimbingan','siswa.ID_BIMBINGAN','=','jenis_bimbingan.ID_BIMBINGAN')
                    ->join('kelas','siswa.ID_KELAS','=','kelas.ID_KELAS')->get();
        return view('siswa/index', ['siswa'=>$siswa]);
    }

    public function store(Request $request)
    {
        DB::table('jenis_bimbingan')->get();
        DB::table('kelas')->get();
        DB::table('siswa')->insert([
        'NO_INDUK' => $request->noinduk,
        'ID_BIMBINGAN' => $request->idbimbingan,
        'ID_KELAS' => $request->idkelas,
        'NAMA_SISWA' => $request->namasiswa,
        'ALAMAT_SISWA' => $request->alamatsiswa,
        'TGL_LAHIR_SISWA' => $request->tgllahirsiswa,
        'JK_SISWA' => $request->jksiswa,
        'TELP_SISWA' => $request->telpsiswa,
        'ASAL_SEKOLAH' => $request->asalsekolah,
        'STATUS_SISWA' => '0'
        
        ]);
        return redirect('siswaindex')->with(['success' => 'Input Siswa Berhasil']);
    }

    public function edit( $id )
    {
       $kelas = DB::table('kelas')->get();
       $bimbingan = DB::table('jenis_bimbingan')->get();
       $siswa = DB::table('siswa')->where('no_induk',$id)
                  ->join('kelas','siswa.id_kelas','=','kelas.id_kelas')->get();
        return view('siswa/edit',['siswa'=>$siswa,'kelas'=>$kelas,'bimbingan'=>$bimbingan]);
    }

    public function update(Request $request)
    {
         DB::table('siswa')->where('NO_INDUK',$request->noinduk)->update([
            'NO_INDUK' => $request->noinduk,
            'ID_BIMBINGAN' => $request->idbimbingan,
            'ID_KELAS' => $request->idkelas,
            'NAMA_SISWA' => $request->namasiswa,
            'ALAMAT_SISWA' => $request->alamatsiswa,
            'TGL_LAHIR_SISWA' => $request->tgllahirsiswa,
            'JK_SISWA' => $request->jksiswa,
            'TELP_SISWA' => $request->telpsiswa,
            'ASAL_SEKOLAH' => $request->asalsekolah,
            
        ]);
        return redirect('siswaindex')->with(['success' => 'Update Siswa Berhasil']);
    }

    public function destroy( $id )
    {
        DB::table('siswa')->where('no_induk',$id)->delete();
        return redirect('siswaindex')->with(['success' => 'Hapus Siswa Berhasil']);
    }

    public function gantiStatus($id)
    {
        DB::table('siswa')->where('no_induk',$id)->update([
                'STATUS_SISWA' => '1'
            ]);
            return redirect('siswaindex')->with(['success' => 'Status Siswa Berhasil Diupdate']);
    }
}
