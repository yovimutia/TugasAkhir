@extends('tampilan/index')
@section('konten')

                <div class="card-body" >
                <form action="nilaiStore" class="form-horizontal" method="post"> 
                {{ @csrf_field() }}         
                <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                        

                                <h4 class="card-title">Input Nilai Siswa</h4>
                                <h6 class="card-subtitle"> <code></code></h6>
                                <div class="table-responsive">
                                    <table class="table user-table no-wrap">
                                        <thead>
                                            <tr>
                                                <th class="border-top-0">Kelas
                                                <div class="col-sm-9">
                                        <select id="idkelas" type="text" name="idkelas" select id="inlineFormInput" placeholder="pilih"  class="form-control">
                                        @foreach ($kelas as $kelas)
                                        
                                        <option value="{{ $kelas->ID_KELAS }}">
                                        {{ $kelas->NAMA_KELAS }}
                                        </option>
                                       
                                        @endforeach
                                        </select>
                                        </div>
                                        </th>
                                                <th class="border-top-0">Mata Pelajaran
                                                <div class="col-sm-9">
                                        <select id="idmapel" type="text" name="idmapel" select id="inlineFormInput"  class="form-control">
                                        @foreach ($matapelajaran as $matapelajaran)
                                        
                                        <option value="{{ $matapelajaran->ID_MAPEL }}">
                                        {{ $matapelajaran->NAMA_MAPEL }}
                                        </option>
                                       
                                        @endforeach
                                        </select>
                                         </div>
                                        </th>
                                                <th class="border-top-0">Jenis Ujian
                                                <div class="col-sm-9">
                                        <select id="idujian" type="text" name="idujian" select id="inlineFormInput"  class="form-control">
                                        @foreach ($jenisujian as $jenisujian)
                                        
                                        <option value="{{ $jenisujian->ID_UJIAN }}">
                                        {{ $jenisujian->NAMA_UJIAN }}
                                        </option>
                                       
                                        @endforeach
                                        </select>
                                        </div>
                                
                                        </div>
                                        </th>
                                            </tr>
                                        </thead>
                                       
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                             

                            </form>
                             </div>

     @endsection