@extends('tampilan/index')
@section('konten')

                <div class="card-body" >
                <form action="kelasStore" class="form-horizontal" method="post"> 
                {{ csrf_field() }}           
                                    <h4 class="card-title">Tambah Data Kelas</h4>
                                    
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-right control-label col-form-label" for="fname">ID Kelas</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" id="idkelas" name="idkelas" type="text" placeholder="ID Kelas auto" ReadOnly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-right control-label col-form-label" for="lname">Nama Kelas</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" id="namakelas" name="namakelas" type="text" placeholder="masukkan Nama Kelas" required="">
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
                             </div>

     @endsection