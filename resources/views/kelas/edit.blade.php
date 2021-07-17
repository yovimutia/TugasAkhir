@extends('tampilan/index')
@section('konten')

                <div class="card-body" >
                @foreach ($kelas as $kelas)
                <form action="kelasUpdate" class="form-horizontal" method="post"> 
                {{ @csrf_field() }}           
                                    <h4 class="card-title">Edit Data Kelas</h4>
                                    
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-right control-label col-form-label" for="fname">ID Kelas</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" ReadOnly value="{{ $kelas->ID_KELAS }}" id="idkelas" name="idkelas" type="text" placeholder="auto">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-right control-label col-form-label" for="lname">Nama Kelas</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" value="{{ $kelas->NAMA_KELAS }}" id="namakelas" name="namakelas" type="text" placeholder="masukkan Nama Kelas">
                                        </div>
                                    </div>

                                    <div class="text-right upgrade-btn">
                                                <a href="kelasindex"><button type="submit" class="btn btn-success d-none d-md-inline-block text-white">Save</button>
                                                </a>

                                                <a href="kelasindex">
                                                <button class="btn btn-danger" type="button" style="padding: 5px" >Cancel</button>
                                                </a>
                                    </div>           
                                   

                            </form>
                            @endforeach
                             </div>

     @endsection