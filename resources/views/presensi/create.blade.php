@extends('tampilan/index')
@section('konten')

                <div class="card-body" >
                
                <form action="presensiStore" class="form-horizontal" method="post"> 
                {{ @csrf_field() }}         
                <div class="col-sm-12">
                
                        <div class="card">
                            <div class="card-body">
                        

                                <h4 class="card-title">Input Presensi Siswa</h4>
                                <h6 class="card-subtitle"> <code></code></h6>
                                
                                <div class="table-responsive">
                                    <table class="table user-table no-wrap">
                                    
                                        <thead>
                                       
                                            <tr>
                                            <th class="border-top-0">Tanggal Absen
                                                <div class="col-sm-9">
                                                <input id="tglpresensi" type="text" value="{{ $data->TGL_LES }}" ReadOnly name="tglpresensi" select id="tglpresensi"  class="form-control">
                                                </div>
                                                </th>

                                                <th class="border-top-0">Tentor
                                                <div class="col-sm-9">
                                                <Input id="idpegawai"  type="text" value="{{ $data->NAMA_PEGAWAI }}" ReadOnly name="idpegawai" select id="inlineFormInput"  class="form-control">
                                                </div>
                                                </th>

                                                <th class="border-top-0">Kelas
                                                <div class="col-sm-9">
                                                <Input id="idkelas" type="text" value="{{ $data->NAMA_KELAS }}" ReadOnly name="idkelas" select id="inlineFormInput"  class="form-control">
                                                </div>
                                                </th>

                                                <th class="border-top-0">Mata Pelajaran
                                                <div class="col-sm-9">
                                                <Input id="idmapel" type="text" value="{{ $data->NAMA_MAPEL }}" ReadOnly name="idmapel" select id="inlineFormInput"  class="form-control">
                                                </div>
                                                </th>   
                                            </tr>
                                         
                                        </thead>
                                         
                                    </table> 
                                </div>  
                                                            
                            </div>
                        </div>
                        
                    <div class="table-responsive">
                        <div class="card">
                            <div class="card-body">
                              
                                <h6 class="card-subtitle"> <code></code></h6>
                                    <table class="table user-table no-wrap">
                                        <thead>
                                            <tr>
                                                <th class="border-top-0">No Induk</th>
                                                <th class="border-top-0">Nama</th>                                                
                                                <th class="border-top-0">Status Absen</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($presensi as $p)
                                            <tr>
                                                <input type="hidden" name="id_jadwal" value="{{$p->id_jadwal}}"></input>
                                                <td><Input id="noinduk" value="{{ $p->NO_INDUK }}" ReadOnly type="text"  name="noinduk[]"></td>
                                                <td>{{ $p->NAMA_SISWA }}</td>
                                                <td><p><input type='checkbox' id="statuspresensi" name='statuspresensi[]' value="{{ $p->NO_INDUK }}" />  Hadir</p></td>
                                                
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div> 
                        </div>  
                    </div>
                </div>
                <div class="text-right upgrade-btn">
                    <a href="presensiindex"><button type="submit" class="btn btn-success d-none d-md-inline-block text-white">Submit</button>
                    </a>
                </div>              

                            </form>
                            
                             </div>

     @endsection