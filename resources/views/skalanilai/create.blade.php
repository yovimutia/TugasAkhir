@extends('tampilan/index')
@section('konten')

                <div class="card-body" >
                <form action="skalaStore" class="form-horizontal" method="post"> 
                {{ csrf_field() }}           
                                    <h4 class="card-title">Tambah Data Skala Nilai</h4>
                                    
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-right control-label col-form-label" for="fname">Indeks Nilai</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" id="kodenilai" name="kodenilai" type="text" placeholder="masukkan indeks nilai" required="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-right control-label col-form-label" for="lname">Range Nilai</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" id="rangenilai" name="rangenilai" type="text" placeholder="Range Nilai" required="">
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
                             </div>

     @endsection