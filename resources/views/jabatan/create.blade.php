@extends('tampilan/index')
@section('konten')

                <div class="card-body" >
                <form action="jabatanStore" class="form-horizontal" method="post"> 
                {{ csrf_field() }}           
                                    <h4 class="card-title">Tambah Data Jabatan</h4>
                                    
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-right control-label col-form-label" for="fname">ID Jabatan</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" id="idjabatan" name="idjabatan" type="text" placeholder="ID jabatan auto" ReadOnly>
                                            
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-right control-label col-form-label" for="fname">Nama Jabatan</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" id="inputNamaPanggilan" name="namajabatan" type="text" placeholder="Masukkan Nama jabatan" maxlength="20" required="">
                                            <label id="notifikasiSisaKarakter">Sisa karakter : <span id="sisaKarakter"></span></label>
                                        </div>
                                    </div>
                                    
                                    <div class="text-right upgrade-btn">
                                                <a href="jabatanindex"><button type="submit" class="btn btn-success d-none d-md-inline-block text-white">Save</button>
                                                </a>

                                                <a href="jabatanindex">
                                                <button class="btn btn-danger" type="button" style="padding: 5px" >Cancel</button>
                                                </a>
                                    </div>           
                                   

                            </form>
                             </div>

                <script>
                document.addEventListener('DOMContentLoaded', function (){
                    const inputMaxLengthOnLoad = document.getElementById("inputNamaPanggilan").maxLength;
                    document.getElementById("sisaKarakter").innerText = inputMaxLengthOnLoad;
                    document.getElementById("notifikasiSisaKarakter").style.visibility = "hidden" //jika tidak dalam onFocus maka visibility = hidden
                });
                document.getElementById("inputNamaPanggilan").addEventListener("input",function(){
                    const jumlahKarakterDiketik = document.getElementById("inputNamaPanggilan").value.length; //get jumlah karakter
                    const jumlahKarakterMaksimal = document.getElementById("inputNamaPanggilan").maxLength //get karakter maksimal
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

                document.getElementById("inputNamaPanggilan").addEventListener("focus",function(){
                    document.getElementById("notifikasiSisaKarakter").style.visibility = null; //jika focus maka visibility = true
                });
                document.getElementById("inputNamaPanggilan").addEventListener("blur",function(){
                    document.getElementById("notifikasiSisaKarakter").style.visibility = "hidden"; //jika dalam blur maka visibility = hidden
                })

                </script>

     @endsection