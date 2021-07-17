@extends('tampilan/index')
@section('konten')

                <div class="card-body" >
                @foreach ($skalanilai as $skalanilai)
                <form action="skalaUpdate" class="form-horizontal" method="post"> 
                {{ @csrf_field() }}           
                                    <h4 class="card-title">Edit Data Kelas</h4>
                                    
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-right control-label col-form-label" for="fname">Indeks Nilai</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" value="{{ $skalanilai->KODE_NILAI }}" id="kodenilai" name="kodenilai" type="text" placeholder="masukkan indeks nilai">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-right control-label col-form-label" for="lname">Range Nilai</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" value="{{ $skalanilai->RANGE_NILAI }}" id="rangenilai" name="rangenilai" type="text" placeholder="masukkan Nama Kelas">
                                        </div>
                                    </div>

                                    <div class="text-right upgrade-btn">
                                                <a href="skalaindex"><button type="submit" class="btn btn-success d-none d-md-inline-block text-white">Save</button>
                                                </a>

                                                <a href="skalaindex">
                                                <button class="btn btn-danger" type="button" style="padding: 5px" >Cancel</button>
                                                </a>
                                    </div>           
                                   

                            </form>
                            @endforeach
                             </div>

     @endsection