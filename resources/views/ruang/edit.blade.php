@extends('tampilan/index')
@section('konten')

                <div class="card-body" >
                @foreach ($ruang as $ruang)
                <form action="ruangUpdate" class="form-horizontal" method="post"> 
                {{ @csrf_field() }}           
                                    <h4 class="card-title">Edit Data Kelas</h4>
                                    
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-right control-label col-form-label" for="fname">ID Ruang</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" value="{{ $ruang->ID_RUANG }}" id="idruang" ReadOnly name="idruang" type="text" placeholder="masukkan indeks nilai">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-right control-label col-form-label" for="lname">Nama Ruang</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" value="{{ $ruang->NAMA_RUANG }}" id="namaruang" name="namaruang" type="text" placeholder="masukkan Nama Kelas">
                                        </div>
                                    </div>

                                    <div class="text-right upgrade-btn">
                                                <a href="ruangindex"><button type="submit" class="btn btn-success d-none d-md-inline-block text-white">Save</button>
                                                </a>

                                                <a href="ruangindex">
                                                <button class="btn btn-danger" type="button" style="padding: 5px" >Cancel</button>
                                                </a>
                                    </div>           
                                   

                            </form>
                            @endforeach
                             </div>

     @endsection