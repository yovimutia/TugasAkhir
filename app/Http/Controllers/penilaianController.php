<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use App\Penilaian;
use App\Imports\PenilaianImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\NilaisImport;
use Redirect;
use Storage;
use \PDF;

class penilaianController extends Controller
{
    public function create1(){
        $ID_NILAI=(DB::table('nilai_siswa'));
        $kelas = DB::table('kelas')->where('id_kelas','Kel01')->get();
        $matapelajaran = DB::table('mata_pelajaran')->get();
        $jenisujian = DB::table('jenis_ujian')->get();
        $skalanilai = DB::table('skala_nilai')->get();
        $siswa = DB::table('siswa')->where('id_kelas','Kel01')  //Kelas 10 Mipa
                                   ->where ('STATUS_SISWA','0')->get();
        return view('penilaian/10mipa/create', [
            'ID_NILAI' =>  $ID_NILAI, 
            'skalanilai'=>$skalanilai,
            'kelas'=>$kelas,
            'jenisujian'=>$jenisujian,
            'siswa'=>$siswa,
            'matapelajaran'=>$matapelajaran]);
    }

    public function create2(){
        $ID_NILAI=(DB::table('nilai_siswa'));
        $kelas = DB::table('kelas')->where('id_kelas','Kel02')->get();
        $matapelajaran = DB::table('mata_pelajaran')->get();
        $jenisujian = DB::table('jenis_ujian')->get();
        $skalanilai = DB::table('skala_nilai')->get();
        $siswa = DB::table('siswa')->where('id_kelas','Kel02')  //Kelas 11 Ips
                                   ->where ('STATUS_SISWA','0')->get();
        return view('penilaian/11ips/create', [
            'ID_NILAI' =>  $ID_NILAI, 
            'skalanilai'=>$skalanilai,
            'kelas'=>$kelas,
            'jenisujian'=>$jenisujian,
            'siswa'=>$siswa,
            'matapelajaran'=>$matapelajaran]);
    }

    public function create3(){
        $ID_NILAI=(DB::table('nilai_siswa'));
        $kelas = DB::table('kelas')->where('id_kelas','Kel03')->get();
        $matapelajaran = DB::table('mata_pelajaran')->get();
        $jenisujian = DB::table('jenis_ujian')->get();
        $skalanilai = DB::table('skala_nilai')->get();
        $siswa = DB::table('siswa')->where('id_kelas','Kel03')  //Kelas 11 Mipa
                                   ->where ('STATUS_SISWA','0')->get();
        return view('penilaian/11mipa/create', [
            'ID_NILAI' =>  $ID_NILAI, 
            'skalanilai'=>$skalanilai,
            'kelas'=>$kelas,
            'jenisujian'=>$jenisujian,
            'siswa'=>$siswa,
            'matapelajaran'=>$matapelajaran]);
    }

    public function create4(){
        $ID_NILAI=(DB::table('nilai_siswa'));
        $kelas = DB::table('kelas')->where('id_kelas','Kel04')->get();
        $matapelajaran = DB::table('mata_pelajaran')->get();
        $jenisujian = DB::table('jenis_ujian')->get();
        $skalanilai = DB::table('skala_nilai')->get();
        $siswa = DB::table('siswa')->where('id_kelas','Kel04')   //Kelas 10 IPS
                                   ->where ('STATUS_SISWA','0')->get();
        return view('penilaian/10ips/create', [
            'ID_NILAI' =>  $ID_NILAI, 
            'skalanilai'=>$skalanilai,
            'kelas'=>$kelas,
            'jenisujian'=>$jenisujian,
            'siswa'=>$siswa,
            'matapelajaran'=>$matapelajaran]);
    }

    public function create5(){
        $ID_NILAI=(DB::table('nilai_siswa'));
        $kelas = DB::table('kelas')->where('id_kelas','Kel05')->get();
        $matapelajaran = DB::table('mata_pelajaran')->get();
        $jenisujian = DB::table('jenis_ujian')->get();
        $skalanilai = DB::table('skala_nilai')->get();
        $siswa = DB::table('siswa')->where('id_kelas','Kel05')   //Kelas 12 Mipa
                                   ->where ('STATUS_SISWA','0')->get();
        return view('penilaian/12mipa/create', [
            'ID_NILAI' =>  $ID_NILAI, 
            'skalanilai'=>$skalanilai,
            'kelas'=>$kelas,
            'jenisujian'=>$jenisujian,
            'siswa'=>$siswa,
            'matapelajaran'=>$matapelajaran]);
    }

    public function create6(){
        $ID_NILAI=(DB::table('nilai_siswa'));
        $kelas = DB::table('kelas')->where('id_kelas','Kel06')->get();
        $matapelajaran = DB::table('mata_pelajaran')->get();
        $jenisujian = DB::table('jenis_ujian')->get();
        $skalanilai = DB::table('skala_nilai')->get();
        $siswa = DB::table('siswa')->where('id_kelas','Kel06')    //Kelas 12 IPS
                                   ->where ('STATUS_SISWA','0')->get();
        return view('penilaian/12ips/create', [
            'ID_NILAI' =>  $ID_NILAI, 
            'skalanilai'=>$skalanilai,
            'kelas'=>$kelas,
            'jenisujian'=>$jenisujian,
            'siswa'=>$siswa,
            'matapelajaran'=>$matapelajaran]);
    }

