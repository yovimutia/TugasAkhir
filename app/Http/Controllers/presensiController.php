<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use \PDF;
use App\Presensi;
use Redirect;
use Carbon\Carbon;

class presensiController extends Controller
{

    public function index(Request $request){
        $start = Carbon::now()->startOfMonth()->format('Y-m-d H:i:s');
        //DAN ENDOFMONTH UNTUK MENGAMBIL TANGGAL TERAKHIR DIBULAN YANG BERLAKU SAAT INI
        $end = Carbon::now()->endOfMonth()->format('Y-m-d H:i:s');

        //JIKA USER MELAKUKAN FILTER MANUAL, MAKA PARAMETER DATE AKAN TERISI
        if (request()->date != '') {
            //MAKA FORMATTING TANGGALNYA BERDASARKAN FILTER USER
            $date = explode(' - ' ,request()->date);
            $start = Carbon::parse($date[0])->format('Y-m-d') . ' 00:00:00';
            $end = Carbon::parse($date[1])->format('Y-m-d') . ' 23:59:59';
        }

        $siswa = DB::table('siswa')
                ->join('kelas','siswa.ID_KELAS','=','kelas.ID_KELAS')->get();
        $kelas = DB::table('kelas')->get();
        $jumlah_hadir=DB::table('presensi_siswa')
                ->select('NO_INDUK',DB::raw('COUNT(STATUS_PRESENSI) AS total_hadir'))
                ->groupBy('NO_INDUK')
                ->whereBetween('TGL_PRESENSI',[$start,$end])
                ->where('STATUS_PRESENSI', '1')->get();
                
                return view('presensi/index',['jumlah_hadir'=>$jumlah_hadir,'siswa'=>$siswa, 'kelas'=>$kelas]);

    }
    /*
    public function index(){
        $siswa = DB::table('siswa')->get();
        $presensi = DB::table('presensi_siswa')->get();
        return view('presensi/index', ['presensi'=>$presensi, 'siswa'=>$siswa]);
    }
    */

    public function create($id){
        $siswa = DB::table('siswa')
        ->join('presensi_siswa','siswa.NO_INDUK', '=','presensi_siswa.NO_INDUK')
        ->join('jadwal_les','presensi_siswa.ID_JADWAL', '=','jadwal_les.ID_JADWAL')
        ->select('')
        ->get();

        return view('presensi/create', ['siswa'=>$siswa]);
    }

    public function presensi($id)
    {
        
        $presensi = DB::table('siswa')
                    ->join('kelas','siswa.ID_KELAS','=','kelas.ID_KELAS')
                    ->join('jadwal_les','kelas.ID_KELAS','=','jadwal_les.ID_KELAS')
                    ->join('mata_pelajaran','jadwal_les.ID_MAPEL','=','mata_pelajaran.ID_MAPEL')
                    ->join('pegawai','jadwal_les.ID_PEGAWAI','=','pegawai.ID_PEGAWAI')
                    ->select('siswa.NO_INDUK','siswa.NAMA_SISWA','jadwal_les.TGL_LES', 'kelas.NAMA_KELAS', 'mata_pelajaran.NAMA_MAPEL', 'pegawai.NAMA_PEGAWAI','jadwal_les.id_jadwal')
                    ->where('jadwal_les.ID_JADWAL',$id)
                    ->WhereNotIn('siswa.NO_INDUK',function($query)use ($id){
                        $query->select('presensi_siswa.NO_INDUK')
                            ->from ('presensi_siswa')
                            ->where('ID_JADWAL','=',$id);
                    })
                    ->get();
        $data = DB::table('siswa')
                    ->join('kelas','siswa.ID_KELAS','=','kelas.ID_KELAS')
                    ->join('jadwal_les','kelas.ID_KELAS','=','jadwal_les.ID_KELAS')
                    ->join('mata_pelajaran','jadwal_les.ID_MAPEL','=','mata_pelajaran.ID_MAPEL')
                    ->join('pegawai','jadwal_les.ID_PEGAWAI','=','pegawai.ID_PEGAWAI')
                    ->select('jadwal_les.TGL_LES', 'kelas.NAMA_KELAS', 'mata_pelajaran.NAMA_MAPEL', 'pegawai.NAMA_PEGAWAI','jadwal_les.id_jadwal')
                    ->where('jadwal_les.ID_JADWAL',$id)
                    // ->WhereNotIn('siswa.NO_INDUK',function($query)use ($id){
                    //     $query->select('presensi_siswa.NO_INDUK')
                    //         ->from ('presensi_siswa')
                    //         ->where('ID_JADWAL','=',$id);
                    // })
                    ->first();
        return view('presensi/create',['presensi'=>$presensi,'data'=>$data]);
        //siswa, kelas, jadwal
    }


