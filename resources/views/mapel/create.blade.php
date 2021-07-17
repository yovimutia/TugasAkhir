@extends('tampilan/index')
@section('konten')

                <div class="card-body" >
                <form action="mapelStore" class="form-horizontal" method="post">  
                {{ @csrf_field() }}          
                                    <h4 class="card-title">Tambah Mata Pelajaran</h4>
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-right control-label col-form-label" for="fname">ID Mata Pelajaran</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" id="idmapel" name="idmapel" type="text" placeholder="ID Mata Pelajaran auto" ReadOnly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-right control-label col-form-label" for="lname">Nama Tentor</label>
                                        <div class="col-sm-9">
                                        <select id="idpegawai" type="text" name="idpegawai" select id="inlineFormInput"  class="form-control">
                                        @foreach ($pegawai as $pegawai)
                                        
                                        <option value="{{ $pegawai->ID_PEGAWAI }}">
                                        {{ $pegawai->NAMA_PEGAWAI }}
                                        </option>
                                       
                                        @endforeach
                                        </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-right control-label col-form-label" for="lname">Mata Pelajaran</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" id="namamapel" name="namamapel" type="text" placeholder="masukkan Mata Pelajaran" required="">
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
                             </div>

     @endsection