    public function index1(){
        $jenis_ujian = DB::table('jenis_ujian')->get();
        $mapel = DB::table('mata_pelajaran')
                ->get();
        $siswaku = DB::table('siswa')
                ->join('nilai_siswa','siswa.NO_INDUK','=','nilai_siswa.NO_INDUK')
                ->join('kelas','siswa.ID_KELAS','=','kelas.ID_KELAS')
                ->join('mata_pelajaran','nilai_siswa.ID_MAPEL','=','mata_pelajaran.ID_MAPEL')
                ->join('skala_nilai','nilai_siswa.KODE_NILAI','=','skala_nilai.KODE_NILAI')
                ->select('siswa.NO_INDUK','siswa.NAMA_SISWA','kelas.NAMA_KELAS','mata_pelajaran.NAMA_MAPEL', 'mata_pelajaran.ID_MAPEL','skala_nilai.KODE_NILAI','nilai_siswa.JUMLAH_NILAI')
                ->where('kelas.id_kelas','Kel01')
                ->where('siswa.status_siswa','0')
                ->get();

        return view('penilaian/10mipa/index')->with(compact('siswaku','mapel','jenis_ujian'));
    }

    public function search_siswa1(Request $request){

        // dd($request->all());
        $jenis_ujian = DB::table('jenis_ujian')->get();
        $mapel = DB::table('mata_pelajaran')
                ->get();
        $siswaku = DB::table('siswa')
        ->join('nilai_siswa','siswa.NO_INDUK','=','nilai_siswa.NO_INDUK')
        ->join('kelas','siswa.ID_KELAS','=','kelas.ID_KELAS')
        ->join('mata_pelajaran','nilai_siswa.ID_MAPEL','=','mata_pelajaran.ID_MAPEL')
        ->join('skala_nilai','nilai_siswa.KODE_NILAI','=','skala_nilai.KODE_NILAI')
        ->select('siswa.NO_INDUK','siswa.NAMA_SISWA','kelas.NAMA_KELAS','mata_pelajaran.NAMA_MAPEL', 'mata_pelajaran.ID_MAPEL','skala_nilai.KODE_NILAI','nilai_siswa.JUMLAH_NILAI')
        ->where('kelas.id_kelas','Kel01')
        ->where('siswa.status_siswa','0')
        ->where('nilai_siswa.ID_UJIAN','=',$request->id_ujian)
        ->where('nilai_siswa.ID_MAPEL','=',$request->id_mapel)
        ->get();
        // dump($siswaku);

        return view('penilaian/10mipa/index')->with(compact('siswaku','mapel','jenis_ujian'));
    }

    public function index2(){
        $jenis_ujian = DB::table('jenis_ujian')->get();
        $mapel = DB::table('mata_pelajaran')
                ->get();
        $siswaku = DB::table('siswa')
                ->join('nilai_siswa','siswa.NO_INDUK','=','nilai_siswa.NO_INDUK')
                ->join('kelas','siswa.ID_KELAS','=','kelas.ID_KELAS')
                ->join('mata_pelajaran','nilai_siswa.ID_MAPEL','=','mata_pelajaran.ID_MAPEL')
                ->join('skala_nilai','nilai_siswa.KODE_NILAI','=','skala_nilai.KODE_NILAI')
                ->select('siswa.NO_INDUK','siswa.NAMA_SISWA','kelas.NAMA_KELAS','mata_pelajaran.NAMA_MAPEL','skala_nilai.KODE_NILAI','nilai_siswa.JUMLAH_NILAI')
                ->where('kelas.id_kelas','Kel03')
                ->where('siswa.status_siswa','0')
                ->get();
                return view('penilaian/11mipa/index')->with(compact('siswaku','mapel','jenis_ujian'));
    }

    public function search_siswa2(Request $request){

        // dd($request->all());
        $jenis_ujian = DB::table('jenis_ujian')->get();
        $mapel = DB::table('mata_pelajaran')
                ->get();
        $siswaku = DB::table('siswa')
        ->join('nilai_siswa','siswa.NO_INDUK','=','nilai_siswa.NO_INDUK')
        ->join('kelas','siswa.ID_KELAS','=','kelas.ID_KELAS')
        ->join('mata_pelajaran','nilai_siswa.ID_MAPEL','=','mata_pelajaran.ID_MAPEL')
        ->join('skala_nilai','nilai_siswa.KODE_NILAI','=','skala_nilai.KODE_NILAI')
        ->select('siswa.NO_INDUK','siswa.NAMA_SISWA','kelas.NAMA_KELAS','mata_pelajaran.NAMA_MAPEL', 'mata_pelajaran.ID_MAPEL','skala_nilai.KODE_NILAI','nilai_siswa.JUMLAH_NILAI')
        ->where('kelas.id_kelas','Kel03')
        ->where('siswa.status_siswa','0')
        ->where('nilai_siswa.ID_UJIAN','=',$request->id_ujian)
        ->where('nilai_siswa.ID_MAPEL','=',$request->id_mapel)
        ->get();
        // dump($siswaku);

        return view('penilaian/11mipa/index')->with(compact('siswaku','mapel','jenis_ujian'));
    }

    public function index3(){
        $jenis_ujian = DB::table('jenis_ujian')->get();
        $mapel = DB::table('mata_pelajaran')
                ->get();
        $siswaku = DB::table('siswa')
                ->join('nilai_siswa','siswa.NO_INDUK','=','nilai_siswa.NO_INDUK')
                ->join('kelas','siswa.ID_KELAS','=','kelas.ID_KELAS')
                ->join('mata_pelajaran','nilai_siswa.ID_MAPEL','=','mata_pelajaran.ID_MAPEL')
                ->join('skala_nilai','nilai_siswa.KODE_NILAI','=','skala_nilai.KODE_NILAI')
                ->select('siswa.NO_INDUK','siswa.NAMA_SISWA','kelas.NAMA_KELAS','mata_pelajaran.NAMA_MAPEL','skala_nilai.KODE_NILAI','nilai_siswa.JUMLAH_NILAI')
                ->where('kelas.id_kelas','Kel05')
                ->where('siswa.status_siswa','0')
                ->get();
                return view('penilaian/12mipa/index')->with(compact('siswaku','mapel','jenis_ujian'));
    }