    public function store(Request $request)
    {
        $presensi = $request->statuspresensi;
        foreach($presensi as $p => $presensiku)   
       {
           if($presensiku!=NULL)
           {
            $inputPresensi = DB::table('presensi_siswa')->insert([
        
                'NO_INDUK' => $presensiku,
                'STATUS_PRESENSI' => '1',
                'ID_JADWAL'=>$request->id_jadwal,
                'TGL_PRESENSI' => $request->tglpresensi
                ]);
           }
        }
        return redirect('presensiindex')->with(['success' => 'Input Absen Berhasil']);
    }

    public function cetak_presensi()
    {
        
        //$total_hadir = DB::table('presensi_siswa')->get();
        //->join('nilai_siswa','siswa.NO_INDUK','=','nilai_siswa.NO_INDUK')
        //->join('kelas','siswa.ID_KELAS','=','kelas.ID_KELAS')
        //->join('presensi_siswa','siswa.NO_INDUK','=','presensi_siswa.NO_INDUK')
        //->select('siswa.NO_INDUK','siswa.NAMA_SISWA','kelas.NAMA_KELAS','presensi_siswa.total_kehadiran')
        //->get();
        $start = Carbon::now()->startOfMonth()->format('Y-m-d H:i:s');
        //DAN ENDOFMONTH UNTUK MENGAMBIL TANGGAL TERAKHIR DIBULAN YANG BERLAKU SAAT INI
        $end = Carbon::now()->endOfMonth()->format('Y-m-d H:i:s');

        //JIKA USER MELAKUKAN FILTER MANUAL, MAKA PARAMETER DATE AKAN TERISI
        if (request()->date != '') {
            //MAKA FORMATTING TANGGALNYA BERDASARKAN FILTER USER
            $date = explode(' - ' ,request()->date);
            $start = Carbon::parse($date[0])->format('Y-m-d') . ' 00:00:00';
            $end = Carbon::parse($date[1])->format('Y-m-d') . ' 23:59:59';
        }

        $siswa = DB::table('siswa')
                ->join('kelas','siswa.ID_KELAS','=','kelas.ID_KELAS')->get();
        $kelas = DB::table('kelas')->get();
        $jumlah_hadir=DB::table('presensi_siswa')
                ->select('NO_INDUK',DB::raw('COUNT(STATUS_PRESENSI) AS total_hadir'))
                ->groupBy('NO_INDUK')
                ->whereBetween('TGL_PRESENSI',[$start,$end])
                ->where('STATUS_PRESENSI', '1')->get();
        $pdf=PDF::loadview('presensi/presensi_pdf',['jumlah_hadir'=>$jumlah_hadir, 'siswa'=>$siswa, 'kelas'=>$kelas])->setPaper('a4');
        return $pdf->stream('presensi-pdf');
        
        /*
        $siswa = DB::table('siswa')->get();
        $kelas = DB::table('kelas')->get();
        $presensi = DB::table('presensi_siswa')->get();
        //return view('presensi/presensi_pdf',['presensi'=>$presensi, 'siswa'=>$siswa]);
        $pdf=PDF::loadview('presensi/presensi_pdf',['presensi'=>$presensi, 'siswa'=>$siswa, 'kelas'=>$kelas])->setPaper('a4');
        return $pdf->stream('presensi-pdf');
        */
    }

    
}
