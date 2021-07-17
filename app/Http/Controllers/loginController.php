<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Pegawai;

class loginController extends Controller
{
    public function index()
    {
       return view('tampilan/login');
    }
    
    public function proses(request $req){
        $emailpegawai = $req->EMAIL_PEGAWAI;
        $passwordpegawai = $req->PASSWORD_PEGAWAI;
        $data = pegawai::where('EMAIL_PEGAWAI',$emailpegawai)->first();
        if($data){
            if($data->PASSWORD_PEGAWAI == $passwordpegawai){
                Session::put('id',$data->ID_PEGAWAI);
                Session::put('jabatan',$data->JABATAN);
                Session::put('login',TRUE);
                if($data->ID_JABATAN == "J02"){
                    Session::put('admin', TRUE);
                }
                if($data->ID_JABATAN == "J03"){
                    Session::put('manager', TRUE);
                }
                if($data->ID_JABATAN == "J01"){
                    Session::put('tentor', TRUE);
                }
                    return view('tampilan/dashboard');
            }
            else{
            return redirect('login')->with('alert','Wrong Email or Password');
            }
            
        }
        else{
            return redirect('login')->with('alert','Wrong Email or Password');
        }
    }
       
    public function logout(){
        Session::flush();
        return redirect('login')->with('alert-success','You have logged out');
    }     

}