    public function search_siswa3(Request $request){

        // dd($request->all());
        $jenis_ujian = DB::table('jenis_ujian')->get();
        $mapel = DB::table('mata_pelajaran')
                ->get();
        $siswaku = DB::table('siswa')
        ->join('nilai_siswa','siswa.NO_INDUK','=','nilai_siswa.NO_INDUK')
        ->join('kelas','siswa.ID_KELAS','=','kelas.ID_KELAS')
        ->join('mata_pelajaran','nilai_siswa.ID_MAPEL','=','mata_pelajaran.ID_MAPEL')
        ->join('skala_nilai','nilai_siswa.KODE_NILAI','=','skala_nilai.KODE_NILAI')
        ->select('siswa.NO_INDUK','siswa.NAMA_SISWA','kelas.NAMA_KELAS','mata_pelajaran.NAMA_MAPEL', 'mata_pelajaran.ID_MAPEL','skala_nilai.KODE_NILAI','nilai_siswa.JUMLAH_NILAI')
        ->where('kelas.id_kelas','Kel05')
        ->where('siswa.status_siswa','0')
        ->where('nilai_siswa.ID_UJIAN','=',$request->id_ujian)
        ->where('nilai_siswa.ID_MAPEL','=',$request->id_mapel)
        ->get();
        // dump($siswaku);

        return view('penilaian/12mipa/index')->with(compact('siswaku','mapel','jenis_ujian'));
    }
    
    public function index4(){ 
        $jenis_ujian = DB::table('jenis_ujian')->get();
        $mapel = DB::table('mata_pelajaran')
                ->get();
        $siswaku = DB::table('siswa')
        ->join('nilai_siswa','siswa.NO_INDUK','=','nilai_siswa.NO_INDUK')
        ->join('kelas','siswa.ID_KELAS','=','kelas.ID_KELAS')
        ->join('mata_pelajaran','nilai_siswa.ID_MAPEL','=','mata_pelajaran.ID_MAPEL')
        ->join('skala_nilai','nilai_siswa.KODE_NILAI','=','skala_nilai.KODE_NILAI')
        ->select('siswa.NO_INDUK','siswa.NAMA_SISWA','kelas.NAMA_KELAS','mata_pelajaran.NAMA_MAPEL', 'mata_pelajaran.ID_MAPEL','skala_nilai.KODE_NILAI','nilai_siswa.JUMLAH_NILAI')
        ->where('kelas.id_kelas','Kel04')
        ->where('siswa.status_siswa','0')
        ->get();

        return view('penilaian/10ips/index')->with(compact('siswaku','mapel','jenis_ujian'));
    }
    

    public function search_siswa4(Request $request){

        // dd($request->all());
        $jenis_ujian = DB::table('jenis_ujian')->get();
        $mapel = DB::table('mata_pelajaran')
                ->get();
        $siswaku = DB::table('siswa')
        ->join('nilai_siswa','siswa.NO_INDUK','=','nilai_siswa.NO_INDUK')
        ->join('kelas','siswa.ID_KELAS','=','kelas.ID_KELAS')
        ->join('mata_pelajaran','nilai_siswa.ID_MAPEL','=','mata_pelajaran.ID_MAPEL')
        ->join('skala_nilai','nilai_siswa.KODE_NILAI','=','skala_nilai.KODE_NILAI')
        ->select('siswa.NO_INDUK','siswa.NAMA_SISWA','kelas.NAMA_KELAS','mata_pelajaran.NAMA_MAPEL', 'mata_pelajaran.ID_MAPEL','skala_nilai.KODE_NILAI','nilai_siswa.JUMLAH_NILAI')
        ->where('kelas.id_kelas','Kel04')
        ->where('siswa.status_siswa','0')
        ->where('nilai_siswa.ID_UJIAN','=',$request->id_ujian)
        ->where('nilai_siswa.ID_MAPEL','=',$request->id_mapel)
        ->get();
        // dump($siswaku);

        return view('penilaian/10ips/index')->with(compact('siswaku','mapel','jenis_ujian'));
    }
    
    /*
    public function index4(){
        $matapelajaran = DB::table('mata_pelajaran')->get();
        $kelas = DB::table('kelas')->where('ID_KELAS','Kel04')->get();
        $siswa = DB::table('siswa')
                ->join('kelas','siswa.ID_KELAS','=','kelas.ID_KELAS')
                ->where('kelas.ID_KELAS','Kel04')
                ->get();
        $penilaian = DB::table('nilai_siswa')->get();
        return view('penilaian/10ips/index', [
            'matapelajaran'=>$matapelajaran,
            'kelas'=>$kelas,
            'siswa'=>$siswa,
            'penilaian'=>$penilaian]);      
    }
    */

