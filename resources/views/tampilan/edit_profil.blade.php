@extends('tampilan/index')
@section('konten')

                        <!-- Notifikasi -->
                        @if ($message = Session::get('error'))
                        <div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>	
                            <strong>{{ $message }}</strong>
                        </div>
                        @endif
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>	
                            <strong>{{ $message }}</strong>
                        </div>
                        @endif
                        <!-- End Notifikasi -->
                <div class="card-body" >
                @foreach ($pegawai as $pegawai)
                <form action="edit_profileUpdate" class="form-horizontal" method="post"> 
                {{ @csrf_field() }}         
                                    <h4 class="card-title">Edit Profile</h4>
                                    
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-right control-label col-form-label" for="fname">ID Pegawai</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" ReadOnly value="{{ $pegawai->ID_PEGAWAI }}" id="idpegawai" name="idpegawai" type="text" placeholder="masukkan ID Pegawai">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-right control-label col-form-label" for="fname">Email</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" value="{{ $pegawai->EMAIL_PEGAWAI }}" id="emailpegawai" name="emailpegawai" type="text" placeholder="masukkan Email">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-right control-label col-form-label" for="fname">Password Lama</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" id="passwordlamapegawai" name="passwordlamapegawai" type="password" placeholder="masukkan Password Lama">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-right control-label col-form-label" for="fname">Password Baru</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" id="passwordbarupegawai" name="passwordbarupegawai" type="password" placeholder="masukkan Password Baru">
                                        </div>
                                    </div>

                                    <div class="text-right upgrade-btn">
                                                <a href="edit_profile"><button type="submit" class="btn btn-success d-none d-md-inline-block text-white">Save</button>
                                                </a>

                                                <a href="edit_profile">
                                                <button class="btn btn-danger" type="button" style="padding: 5px" >Cancel</button>
                                                </a>
                                    </div>           
                                   

                            </form>
                            @endforeach
                             </div>

     @endsection