@extends('tampilan/index')
@section('konten')

                <div class="card-body" >
                <form action="siswaStore" class="form-horizontal" method="post"> 
                {{ @csrf_field() }}         
                                    <h4 class="card-title">Tambah Data Siswa</h4>
                                    
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-right control-label col-form-label" for="fname">No Induk</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" id="inputNoInduk" name="noinduk" type="text" placeholder="masukkan No Induk" maxlength="10" required="">
                                            <label id="notifikasiSisaKarakter">Sisa karakter : <span id="sisaKarakter"></span></label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-right control-label col-form-label" for="lname">Jenis Bimbingan</label>
                                        <div class="col-sm-9">
                                        <select id="idbimbingan" type="text" name="idbimbingan" select id="inlineFormInput"  class="form-control">
                                        @foreach ($bimbingan as $bimbingan)
                                        
                                        <option value="{{ $bimbingan->ID_BIMBINGAN }}">
                                        {{ $bimbingan->NAMA_BIMBINGAN }}
                                        </option>
                                       
                                        @endforeach
                                        </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-right control-label col-form-label" for="lname">Kelas</label>
                                        <div class="col-sm-9">
                                        <select id="idkelas" type="text" name="idkelas" select id="inlineFormInput"  class="form-control">
                                        @foreach ($kelas as $kelas)
                                        <option value="{{ $kelas->ID_KELAS}}">
                                        {{ $kelas->NAMA_KELAS }}
                                        </option>
                                        @endforeach
                                        </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-right control-label col-form-label" for="fname">Nama</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" id="inputNamaPanggilan" name="namasiswa" type="text" placeholder="masukkan Nama Siswa" maxlength="50" required="">
                                            <label id="notifikasiSisaKarakterNama">Sisa karakter : <span id="sisaKarakterNama"></span></label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-right control-label col-form-label" for="fname">Alamat</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" id="inputAlamat" name="alamatsiswa" type="text" placeholder="masukkan Alamat" maxlength="50" required="">
                                            <label id="notifikasiSisaKarakterAlamat">Sisa karakter : <span id="sisaKarakterAlamat"></span></label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-right control-label col-form-label" for="fname">Tanggal Lahir</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" id="tgllahirsiswa" name="tgllahirsiswa" type="date" placeholder="masukkan tanggal Lahir" required="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-right control-label col-form-label" for="fname">Jenis Kelamin</label>
                                        <div class="col-sm-9">
                                            <div class="custom-control custom-radio mb-3">
                                                <input name="jksiswa" class="custom-control-input" id="customRadio5" value="Laki-Laki" type="radio">
                                                <label class="custom-control-label" for="customRadio5">Laki-Laki</label>
                                              </div>
                                              <div class="custom-control custom-radio mb-3">
                                                <input name="jksiswa" class="custom-control-input" id="customRadio6" value="Perempuan" checked="" type="radio">
                                                <label class="custom-control-label" for="customRadio6">Perempuan</label>
                                              </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-right control-label col-form-label" for="fname">Telepon</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" id="inputTelp" name="telpsiswa" type="Text" placeholder="masukkan Nomor Telepon" maxlength="12" required="">
                                            <label id="notifikasiSisaKarakterTelp">Sisa karakter : <span id="sisaKarakterTelp"></span></label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-right control-label col-form-label" for="fname">Asal Sekolah</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" id="inputAsal" name="asalsekolah" type="text" placeholder="masukkan Asal sekolah" maxlength="20" required="">
                                            <label id="notifikasiSisaKarakterAsal">Sisa karakter : <span id="sisaKarakterAsal"></span></label>
                                        </div>
                                    </div>                      

                                    <div class="text-right upgrade-btn">
                                                <a href="siswaindex"><button type="submit" class="btn btn-success d-none d-md-inline-block text-white">Save</button>
                                                </a>

                                                <a href="siswaiindex">
                                                <button class="btn btn-danger" type="button" style="padding: 5px" >Cancel</button>
                                                </a>
                                    </div>           
                                   

                            </form>
                             </div>
        @section('script')
                <script>
                document.addEventListener('DOMContentLoaded', function (){
                    const inputMaxLengthOnLoad = document.getElementById("inputNoInduk").maxLength;
                    document.getElementById("sisaKarakter").innerText = inputMaxLengthOnLoad;
                    document.getElementById("notifikasiSisaKarakter").style.visibility = "hidden" //jika tidak dalam onFocus maka visibility = hidden
                });
                document.getElementById("inputNoInduk").addEventListener("input",function(){
                    const jumlahKarakterDiketik = document.getElementById("inputNoInduk").value.length; //get jumlah karakter
                    const jumlahKarakterMaksimal = document.getElementById("inputNoInduk").maxLength //get karakter maksimal
                    console.log(jumlahKarakterDiketik, jumlahKarakterMaksimal)
                    const sisaKarakterUpdate = jumlahKarakterMaksimal - jumlahKarakterDiketik;
                    document.getElementById("sisaKarakter").innerText = sisaKarakterUpdate; //update sisa karakter ke id sisaKarakter
                    if(sisaKarakterUpdate == 0)
                    {
                        document.getElementById("sisaKarakter").innerText = "batas maksimal tercapai!" //update tulisan ke id sisaKarakter
                    }
                    else if(sisaKarakterUpdate <= 5)
                    {
                        document.getElementById("notifikasiSisaKarakter").style.color = "red" //beri warna pada id notifikasiSisaKarakter
                    }
                    else{
                        document.getElementById("notifikasiSisaKarakter").style.color = "black" ////beri warna pada id notifikasiSisaKarakter
                    }
                });

                document.getElementById("inputNoInduk").addEventListener("focus",function(){
                    document.getElementById("notifikasiSisaKarakter").style.visibility = null; //jika focus maka visibility = true
                });

                document.getElementById("inputNoInduk").addEventListener("blur",function(){
                    document.getElementById("notifikasiSisaKarakter").style.visibility = "hidden"; //jika dalam blur maka visibility = hidden
                })




                //JS Input Nama Panggilan
                document.addEventListener('DOMContentLoaded', function (){
                    const inputMaxLengthOnLoad = document.getElementById("inputNamaPanggilan").maxLength;
                    document.getElementById("sisaKarakterNama").innerText = inputMaxLengthOnLoad;
                    document.getElementById("notifikasiSisaKarakterNama").style.visibility = "hidden" //jika tidak dalam onFocus maka visibility = hidden
                });
                document.getElementById("inputNamaPanggilan").addEventListener("input",function(){
                    const jumlahKarakterDiketik = document.getElementById("inputNamaPanggilan").value.length; //get jumlah karakter
                    const jumlahKarakterMaksimal = document.getElementById("inputNamaPanggilan").maxLength //get karakter maksimal
                    console.log(jumlahKarakterDiketik, jumlahKarakterMaksimal)
                    const sisaKarakterUpdate = jumlahKarakterMaksimal - jumlahKarakterDiketik;
                    document.getElementById("sisaKarakterNama").innerText = sisaKarakterUpdate; //update sisa karakter ke id sisaKarakter
                    if(sisaKarakterUpdate == 0)
                    {
                        document.getElementById("sisaKarakterNama").innerText = "batas maksimal tercapai!" //update tulisan ke id sisaKarakter
                    }
                    else if(sisaKarakterUpdate <= 5)
                    {
                        document.getElementById("notifikasiSisaKarakterNama").style.color = "red" //beri warna pada id notifikasiSisaKarakter
                    }
                    else{
                        document.getElementById("notifikasiSisaKarakterNama").style.color = "black" ////beri warna pada id notifikasiSisaKarakter
                    }
                });

                document.getElementById("inputNamaPanggilan").addEventListener("focus",function(){
                    document.getElementById("notifikasiSisaKarakterNama").style.visibility = null; //jika focus maka visibility = true
                });

                document.getElementById("inputNamaPanggilan").addEventListener("blur",function(){
                    document.getElementById("notifikasiSisaKarakterNama").style.visibility = "hidden"; //jika dalam blur maka visibility = hidden
                })

                 //JS Input alamat
                 document.addEventListener('DOMContentLoaded', function (){
                    const inputMaxLengthOnLoad = document.getElementById("inputAlamat").maxLength;
                    document.getElementById("sisaKarakterAlamat").innerText = inputMaxLengthOnLoad;
                    document.getElementById("notifikasiSisaKarakterAlamat").style.visibility = "hidden" //jika tidak dalam onFocus maka visibility = hidden
                });
                document.getElementById("inputAlamat").addEventListener("input",function(){
                    const jumlahKarakterDiketik = document.getElementById("inputAlamat").value.length; //get jumlah karakter
                    const jumlahKarakterMaksimal = document.getElementById("inputAlamat").maxLength //get karakter maksimal
                    console.log(jumlahKarakterDiketik, jumlahKarakterMaksimal)
                    const sisaKarakterUpdate = jumlahKarakterMaksimal - jumlahKarakterDiketik;
                    document.getElementById("sisaKarakterAlamat").innerText = sisaKarakterUpdate; //update sisa karakter ke id sisaKarakter
                    if(sisaKarakterUpdate == 0)
                    {
                        document.getElementById("sisaKarakterAlamat").innerText = "batas maksimal tercapai!" //update tulisan ke id sisaKarakter
                    }
                    else if(sisaKarakterUpdate <= 5)
                    {
                        document.getElementById("notifikasiSisaKarakterAlamat").style.color = "red" //beri warna pada id notifikasiSisaKarakter
                    }
                    else{
                        document.getElementById("notifikasiSisaKarakterAlamat").style.color = "black" ////beri warna pada id notifikasiSisaKarakter
                    }
                });

                document.getElementById("inputAlamat").addEventListener("focus",function(){
                    document.getElementById("notifikasiSisaKarakterAlamat").style.visibility = null; //jika focus maka visibility = true
                });

                document.getElementById("inputAlamat").addEventListener("blur",function(){
                    document.getElementById("notifikasiSisaKarakterAlamat").style.visibility = "hidden"; //jika dalam blur maka visibility = hidden
                })

                //JS Input telp
                document.addEventListener('DOMContentLoaded', function (){
                    const inputMaxLengthOnLoad = document.getElementById("inputTelp").maxLength;
                    document.getElementById("sisaKarakterTelp").innerText = inputMaxLengthOnLoad;
                    document.getElementById("notifikasiSisaKarakterTelp").style.visibility = "hidden" //jika tidak dalam onFocus maka visibility = hidden
                });
                document.getElementById("inputTelp").addEventListener("input",function(){
                    const jumlahKarakterDiketik = document.getElementById("inputTelp").value.length; //get jumlah karakter
                    const jumlahKarakterMaksimal = document.getElementById("inputTelp").maxLength //get karakter maksimal
                    console.log(jumlahKarakterDiketik, jumlahKarakterMaksimal)
                    const sisaKarakterUpdate = jumlahKarakterMaksimal - jumlahKarakterDiketik;
                    document.getElementById("sisaKarakterTelp").innerText = sisaKarakterUpdate; //update sisa karakter ke id sisaKarakter
                    if(sisaKarakterUpdate == 0)
                    {
                        document.getElementById("sisaKarakterTelp").innerText = "batas maksimal tercapai!" //update tulisan ke id sisaKarakter
                    }
                    else if(sisaKarakterUpdate <= 5)
                    {
                        document.getElementById("notifikasiSisaKarakterTelp").style.color = "red" //beri warna pada id notifikasiSisaKarakter
                    }
                    else{
                        document.getElementById("notifikasiSisaKarakterTelp").style.color = "black" ////beri warna pada id notifikasiSisaKarakter
                    }
                });

                document.getElementById("inputTelp").addEventListener("focus",function(){
                    document.getElementById("notifikasiSisaKarakterTelp").style.visibility = null; //jika focus maka visibility = true
                });

                document.getElementById("inputTelp").addEventListener("blur",function(){
                    document.getElementById("notifikasiSisaKarakterTelp").style.visibility = "hidden"; //jika dalam blur maka visibility = hidden
                })

                 //JS Input asal sekolah
                 document.addEventListener('DOMContentLoaded', function (){
                    const inputMaxLengthOnLoad = document.getElementById("inputAsal").maxLength;
                    document.getElementById("sisaKarakterAsal").innerText = inputMaxLengthOnLoad;
                    document.getElementById("notifikasiSisaKarakterAsal").style.visibility = "hidden" //jika tidak dalam onFocus maka visibility = hidden
                });
                document.getElementById("inputAsal").addEventListener("input",function(){
                    const jumlahKarakterDiketik = document.getElementById("inputAsal").value.length; //get jumlah karakter
                    const jumlahKarakterMaksimal = document.getElementById("inputAsal").maxLength //get karakter maksimal
                    console.log(jumlahKarakterDiketik, jumlahKarakterMaksimal)
                    const sisaKarakterUpdate = jumlahKarakterMaksimal - jumlahKarakterDiketik;
                    document.getElementById("sisaKarakterAsal").innerText = sisaKarakterUpdate; //update sisa karakter ke id sisaKarakter
                    if(sisaKarakterUpdate == 0)
                    {
                        document.getElementById("sisaKarakterAsal").innerText = "batas maksimal tercapai!" //update tulisan ke id sisaKarakter
                    }
                    else if(sisaKarakterUpdate <= 5)
                    {
                        document.getElementById("notifikasiSisaKarakterAsal").style.color = "red" //beri warna pada id notifikasiSisaKarakter
                    }
                    else{
                        document.getElementById("notifikasiSisaKarakterAsal").style.color = "black" ////beri warna pada id notifikasiSisaKarakter
                    }
                });

                document.getElementById("inputAsal").addEventListener("focus",function(){
                    document.getElementById("notifikasiSisaKarakterAsal").style.visibility = null; //jika focus maka visibility = true
                });

                document.getElementById("inputAsal").addEventListener("blur",function(){
                    document.getElementById("notifikasiSisaKarakterAsal").style.visibility = "hidden"; //jika dalam blur maka visibility = hidden
                })

                </script>
        @endsection

     @endsection