    public function index5(){
        $jenis_ujian = DB::table('jenis_ujian')->get();
        $mapel = DB::table('mata_pelajaran')
                ->get();
        $siswaku = DB::table('siswa')
                ->join('nilai_siswa','siswa.NO_INDUK','=','nilai_siswa.NO_INDUK')
                ->join('kelas','siswa.ID_KELAS','=','kelas.ID_KELAS')
                ->join('mata_pelajaran','nilai_siswa.ID_MAPEL','=','mata_pelajaran.ID_MAPEL')
                ->join('skala_nilai','nilai_siswa.KODE_NILAI','=','skala_nilai.KODE_NILAI')
                ->select('siswa.NO_INDUK','siswa.NAMA_SISWA','kelas.NAMA_KELAS','mata_pelajaran.NAMA_MAPEL','skala_nilai.KODE_NILAI','nilai_siswa.JUMLAH_NILAI')
                ->where('kelas.id_kelas','Kel02')
                ->where('siswa.status_siswa','0')
                ->get();
        return view('penilaian/11ips/index')->with(compact('siswaku','mapel','jenis_ujian'));
    }

    public function search_siswa5(Request $request){

        // dd($request->all());
        $jenis_ujian = DB::table('jenis_ujian')->get();
        $mapel = DB::table('mata_pelajaran')
                ->get();
        $siswaku = DB::table('siswa')
        ->join('nilai_siswa','siswa.NO_INDUK','=','nilai_siswa.NO_INDUK')
        ->join('kelas','siswa.ID_KELAS','=','kelas.ID_KELAS')
        ->join('mata_pelajaran','nilai_siswa.ID_MAPEL','=','mata_pelajaran.ID_MAPEL')
        ->join('skala_nilai','nilai_siswa.KODE_NILAI','=','skala_nilai.KODE_NILAI')
        ->select('siswa.NO_INDUK','siswa.NAMA_SISWA','kelas.NAMA_KELAS','mata_pelajaran.NAMA_MAPEL', 'mata_pelajaran.ID_MAPEL','skala_nilai.KODE_NILAI','nilai_siswa.JUMLAH_NILAI')
        ->where('kelas.id_kelas','Kel02')
        ->where('siswa.status_siswa','0')
        ->where('nilai_siswa.ID_UJIAN','=',$request->id_ujian)
        ->where('nilai_siswa.ID_MAPEL','=',$request->id_mapel)
        ->get();
        // dump($siswaku);

        return view('penilaian/11ips/index')->with(compact('siswaku','mapel','jenis_ujian'));
    }

    public function index6(){
        $jenis_ujian = DB::table('jenis_ujian')->get();
        $mapel = DB::table('mata_pelajaran')
                ->get();
        $siswaku = DB::table('siswa')
                ->join('nilai_siswa','siswa.NO_INDUK','=','nilai_siswa.NO_INDUK')
                ->join('kelas','siswa.ID_KELAS','=','kelas.ID_KELAS')
                ->join('mata_pelajaran','nilai_siswa.ID_MAPEL','=','mata_pelajaran.ID_MAPEL')
                ->join('skala_nilai','nilai_siswa.KODE_NILAI','=','skala_nilai.KODE_NILAI')
                ->select('siswa.NO_INDUK','siswa.NAMA_SISWA','kelas.NAMA_KELAS','mata_pelajaran.NAMA_MAPEL','skala_nilai.KODE_NILAI','nilai_siswa.JUMLAH_NILAI')
                ->where('kelas.id_kelas','Kel06')
                ->where('siswa.status_siswa','0')
                ->get();
        return view('penilaian/12ips/index')->with(compact('siswaku','mapel','jenis_ujian'));
    }

    public function search_siswa6(Request $request){

        // dd($request->all());
        $jenis_ujian = DB::table('jenis_ujian')->get();
        $mapel = DB::table('mata_pelajaran')
                ->get();
        $siswaku = DB::table('siswa')
        ->join('nilai_siswa','siswa.NO_INDUK','=','nilai_siswa.NO_INDUK')
        ->join('kelas','siswa.ID_KELAS','=','kelas.ID_KELAS')
        ->join('mata_pelajaran','nilai_siswa.ID_MAPEL','=','mata_pelajaran.ID_MAPEL')
        ->join('skala_nilai','nilai_siswa.KODE_NILAI','=','skala_nilai.KODE_NILAI')
        ->select('siswa.NO_INDUK','siswa.NAMA_SISWA','kelas.NAMA_KELAS','mata_pelajaran.NAMA_MAPEL', 'mata_pelajaran.ID_MAPEL','skala_nilai.KODE_NILAI','nilai_siswa.JUMLAH_NILAI')
        ->where('kelas.id_kelas','Kel06')
        ->where('siswa.status_siswa','0')
        ->where('nilai_siswa.ID_UJIAN','=',$request->id_ujian)
        ->where('nilai_siswa.ID_MAPEL','=',$request->id_mapel)
        ->get();
        // dump($siswaku);

        return view('penilaian/12ips/index')->with(compact('siswaku','mapel','jenis_ujian'));
    }

    /*
    public function store1(Request $request)
    {
       $nilai = $request->jumlahnilai;
        foreach($nilai as $n => $nilaiku)
       {
           if($nilaiku!=NULL)
           {
               if($request->tglinput!=NULL)
               {
                DB::table('nilai_siswa')->insert([
        
                    'ID_KELAS' => $request->idkelas,
                    'ID_UJIAN' => $request->idujian,
                    'ID_MAPEL' => $request->idmapel,
                    'NO_INDUK' => $request->noinduk[$n],
                    'KODE_NILAI' => $request->kodenilai[$n],
                    'JUMLAH_NILAI' => $request->jumlahnilai[$n],
                    'TGL_INPUT' => $request->tglinput
                    ]);
                    return redirect('penilaianindex1')->with(['success' => 'Input Nilai Berhasil']);
               }
               else if($request->tglinput==NULL)
               {
                return redirect('penilaiancreate1')->with(['error' => 'Tanggal Belum Dipilih']);
               }
           
           }
        }
        
    }
    */

