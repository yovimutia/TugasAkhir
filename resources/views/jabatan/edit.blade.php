@extends('tampilan/index')
@section('konten')

                <div class="card-body" >
                @foreach ($jabatan as $jabatan)
                <form action="jabatanUpdate" class="form-horizontal" method="post"> 
                {{ @csrf_field() }}           
                                    <h4 class="card-title">Edit Jabatan</h4>
                                    
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-right control-label col-form-label" for="fname">ID Jabatan</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" ReadOnly value="{{ $jabatan->ID_JABATAN }}" id="idjabatan" name="idjabatan" type="text" placeholder="masukkan Nama jabatan">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-right control-label col-form-label" for="lname">Nama Jabatan</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" value="{{ $jabatan->NAMA_JABATAN }}" id="namajabatan" name="namajabatan" type="text" placeholder="masukkan Nama jabatan">
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
                            @endforeach
                             </div>

     @endsection