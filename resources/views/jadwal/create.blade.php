@extends('tampilan/index')
@section('konten')

                <div class="card-body" >
                <form action="jadwalStore" class="form-horizontal" method="post"> 
                {{ @csrf_field() }}         
                                    <h4 class="card-title">Tambah Jadwal</h4>
                                    
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-right control-label col-form-label" for="fname">Tgl Les</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" id="tglles" name="tglles" type="date" placeholder="masukkan Tanggal Les" required="">  
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-right control-label col-form-label" for="fname" required="">Jam Les</label>
                                        <div class="col-sm-9">
                                            <div class="custom-control custom-radio mb-3">
                                                <input name="jamles" class="custom-control-input" id="customRadio5" value="14.15-15.00" type="radio" >
                                                <label class="custom-control-label" for="customRadio5">14.15-15.00</label>
                                              </div>
                                              <div class="custom-control custom-radio mb-3">
                                                <input name="jamles" class="custom-control-input" id="customRadio6" value="15.10-15.55"  type="radio">
                                                <label class="custom-control-label" for="customRadio6">15.10-15.55</label>
                                              </div>
                                              <div class="custom-control custom-radio mb-3">
                                                <input name="jamles" class="custom-control-input" id="customRadio6" value="16.00-16.50" type="radio">
                                                <label class="custom-control-label" for="customRadio6">16.00-16.50</label>
                                              </div>
                                              <div class="custom-control custom-radio mb-3">
                                                <input name="jamles" class="custom-control-input" id="customRadio6" value="17.00-17.50" type="radio">
                                                <label class="custom-control-label" for="customRadio6">17.00-17.50</label>
                                              </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-right control-label col-form-label" for="lname">Kelas</label>
                                        <div class="col-sm-9">
                                        <select id="idkelas" type="text" name="idkelas" select id="inlineFormInput"  class="form-control">
                                        @foreach ($kelas as $kelas)
                                        
                                        <option value="{{ $kelas->ID_KELAS }}">
                                        {{ $kelas->NAMA_KELAS }}
                                        </option>
                                        
                                        @endforeach
                                        </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-right control-label col-form-label" for="lname">Mata Pelajaran</label>
                                        <div class="col-sm-9">
                                        <select id="idmapel" type="text" name="idmapel" select id="inlineFormInput"  class="form-control">
                                        @foreach ($matapelajaran as $matapelajaran)
                                        
                                        <option value="{{ $matapelajaran->ID_MAPEL }}">
                                        {{ $matapelajaran->NAMA_MAPEL }}
                                        </option>
                                       
                                        @endforeach
                                        </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-right control-label col-form-label" for="lname">Ruangan</label>
                                        <div class="col-sm-9">
                                        <select id="idruang" type="text" name="idruang" select id="inlineFormInput"  class="form-control">
                                       @foreach($ruang as $ruang)
                                            <option value="{{ $ruang->ID_RUANG }}">
                                            {{$ruang->NAMA_RUANG }}
                                            </option>
                                        @endforeach    
                                         </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-right control-label col-form-label" for="lname">Tentor</label>
                                        <div class="col-sm-9">
                                        <select id="idpegawai" type="text" name="idpegawai" select id="inlineFormInput"  class="form-control">
                                        @foreach ($pegawai as $pegawai)
                                        @if($pegawai->STATUS_PEGAWAI == 0)
                                        <option value="{{ $pegawai->ID_PEGAWAI }}">
                                        {{ $pegawai->NAMA_PEGAWAI }}
                                        </option>
                                        @else
                                        <option value="{{ $pegawai->ID_PEGAWAI }}" disabled>
                                        {{ $pegawai->NAMA_PEGAWAI }} - Non Active
                                        </option>
                                        @endif
                                        @endforeach
                                        </select>
                                        </div>
                                    </div>
                                    
                                    

                                    <div class="text-right upgrade-btn">
                                                <a href="jadwalindex"><button type="submit" class="btn btn-success d-none d-md-inline-block text-white">Save</button>
                                                </a>

                                                <a href="jadwalindex">
                                                <button class="btn btn-danger" type="button" style="padding: 5px" >Cancel</button>
                                                </a>
                                    </div>           
                                   

                            </form>
                             </div>

     @endsection