    public function store1(Request $request)
    {
        
        $siswa = DB::table('siswa')->where('id_kelas','Kel01')
                                   ->where('status_siswa','0')->count();
        $nilai = $request->jumlahnilai;
        foreach($nilai as $n => $nilaiku)
       {
           if($nilaiku!=NULL)
           {
            DB::table('nilai_siswa')->insert([
        
                'ID_KELAS' => $request->idkelas,
                'ID_UJIAN' => $request->idujian,
                'ID_MAPEL' => $request->idmapel,
                'NO_INDUK' => $request->noinduk[$n],
                'KODE_NILAI' => $request->kodenilai[$n],
                'JUMLAH_NILAI' => $request->jumlahnilai[$n],
                'TGL_INPUT' => $request->tglinput
                ]);
                
           } 
        }
        return redirect('penilaianindex1')->with(['success' => 'Input Nilai Berhasil']);
    }

    public function store2(Request $request)
    {
        
        $siswa = DB::table('siswa')->where('id_kelas','Kel02')
                                   ->where('status_siswa','0')->count();
        $nilai = $request->jumlahnilai;
        foreach($nilai as $n => $nilaiku)
       {
           if($nilaiku!=NULL)
           {
            DB::table('nilai_siswa')->insert([
        
                'ID_KELAS' => $request->idkelas,
                'ID_UJIAN' => $request->idujian,
                'ID_MAPEL' => $request->idmapel,
                'NO_INDUK' => $request->noinduk[$n],
                'KODE_NILAI' => $request->kodenilai[$n],
                'JUMLAH_NILAI' => $request->jumlahnilai[$n],
                'TGL_INPUT' => $request->tglinput
                ]);
                
           }
        }
        return redirect('penilaianindex2')->with(['success' => 'Input Nilai Berhasil']);
    }

    public function store3(Request $request)
    {
        
        $siswa = DB::table('siswa')->where('id_kelas','Kel03')
                                   ->where('status_siswa','0')->count();
        $nilai = $request->jumlahnilai;
        foreach($nilai as $n => $nilaiku)
       {
           if($nilaiku!=NULL)
           {
            DB::table('nilai_siswa')->insert([
        
                'ID_KELAS' => $request->idkelas,
                'ID_UJIAN' => $request->idujian,
                'ID_MAPEL' => $request->idmapel,
                'NO_INDUK' => $request->noinduk[$n],
                'KODE_NILAI' => $request->kodenilai[$n],
                'JUMLAH_NILAI' => $request->jumlahnilai[$n],
                'TGL_INPUT' => $request->tglinput
                ]);
           }
        }
        return redirect('penilaianindex3')->with(['success' => 'Input Nilai Berhasil']);
    }

    public function store4(Request $request)
    {
        
        $siswa = DB::table('siswa')->where('id_kelas','Kel04')
                                   ->where('status_siswa','0')->count();
        $nilai = $request->jumlahnilai;
        foreach($nilai as $n => $nilaiku)
       {
           if($nilaiku!=NULL)
           {
            DB::table('nilai_siswa')->insert([
        
                'ID_KELAS' => $request->idkelas,
                'ID_UJIAN' => $request->idujian,
                'ID_MAPEL' => $request->idmapel,
                'NO_INDUK' => $request->noinduk[$n],
                'KODE_NILAI' => $request->kodenilai[$n],
                'JUMLAH_NILAI' => $request->jumlahnilai[$n],
                'TGL_INPUT' => $request->tglinput
                ]);
                
           }
        }
        return redirect('penilaianindex4')->with(['success' => 'Input Nilai Berhasil']);
    }

    public function store5(Request $request)
    {
        
        $siswa = DB::table('siswa')->where('id_kelas','Kel05')
                                   ->where('status_siswa','0')->count();
        $nilai = $request->jumlahnilai;
        foreach($nilai as $n => $nilaiku)
       {
           if($nilaiku!=NULL)
           {
            DB::table('nilai_siswa')->insert([
        
                'ID_KELAS' => $request->idkelas,
                'ID_UJIAN' => $request->idujian,
                'ID_MAPEL' => $request->idmapel,
                'NO_INDUK' => $request->noinduk[$n],
                'KODE_NILAI' => $request->kodenilai[$n],
                'JUMLAH_NILAI' => $request->jumlahnilai[$n],
                'TGL_INPUT' => $request->tglinput
                ]);
                
           }
        }
        return redirect('penilaianindex5')->with(['success' => 'Input Nilai Berhasil']);
    }

    public function store6(Request $request)
    {
        
        $siswa = DB::table('siswa')->where('id_kelas','Kel06')
                                   ->where('status_siswa','0')->count();
        $nilai = $request->jumlahnilai;
        foreach($nilai as $n => $nilaiku)
       {
           if($nilaiku!=NULL)
           {
            DB::table('nilai_siswa')->insert([
        
                'ID_KELAS' => $request->idkelas,
                'ID_UJIAN' => $request->idujian,
                'ID_MAPEL' => $request->idmapel,
                'NO_INDUK' => $request->noinduk[$n],
                'KODE_NILAI' => $request->kodenilai[$n],
                'JUMLAH_NILAI' => $request->jumlahnilai[$n],
                'TGL_INPUT' => $request->tglinput
                ]);
                
           }
        }
        return redirect('penilaianindex6')->with(['success' => 'Input Nilai Berhasil']);
    }



