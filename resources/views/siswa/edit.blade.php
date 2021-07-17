@extends('tampilan/index')
@section('konten')

                <div class="card-body" >
                @foreach ($siswa as $siswa)
                <form action="siswaUpdate" class="form-horizontal" method="post"> 
                {{ @csrf_field() }}         
                                    <h4 class="card-title">Edit Data Siswa</h4>
                                    
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-right control-label col-form-label" for="fname">No Induk</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" ReadOnly value="{{ $siswa->NO_INDUK }}" id="noinduk" name="noinduk" type="text" placeholder="masukkan No Induk">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-right control-label col-form-label" for="lname">Nama Bimbingan</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="idbimbingan" name="idbimbingan">
                                                @foreach($bimbingan as $b)
                                                <option value="{{ $b->ID_BIMBINGAN }}">{{ $b->NAMA_BIMBINGAN }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-right control-label col-form-label" for="fname">ID Kelas</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="idkelas" name="idkelas">
                                                @foreach($kelas as $k)
                                                <option value="{{ $k->ID_KELAS }}">{{ $k->NAMA_KELAS }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-right control-label col-form-label" for="fname">Nama Siswa</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" value="{{ $siswa->NAMA_SISWA }}" id="namasiswa" name="namasiswa" type="text" placeholder="masukkan Nama Siswa">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-right control-label col-form-label" for="fname">Alamat</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" value="{{ $siswa->ALAMAT_SISWA }}" id="alamatsiswa" name="alamatsiswa" type="text" placeholder="masukkan Alamat Siswa">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-right control-label col-form-label" for="fname">Tanggal Lahir</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" value="{{ $siswa->TGL_LAHIR_SISWA }}" id="tgllahirsiswa" name="tgllahirsiswa" type="text" placeholder="masukkan Tanggal Lahir">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-right control-label col-form-label" for="fname">Jenis Kelamin</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" value="{{ $siswa->JK_SISWA }}" id="jksiswa" name="jksiswa" type="text" placeholder="masukkan Jenis Kelamin">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-right control-label col-form-label" for="fname">Telepon</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" value="{{ $siswa->TELP_SISWA }}" id="telpsiswa" name="telpsiswa" type="text" placeholder="masukkan Telepon">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-right control-label col-form-label" for="fname">Asal Sekolah</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" value="{{ $siswa->ASAL_SEKOLAH }}" id="asalsekolah" name="asalsekolah" type="text" placeholder="masukkan Asal Sekolah">
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
                            @endforeach
                             </div>

     @endsection