@extends('tampilan/index')
@section('konten')

                <div class="card-body" >
                <form action="jenisujianStore" class="form-horizontal" method="post"> 
                {{ csrf_field() }}           
                                    <h4 class="card-title">Tambah Data Jenis Ujian</h4>
                                    
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-right control-label col-form-label" for="fname">ID Ujian</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" id="idujian" name="idujian" type="text" placeholder="ID ujian auto" ReadOnly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-right control-label col-form-label" for="lname">Nama Ujian</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" id="namaujian" name="namaujian" type="text" placeholder="masukkan Nama ujian" required="">
                                        </div>
                                    </div>

                                    <div class="text-right upgrade-btn">
                                                <a href="jenisujianindex"><button type="submit" class="btn btn-success d-none d-md-inline-block text-white">Save</button>
                                                </a>

                                                <a href="jenisujianindex">
                                                <button class="btn btn-danger" type="button" style="padding: 5px" >Cancel</button>
                                                </a>
                                    </div>           
                                   

                            </form>
                             </div>

     @endsection