    public function cetak_penilaian1()
    {
        $siswaku = DB::table('siswa')
        ->join('nilai_siswa','siswa.NO_INDUK','=','nilai_siswa.NO_INDUK')
        ->join('kelas','siswa.ID_KELAS','=','kelas.ID_KELAS')
        ->join('mata_pelajaran','nilai_siswa.ID_MAPEL','=','mata_pelajaran.ID_MAPEL')
        ->join('skala_nilai','nilai_siswa.KODE_NILAI','=','skala_nilai.KODE_NILAI')
        ->select('siswa.NO_INDUK','siswa.NAMA_SISWA','kelas.NAMA_KELAS','mata_pelajaran.NAMA_MAPEL','skala_nilai.KODE_NILAI','nilai_siswa.JUMLAH_NILAI')
        ->where('kelas.id_kelas','Kel01')
        ->where('siswa.status_siswa','0')
        ->get();
        $pdf=PDF::loadview('penilaian/10ips/penilaian_pdf',['siswaku'=>$siswaku])->setPaper('a4');
        return $pdf->stream('penilaian-pdf');
    }

    public function cetak_penilaian2()
    {
        $siswaku = DB::table('siswa')
        ->join('nilai_siswa','siswa.NO_INDUK','=','nilai_siswa.NO_INDUK')
        ->join('kelas','siswa.ID_KELAS','=','kelas.ID_KELAS')
        ->join('mata_pelajaran','nilai_siswa.ID_MAPEL','=','mata_pelajaran.ID_MAPEL')
        ->join('skala_nilai','nilai_siswa.KODE_NILAI','=','skala_nilai.KODE_NILAI')
        ->select('siswa.NO_INDUK','siswa.NAMA_SISWA','kelas.NAMA_KELAS','mata_pelajaran.NAMA_MAPEL','skala_nilai.KODE_NILAI','nilai_siswa.JUMLAH_NILAI')
        ->where('kelas.id_kelas','Kel03')
        ->where('siswa.status_siswa','0')
        ->get();
        $pdf=PDF::loadview('penilaian/10ips/penilaian_pdf',['siswaku'=>$siswaku])->setPaper('a4');
        return $pdf->stream('penilaian-pdf');
    }

    public function cetak_penilaian3()
    {
        $siswaku = DB::table('siswa')
        ->join('nilai_siswa','siswa.NO_INDUK','=','nilai_siswa.NO_INDUK')
        ->join('kelas','siswa.ID_KELAS','=','kelas.ID_KELAS')
        ->join('mata_pelajaran','nilai_siswa.ID_MAPEL','=','mata_pelajaran.ID_MAPEL')
        ->join('skala_nilai','nilai_siswa.KODE_NILAI','=','skala_nilai.KODE_NILAI')
        ->select('siswa.NO_INDUK','siswa.NAMA_SISWA','kelas.NAMA_KELAS','mata_pelajaran.NAMA_MAPEL','skala_nilai.KODE_NILAI','nilai_siswa.JUMLAH_NILAI')
        ->where('kelas.id_kelas','Kel05')
        ->where('siswa.status_siswa','0')
        ->get();
        $pdf=PDF::loadview('penilaian/10ips/penilaian_pdf',['siswaku'=>$siswaku])->setPaper('a4');
        return $pdf->stream('penilaian-pdf');
    }

    public function cetak_penilaian4()
    {
        $siswaku = DB::table('siswa')
        ->join('nilai_siswa','siswa.NO_INDUK','=','nilai_siswa.NO_INDUK')
        ->join('kelas','siswa.ID_KELAS','=','kelas.ID_KELAS')
        ->join('mata_pelajaran','nilai_siswa.ID_MAPEL','=','mata_pelajaran.ID_MAPEL')
        ->join('skala_nilai','nilai_siswa.KODE_NILAI','=','skala_nilai.KODE_NILAI')
        ->select('siswa.NO_INDUK','siswa.NAMA_SISWA','kelas.NAMA_KELAS','mata_pelajaran.NAMA_MAPEL','skala_nilai.KODE_NILAI','nilai_siswa.JUMLAH_NILAI')
        ->where('kelas.id_kelas','Kel04')
        ->where('siswa.status_siswa','0')
        ->get();
        $pdf=PDF::loadview('penilaian/10ips/penilaian_pdf',['siswaku'=>$siswaku])->setPaper('a4');
        return $pdf->stream('penilaian-pdf');
    }

    public function cetak_penilaian5()
    {
        $siswaku = DB::table('siswa')
        ->join('nilai_siswa','siswa.NO_INDUK','=','nilai_siswa.NO_INDUK')
        ->join('kelas','siswa.ID_KELAS','=','kelas.ID_KELAS')
        ->join('mata_pelajaran','nilai_siswa.ID_MAPEL','=','mata_pelajaran.ID_MAPEL')
        ->join('skala_nilai','nilai_siswa.KODE_NILAI','=','skala_nilai.KODE_NILAI')
        ->select('siswa.NO_INDUK','siswa.NAMA_SISWA','kelas.NAMA_KELAS','mata_pelajaran.NAMA_MAPEL','skala_nilai.KODE_NILAI','nilai_siswa.JUMLAH_NILAI')
        ->where('kelas.id_kelas','Kel02')
        ->where('siswa.status_siswa','0')
        ->get();
        $pdf=PDF::loadview('penilaian/10ips/penilaian_pdf',['siswaku'=>$siswaku])->setPaper('a4');
        return $pdf->stream('penilaian-pdf');
    }

