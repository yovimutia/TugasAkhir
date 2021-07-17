@extends('tampilan/index')
@section('konten')

                <div class="card-body" >
                @foreach ($bimbingan as $bimbingan)
                <form action="bimbinganUpdate" class="form-horizontal" method="post"> 
                {{ csrf_field() }}           
                                    <h4 class="card-title">Tambah Data Bimbingan</h4>
                                    
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-right control-label col-form-label" for="fname">ID Bimbingan</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" ReadOnly value="{{ $bimbingan->ID_BIMBINGAN }}" id="idbimbingan" name="idbimbingan" type="text" placeholder="masukkan ID Bimbingan">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-right control-label col-form-label" for="lname">Nama Bimbingan</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" value="{{ $bimbingan->NAMA_BIMBINGAN }}" id="namabimbingan" name="namabimbingan" type="text" placeholder="masukkan Nama Bimbingan">
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
                            @endforeach
                             </div>

     @endsection