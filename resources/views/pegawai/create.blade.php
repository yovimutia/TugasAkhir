@extends('tampilan/index')
@section('konten')

                <div class="card-body" >
                <form action="pegawaiStore" class="form-horizontal" method="post"> 
                {{ @csrf_field() }}         
                                    <h4 class="card-title">Tambah Data Pegawai</h4>
                                    
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-right control-label col-form-label" for="fname">ID Pegawai</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" id="idpegawai" name="idpegawai" type="text" placeholder="ID Pegawai auto" ReadOnly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-right control-label col-form-label" for="lname">Nama Jabatan</label>
                                        <div class="col-sm-9">
                                        <select id="idjabatan" type="text" name="idjabatan" select id="inlineFormInput"  class="form-control">
                                        @foreach ($jabatan as $jabatan)
                                        @if($jabatan->STATUS_JABATAN == 0)
                                        <option value="{{ $jabatan->ID_JABATAN }}">
                                        {{ $jabatan->NAMA_JABATAN }}
                                        </option>
                                        @else
                                        <option value="{{ $jabatan->ID_JABATAN }}" disabled>
                                        {{ $jabatan->NAMA_JABATAN }} - Non Active
                                        </option>
                                        @endif
                                        @endforeach
                                        </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-right control-label col-form-label" for="fname">Nama Pegawai</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" id="inputNamaPeg" name="namapegawai" type="text" placeholder="masukkan Nama Pegawai" maxlength="35" required="">
                                            <!-- <label id="notifikasiSisaKarakterNamaPeg">Sisa karakter : <span id="sisaKarakterNamaPeg"></span></label> -->
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-right control-label col-form-label" for="fname">Alamat</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" id="inputAlamatPeg" name="alamatpegawai" type="text" placeholder="masukkan Alamat" maxlength="50" required="">
                                            <!-- <label id="notifikasiSisaKarakterAlamatPeg">Sisa karakter : <span id="sisaKarakterAlamatPeg"></span></label> -->
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-right control-label col-form-label" for="fname">Jenis Kelamin</label>
                                        <div class="col-sm-9">
                                            <div class="custom-control custom-radio mb-3">
                                                <input name="jkpegawai" class="custom-control-input" id="customRadio5" value="Laki-Laki" type="radio">
                                                <label class="custom-control-label" for="customRadio5">Laki-Laki</label>
                                              </div>
                                              <div class="custom-control custom-radio mb-3">
                                                <input name="jkpegawai" class="custom-control-input" id="customRadio6" value="Perempuan"  type="radio">
                                                <label class="custom-control-label" for="customRadio6">Perempuan</label>
                                              </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-right control-label col-form-label" for="fname">Tanggal Lahir</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" id="tgllahirpegawai" name="tgllahirpegawai" type="date" placeholder="masukkan Tanggal Lahir" required="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-right control-label col-form-label" for="fname">Telepon</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" id="inputTelpPeg" name="telppegawai" type="number" placeholder="masukkan Nomor Telepon" maxlength="12" required="">
                                            <!-- <label id="notifikasiSisaKarakterTelpPeg">Sisa karakter : <span id="sisaKarakterTelpPeg"></span></label> -->
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-right control-label col-form-label" for="fname">Email</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" id="inputEmailPeg" name="emailpegawai" type="email" placeholder="masukkan Email" maxlength="30" required="">
                                            <!-- <label id="notifikasiSisaKarakterEmailPeg">Sisa karakter : <span id="sisaKarakterEmailPeg"></span></label> -->
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-right control-label col-form-label" for="fname">Password</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" id="inputPassPeg" name="passwordpegawai" type="password" placeholder="masukkan Password" maxlength="20" required="">
                                            <!-- <label id="notifikasiSisaKarakterPassPeg">Sisa karakter : <span id="sisaKaraktePassPeg"></span></label> -->
                                        </div>
                                    </div>
                                    

                                    <div class="text-right upgrade-btn">
                                                <a href="pegawaiindex"><button type="submit" class="btn btn-success d-none d-md-inline-block text-white">Save</button>
                                                </a>

                                                <a href="pegawaiindex">
                                                <button class="btn btn-danger" type="button" style="padding: 5px" >Cancel</button>
                                                </a>
                                    </div>           
                                   

                            </form>
                             </div>

             @section('script')
                <script>
                //Nama Pegawai
                document.addEventListener('DOMContentLoaded', function (){
                    const inputMaxLengthOnLoad = document.getElementById("inputNamaPeg").maxLength;
                    document.getElementById("sisaKarakterNamaPeg").innerText = inputMaxLengthOnLoad;
                    document.getElementById("notifikasiSisaKarakterNamaPeg").style.visibility = "hidden" //jika tidak dalam onFocus maka visibility = hidden
                });
                document.getElementById("inputNamaPeg").addEventListener("input",function(){
                    const jumlahKarakterDiketik = document.getElementById("inputNamaPeg").value.length; //get jumlah karakter
                    const jumlahKarakterMaksimal = document.getElementById("inputNamaPeg").maxLength //get karakter maksimal
                    console.log(jumlahKarakterDiketik, jumlahKarakterMaksimal)
                    const sisaKarakterUpdate = jumlahKarakterMaksimal - jumlahKarakterDiketik;
                    document.getElementById("sisaKarakterNamaPeg").innerText = sisaKarakterUpdate; //update sisa karakter ke id sisaKarakter
                    if(sisaKarakterUpdate == 0)
                    {
                        document.getElementById("sisaKarakterNamaPeg").innerText = "batas maksimal tercapai!" //update tulisan ke id sisaKarakter
                    }
                    else if(sisaKarakterUpdate <= 5)
                    {
                        document.getElementById("notifikasiSisaKarakterNamaPeg").style.color = "red" //beri warna pada id notifikasiSisaKarakter
                    }
                    else{
                        document.getElementById("notifikasiSisaKarakterNamaPeg").style.color = "black" ////beri warna pada id notifikasiSisaKarakter
                    }
                });

                document.getElementById("inputNamaPeg").addEventListener("focus",function(){
                    document.getElementById("notifikasiSisaKarakterNamaPeg").style.visibility = null; //jika focus maka visibility = true
                });

                document.getElementById("inputNamaPeg").addEventListener("blur",function(){
                    document.getElementById("notifikasiSisaKarakterNamaPeg").style.visibility = "hidden"; //jika dalam blur maka visibility = hidden
                })

                 //Alamat Pegawai
                 document.addEventListener('DOMContentLoaded', function (){
                    const inputMaxLengthOnLoad = document.getElementById("inputAlamatPeg").maxLength;
                    document.getElementById("sisaKarakterAlamatPeg").innerText = inputMaxLengthOnLoad;
                    document.getElementById("notifikasiSisaKarakterAlamatPeg").style.visibility = "hidden" //jika tidak dalam onFocus maka visibility = hidden
                });
                document.getElementById("inputAlamatPeg").addEventListener("input",function(){
                    const jumlahKarakterDiketik = document.getElementById("inputAlamatPeg").value.length; //get jumlah karakter
                    const jumlahKarakterMaksimal = document.getElementById("inputAlamatPeg").maxLength //get karakter maksimal
                    console.log(jumlahKarakterDiketik, jumlahKarakterMaksimal)
                    const sisaKarakterUpdate = jumlahKarakterMaksimal - jumlahKarakterDiketik;
                    document.getElementById("sisaKarakterAlamatPeg").innerText = sisaKarakterUpdate; //update sisa karakter ke id sisaKarakter
                    if(sisaKarakterUpdate == 0)
                    {
                        document.getElementById("sisaKarakterAlamatPeg").innerText = "batas maksimal tercapai!" //update tulisan ke id sisaKarakter
                    }
                    else if(sisaKarakterUpdate <= 5)
                    {
                        document.getElementById("notifikasiSisaKarakterAlamatPeg").style.color = "red" //beri warna pada id notifikasiSisaKarakter
                    }
                    else{
                        document.getElementById("notifikasiSisaKarakterAlamatPeg").style.color = "black" ////beri warna pada id notifikasiSisaKarakter
                    }
                });

                document.getElementById("inputAlamatPeg").addEventListener("focus",function(){
                    document.getElementById("notifikasiSisaKarakterAlamatPeg").style.visibility = null; //jika focus maka visibility = true
                });

                document.getElementById("inputAlamatPeg").addEventListener("blur",function(){
                    document.getElementById("notifikasiSisaKarakterAlamatPeg").style.visibility = "hidden"; //jika dalam blur maka visibility = hidden
                })
            <script>
            @endsection

     @endsection