    public function cetak_penilaian6()
    {
        $siswaku = DB::table('siswa')
        ->join('nilai_siswa','siswa.NO_INDUK','=','nilai_siswa.NO_INDUK')
        ->join('kelas','siswa.ID_KELAS','=','kelas.ID_KELAS')
        ->join('mata_pelajaran','nilai_siswa.ID_MAPEL','=','mata_pelajaran.ID_MAPEL')
        ->join('skala_nilai','nilai_siswa.KODE_NILAI','=','skala_nilai.KODE_NILAI')
        ->select('siswa.NO_INDUK','siswa.NAMA_SISWA','kelas.NAMA_KELAS','mata_pelajaran.NAMA_MAPEL','skala_nilai.KODE_NILAI','nilai_siswa.JUMLAH_NILAI')
        ->where('kelas.id_kelas','Kel06')
        ->where('siswa.status_siswa','0')
        ->get();
        $pdf=PDF::loadview('penilaian/10ips/penilaian_pdf',['siswaku'=>$siswaku])->setPaper('a4');
        return $pdf->stream('penilaian-pdf');
    }
    
    public function update(Request $request)
    {
         DB::table('nilai_siswa')->where('ID_NILAI',$request->idnilai)->update([
            'ID_NILAI' => $request->idnilai,
            'ID_KELAS' => $request->idkelas,
            'ID_UJIAN' => $request->idujian,
            'ID_MAPEL' => $request->idmapel,
            'NO_INDUK' => $request->noinduk,
            'KODE_NILAI' => $request->kodenilai,
            'JUMLAH_NILAI' => $request->jumlahnilai,
            'TGL_INPUT' => $request->tglinput
        ]);
        return redirect('10mipaindex');
    }

    public function destroy( $id )
    {
        DB::table('nilai_siswa')->where('id_nilai',$id)->delete();
        return redirect('10mipaindex');
    }

    public function importExcel(Request $request){
        // dd($request->all());
        $request->validate([
            'data_nilai' => 'required|mimes:xlsx,xls',
        ]);

        $file = $request->file('data_nilai')->store('import');

        // $import = new CustomersImport;
        // $import->import($file);
        
        $import = Excel::import(new NilaisImport, $file);

        // dd($import->errors());
        return back()->with('success','You have successfully insert data');
        // dd($request->all());
    }

    public function laporan_mipa1(){
        $jenis_ujian = DB::table('jenis_ujian')->get();
        $nilai_siswa = DB::table('nilai_siswa')->get();
        $mapel = DB::table('mata_pelajaran')
                ->get();
        $siswaku = DB::table('siswa')
                ->join('kelas','siswa.ID_KELAS','=','kelas.ID_KELAS')
                ->select('siswa.NO_INDUK','siswa.NAMA_SISWA','kelas.NAMA_KELAS')
                ->where('kelas.id_kelas','Kel01')
                ->where('siswa.status_siswa','0')
                ->get();
        return view('penilaian/10ips/search_siswa')->with(compact('siswaku','mapel','jenis_ujian','nilai_siswa'));
    }

    public function laporan_mipa2(){
        $jenis_ujian = DB::table('jenis_ujian')->get();
        $nilai_siswa = DB::table('nilai_siswa')->get();
        $mapel = DB::table('mata_pelajaran')
                ->get();
        $siswaku = DB::table('siswa')
                ->join('kelas','siswa.ID_KELAS','=','kelas.ID_KELAS')
                ->select('siswa.NO_INDUK','siswa.NAMA_SISWA','kelas.NAMA_KELAS')
                ->where('kelas.id_kelas','Kel03')
                ->where('siswa.status_siswa','0')
                ->get();
        return view('penilaian/10ips/search_siswa')->with(compact('siswaku','mapel','jenis_ujian','nilai_siswa'));
    }

    public function laporan_mipa3(){
        $jenis_ujian = DB::table('jenis_ujian')->get();
        $nilai_siswa = DB::table('nilai_siswa')->get();
        $mapel = DB::table('mata_pelajaran')
                ->get();
        $siswaku = DB::table('siswa')
                ->join('kelas','siswa.ID_KELAS','=','kelas.ID_KELAS')
                ->select('siswa.NO_INDUK','siswa.NAMA_SISWA','kelas.NAMA_KELAS')
                ->where('kelas.id_kelas','Kel05')
                ->where('siswa.status_siswa','0')
                ->get();
        return view('penilaian/10ips/search_siswa')->with(compact('siswaku','mapel','jenis_ujian','nilai_siswa'));
    }

    public function laporan_ips1(){
        $jenis_ujian = DB::table('jenis_ujian')->get();
        $nilai_siswa = DB::table('nilai_siswa')->get();
        $mapel = DB::table('mata_pelajaran')
                ->get();
        $siswaku = DB::table('siswa')
                ->join('kelas','siswa.ID_KELAS','=','kelas.ID_KELAS')
                ->select('siswa.NO_INDUK','siswa.NAMA_SISWA','kelas.NAMA_KELAS')
                ->where('kelas.id_kelas','Kel04')
                ->where('siswa.status_siswa','0')
                ->get();
        return view('penilaian/10ips/search_siswa')->with(compact('siswaku','mapel','jenis_ujian','nilai_siswa'));
    }

    public function laporan_ips2(){
        $jenis_ujian = DB::table('jenis_ujian')->get();
        $nilai_siswa = DB::table('nilai_siswa')->get();
        $mapel = DB::table('mata_pelajaran')
                ->get();
        $siswaku = DB::table('siswa')
                ->join('kelas','siswa.ID_KELAS','=','kelas.ID_KELAS')
                ->select('siswa.NO_INDUK','siswa.NAMA_SISWA','kelas.NAMA_KELAS')
                ->where('kelas.id_kelas','Kel02')
                ->where('siswa.status_siswa','0')
                ->get();
        return view('penilaian/10ips/search_siswa')->with(compact('siswaku','mapel','jenis_ujian','nilai_siswa'));
    }

