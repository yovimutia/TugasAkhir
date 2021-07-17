<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Pegawai;

class pegawaiController extends Controller
{
    public function create(){
        $jabatan = DB::table('jabatan')->get();
        return view('pegawai/create', ['jabatan'=>$jabatan]);
    }

    public function index(){
        //$pegawai = DB::table('pegawai')->where('STATUS_PEGAWAI','0')->get();
        $pegawai = DB::table('pegawai')
                   ->join('jabatan','pegawai.ID_JABATAN','=','jabatan.ID_JABATAN')->get();
        return view('pegawai/index', ['pegawai'=>$pegawai]);
    }

    public function store(Request $request)
    {
        DB::table('jabatan')->get();
        DB::table('pegawai')->insert([
        'ID_PEGAWAI' => $request->idpegawai,
        'ID_JABATAN' => $request->idjabatan,
        'NAMA_PEGAWAI' => $request->namapegawai,
        'ALAMAT_OEGAWAI' => $request->alamatpegawai,
        'JK_PEGAWAI' => $request->jkpegawai,
        'TGL_LAHIR_PEGAWAI' => $request->tgllahirpegawai,
        'TELP_PEGAWAI' => $request->telppegawai,
        'EMAIL_PEGAWAI' => $request->emailpegawai,
        'PASSWORD_PEGAWAI' => $request->passwordpegawai,
        'STATUS_PEGAWAI' => '0'
        
        ]);
        return redirect('pegawaiindex')->with(['success' => 'Input Pegawai Berhasil']);
    }

    public function edit( $id )
    {
       //$pegawai = DB::table('pegawai')->where('id_pegawai',$id)->get();
       $jabatan = DB::table('jabatan')->get();
       $pegawai = DB::table('pegawai')
                  ->join('jabatan','pegawai.ID_JABATAN','=','jabatan.ID_JABATAN')
                  ->where('id_pegawai',$id)->get();
        return view('pegawai/index',['pegawai'=>$pegawai,'jabatan'=> $jabatan]);
    }

    public function editprofile(){
        $id = Session::get('id');
	    $pegawai = DB::table('pegawai')
		   ->join('jabatan as j','pegawai.ID_JABATAN','j.ID_JABATAN')
		   ->where('pegawai.ID_PEGAWAI',$id)
		   ->get();
	return view ('tampilan/edit_profil',['pegawai'=>$pegawai]);
    }

    public function update(Request $request)
    {
        $checkpasswordlama = DB::table('pegawai')
                          ->select('password_pegawai')
                          ->where('id_pegawai',$request->idpegawai)
                          ->where('password_pegawai',$request->passwordlamapegawai)->get();
        if($checkpasswordlama!="[]") //[] buat check kosong atau nggak
        {
            DB::table('pegawai')->where('ID_PEGAWAI',$request->idpegawai)->update([
                'ID_PEGAWAI' => $request->idpegawai,
                'EMAIL_PEGAWAI' => $request->emailpegawai,
                'PASSWORD_PEGAWAI' => $request->passwordbarupegawai
            ]);
            return redirect('pegawaiindex')->with(['success' => 'Update Pegawai Berhasil']);
        }
        else 
        {
            return redirect('pegawaiindex')->with(['error' => 'Password Lama Salah']);
        }

        
        /* DB::table('pegawai')->where('ID_PEGAWAI',$request->idpegawai)->update([
            'ID_PEGAWAI' => $request->idpegawai,
            'ID_JABATAN' => $request->idjabatan,
            'NAMA_PEGAWAI' => $request->namapegawai,
            'ALAMAT_OEGAWAI' => $request->alamatpegawai,
            'JK_PEGAWAI' => $request->jkpegawai,
            'TGL_LAHIR_PEGAWAI' => $request->tgllahirpegawai,
            'TELP_PEGAWAI' => $request->telppegawai,
            'EMAIL_PEGAWAI' => $request->emailpegawai,
            'PASSWORD_PEGAWAI' => $request->passwordpegawai
        ]);
        return redirect('pegawaiindex');*/
    }

    public function update_profil(Request $request)
    {
        $checkpasswordlama = DB::table('pegawai')
                          ->select('password_pegawai')
                          ->where('id_pegawai',$request->idpegawai)
                          ->where('password_pegawai',$request->passwordlamapegawai)->get();
        if($checkpasswordlama!="[]") //[] buat check kosong atau nggak
        {
            DB::table('pegawai')->where('ID_PEGAWAI',$request->idpegawai)->update([
                'ID_PEGAWAI' => $request->idpegawai,
                'EMAIL_PEGAWAI' => $request->emailpegawai,
                'PASSWORD_PEGAWAI' => $request->passwordbarupegawai
            ]);
            return redirect('edit_profil')->with(['success' => 'Update Pegawai Berhasil']);
        }
        else 
        {
            return redirect('edit_profil')->with(['error' => 'Password Lama Salah']);
        }

    }

    public function destroy( $id )
    {
        DB::table('pegawai')->where('id_pegawai',$id)->delete();
        return redirect('pegawaiindex')->with(['success' => 'Hapus Pegawai Berhasil']);
    }
    public function gantiStatus($id)
    {
        $status = DB::table('pegawai')->select('STATUS_PEGAWAI')
                            ->where('id_pegawai',$id)->get();
        echo $status;
        if($status=='[{"STATUS_PEGAWAI":"0"}]')
        {
            DB::table('pegawai')->where('id_pegawai',$id)->update([
                'STATUS_PEGAWAI' => '1'
            ]);
            return redirect('pegawaiindex')->with(['success' => 'Status Pegawai Berhasil Diupdate']);
        }
        else if ($status=='[{"STATUS_PEGAWAI":"1"}]')
        {
            DB::table('pegawai')->where('id_pegawai',$id)->update([
                'STATUS_PEGAWAI' => '0'
            ]);
            return redirect('pegawaiindex')->with(['success' => 'Status Pegawai Berhasil Diupdate']);
        }
    }
}
