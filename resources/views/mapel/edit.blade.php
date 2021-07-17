@extends('tampilan/index')
@section('konten')

                <div class="card-body" >
                @foreach ($matapelajaran as $matapelajaran)
                <form action="mapelUpdate" class="form-horizontal" method="post">  
                {{ @csrf_field() }}          
                                    <h4 class="card-title">Tambah Mata Pelajaran</h4>
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-right control-label col-form-label" for="fname">ID Mata Pelajaran</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" value="{{ $matapelajaran->ID_MAPEL }}" id="idmapel" name="idmapel" type="text" placeholder="masukkan ID Mata Pelajaran" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-right control-label col-form-label" for="lname">Mata Pelajaran</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" value="{{ $matapelajaran->NAMA_MAPEL }}" id="namamapel" name="namamapel" type="text" placeholder="masukkan Mata Pelajaran">
                                        </div>
                                    </div>

                                    <div class="text-right upgrade-btn">
                                                <a href="mapelindex"><button type="submit" class="btn btn-success d-none d-md-inline-block text-white">Save</button>
                                                </a>

                                                <a href="mapelindex">
                                                <button class="btn btn-danger" type="button" style="padding: 5px" >Cancel</button>
                                                </a>
                                    </div>           
                                   

                            </form>
                            @endforeach
                             </div>

     @endsection