    public function laporan_ips3(){
        $jenis_ujian = DB::table('jenis_ujian')->get();
        $nilai_siswa = DB::table('nilai_siswa')->get();
        $mapel = DB::table('mata_pelajaran')
                ->get();
        $siswaku = DB::table('siswa')
                ->join('kelas','siswa.ID_KELAS','=','kelas.ID_KELAS')
                ->select('siswa.NO_INDUK','siswa.NAMA_SISWA','kelas.NAMA_KELAS')
                ->where('kelas.id_kelas','Kel06')
                ->where('siswa.status_siswa','0')
                ->get();
        return view('penilaian/10ips/search_siswa')->with(compact('siswaku','mapel','jenis_ujian','nilai_siswa'));
    }

    public function cari_laporan(Request $request){

        // dd($request->all());
        $nilai_siswa = DB::table('nilai_siswa')->get();
        $jenis_ujian = DB::table('jenis_ujian')->get();
        $mapel = DB::table('mata_pelajaran')
                ->get();
        $laporan = DB::table('siswa')
        ->join('nilai_siswa','siswa.NO_INDUK','=','nilai_siswa.NO_INDUK')
        ->join('kelas','siswa.ID_KELAS','=','kelas.ID_KELAS')
        ->join('mata_pelajaran','nilai_siswa.ID_MAPEL','=','mata_pelajaran.ID_MAPEL')
        ->join('skala_nilai','nilai_siswa.KODE_NILAI','=','skala_nilai.KODE_NILAI')
        ->select('siswa.NO_INDUK','siswa.NAMA_SISWA','kelas.NAMA_KELAS','mata_pelajaran.NAMA_MAPEL', 'mata_pelajaran.ID_MAPEL','skala_nilai.KODE_NILAI','nilai_siswa.JUMLAH_NILAI')
        ->where('siswa.status_siswa','0')
        ->where('nilai_siswa.ID_UJIAN','=',$request->id_ujian)
        ->where('nilai_siswa.NO_INDUK','=',$request->no_induk)
        ->get();
        // dump($siswaku);
        $no_induk=$request->no_induk;
        $id_ujian=$request->id_ujian;

        return view('penilaian/10ips/laporan')->with(compact('laporan','mapel','jenis_ujian','nilai_siswa','no_induk','id_ujian'));
    }


    public function cetak_pdf(Request $request)
    {
        $presensi_siswa = DB::table('presensi_siswa')
        ->select('presensi_siswa.NO_INDUK')
        ->where('presensi_siswa.NO_INDUK',$request->no_induk)
        ->get();
        $hitungpresensi = count($presensi_siswa);
        $nilai_siswa = DB::table('nilai_siswa')->get();
        $jenis_ujian = DB::table('jenis_ujian')->get();
        $mapel = DB::table('mata_pelajaran')
                ->get();
        $laporan = DB::table('siswa')
        ->join('nilai_siswa','siswa.NO_INDUK','=','nilai_siswa.NO_INDUK')
        ->join('kelas','siswa.ID_KELAS','=','kelas.ID_KELAS')
        ->join('mata_pelajaran','nilai_siswa.ID_MAPEL','=','mata_pelajaran.ID_MAPEL')
        ->join('skala_nilai','nilai_siswa.KODE_NILAI','=','skala_nilai.KODE_NILAI')
        ->join('jenis_ujian','nilai_siswa.ID_UJIAN','=','jenis_ujian.ID_UJIAN')
        ->select('siswa.NO_INDUK','siswa.NAMA_SISWA','kelas.NAMA_KELAS','mata_pelajaran.NAMA_MAPEL','mata_pelajaran.ID_MAPEL','skala_nilai.KODE_NILAI','nilai_siswa.JUMLAH_NILAI','jenis_ujian.NAMA_UJIAN')
        ->where('siswa.status_siswa','0')
        ->where('nilai_siswa.ID_UJIAN','=',$request->id_ujian)
        ->where('nilai_siswa.NO_INDUK','=',$request->no_induk)
        ->get();

        // $laporann = DB::table('nilai_siswa')
        //                 ->where('NO_INDUK','=',$request->no_induk)
        //                 ->groupBy('NO_INDUK')
        //                 ->get();

        
        $identitas= DB::table('siswa')
        ->join('nilai_siswa as ns','siswa.NO_INDUK','ns.NO_INDUK')
        ->join('kelas as k','siswa.ID_KELAS','k.ID_KELAS')
        ->join('jenis_ujian as uj','ns.ID_UJIAN','uj.ID_UJIAN')
        ->select('siswa.NO_INDUK','siswa.NAMA_SISWA','k.NAMA_KELAS','uj.NAMA_UJIAN')
        ->where('siswa.status_siswa','0')
        ->where('ns.ID_UJIAN','=',$request->id_ujian)
        ->where('ns.NO_INDUK','=',$request->no_induk)
        ->first();
        
        
        //  var_dump($laporan);

        $pdf=PDF::loadview('penilaian/10ips/pdf_siswa',['nilai_siswa'=>$nilai_siswa,'jenis_ujian'=>$jenis_ujian,
        'mapel'=>$mapel,'laporan'=>$laporan,'hitungpresensi'=>$hitungpresensi,'presensi_siswa'=>$presensi_siswa,'identitas'=>$identitas])->setPaper('a4');
        return $pdf->stream('penilaian-pdf');
        
    }

}
