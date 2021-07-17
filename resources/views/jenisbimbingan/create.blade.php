@extends('tampilan/index')
@section('konten')

                <div class="card-body" >
                <form action="bimbinganStore" class="form-horizontal" method="post"> 
                {{ csrf_field() }}           
                                    <h4 class="card-title">Tambah Data Bimbingan</h4>
                                    
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-right control-label col-form-label" for="fname">ID Bimbingan</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" id="idbimbingan" name="idbimbingan" type="text" placeholder="ID Bimbingan auto" ReadOnly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-right control-label col-form-label" for="lname">Nama Bimbingan</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" id="inputNamaBim" name="namabimbingan" type="text" placeholder="masukkan Nama Bimbingan" maxlength="20" required="">
                                            <label id="notifikasiSisaKarakterNamaBim">Sisa karakter : <span id="sisaKarakterNamaBim"></span></label>
                                        </div>
                                    </div>

                                    <div class="text-right upgrade-btn">
                                                <a href="bimbinganindex"><button type="submit" class="btn btn-success d-none d-md-inline-block text-white">Save</button>
                                                </a>

                                                <a href="bimbinganindex">
                                                <button class="btn btn-danger" type="button" style="padding: 5px" >Cancel</button>
                                                </a>
                                    </div>           
                                   

                            </form>
                             </div>

            @section('script')
                <script>
                document.addEventListener('DOMContentLoaded', function (){
                    const inputMaxLengthOnLoad = document.getElementById("inputNamaBim").maxLength;
                    document.getElementById("sisaKarakterNamaBim").innerText = inputMaxLengthOnLoad;
                    document.getElementById("notifikasiSisaKarakterNamaBim").style.visibility = "hidden" //jika tidak dalam onFocus maka visibility = hidden
                });
                document.getElementById("inputNamaBim").addEventListener("input",function(){
                    const jumlahKarakterDiketik = document.getElementById("inputNamaBim").value.length; //get jumlah karakter
                    const jumlahKarakterMaksimal = document.getElementById("inputNamaBim").maxLength //get karakter maksimal
                    console.log(jumlahKarakterDiketik, jumlahKarakterMaksimal)
                    const sisaKarakterUpdate = jumlahKarakterMaksimal - jumlahKarakterDiketik;
                    document.getElementById("sisaKarakterNamaBim").innerText = sisaKarakterUpdate; //update sisa karakter ke id sisaKarakter
                    if(sisaKarakterUpdate == 0)
                    {
                        document.getElementById("sisaKarakterNamaBim").innerText = "batas maksimal tercapai!" //update tulisan ke id sisaKarakter
                    }
                    else if(sisaKarakterUpdate <= 5)
                    {
                        document.getElementById("notifikasiSisaKarakterNamaBim").style.color = "red" //beri warna pada id notifikasiSisaKarakter
                    }
                    else{
                        document.getElementById("notifikasiSisaKarakterNamaBim").style.color = "black" ////beri warna pada id notifikasiSisaKarakter
                    }
                });

                document.getElementById("inputNamaBim").addEventListener("focus",function(){
                    document.getElementById("notifikasiSisaKarakterNamaBim").style.visibility = null; //jika focus maka visibility = true
                });

                document.getElementById("inpuNamaBim").addEventListener("blur",function(){
                    document.getElementById("notifikasiSisaKarakterNamaBim").style.visibility = "hidden"; //jika dalam blur maka visibility = hidden
                })

            </script>
         @endsection

     @endsection