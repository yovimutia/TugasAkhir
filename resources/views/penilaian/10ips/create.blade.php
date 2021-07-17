@extends('tampilan/index')
@section('konten')

                <div class="card-body" >
                      
                <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                        
                                <!-- Notifikasi -->
                                @if ($message = Session::get('error'))
                                <div class="alert alert-danger alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>	
                                    <strong>{{ $message }}</strong>
                                </div>
                                @endif
                                @if ($message = Session::get('success'))
                                <div class="alert alert-success alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>	
                                    <strong>{{ $message }}</strong>
                                </div>
                                @endif
                                <!-- End Notifikasi -->
                                <h4 class="card-title">Input Nilai Siswa</h4>
                                <h6 class="card-subtitle"> <code></code></h6>

                <div class="x_panel">
                <div class="x_content">
                @if($message = Session::get('fsuccess'))
               <div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
                   <span class="badge badge-pill badge-primary">Success</span>
                   {{ $message }}
                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span aria-hidden="true">×</span>
                   </button>
               </div>
               @endif
               
               @if(count($errors) > 0)
               <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                   <span class="badge badge-pill badge-danger">Error</span>
                   @foreach($errors->all() as $error)
                       {{ $error }}
                   @endforeach
                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span aria-hidden="true">×</span>
                   </button>
               </div>
               @endif

               @if($message = Session::get('ferror'))
               <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                   <span class="badge badge-pill badge-danger">Error</span>
                   {{ $message }}
                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span aria-hidden="true">×</span>
                   </button>
               </div>
               @endif

               @if($message = Session::get('ferror2'))
               <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                   <span class="badge badge-pill badge-danger">Error</span>
                   {{ $message }}
                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span aria-hidden="true">×</span>
                   </button>
               </div>
               @endif

               <div class="text-center">
               <button type="button" class="btn btn-success d-none d-md-inline-block text-white" data-toggle="modal" data-target="#importnilai">
                <i class="mr-3  fas fa-plus" aria-hidden="true"></i>Import Nilai
               </button></div> <br><br> 

               <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <form method="post" action="importexcel4" enctype="multipart/form-data">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                                                </div>
                                                <div class="modal-body">
                        
                                                    {{ csrf_field() }}
                        
                                                    <label>Pilih file excel</label>
                                                    <div class="form-group">
                                                        <input type="file" name="file_excel" required="required">
                                                    </div>
                        
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Import</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>


               <!-- Import Excel -->
               <!-- <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                   <div class="modal-dialog" role="document">
                       <form method="post" action="importexcel4" enctype="multipart/form-data">
                           <div class="modal-content">
                               <div class="modal-header">
                                   <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                               </div>
                               <div class="modal-body">
       
                                   {{ csrf_field() }}
       
                                   <label>Pilih file excel</label>
                                   <div class="form-group">
                                       <input type="file" name="file_excel" required="required">
                                   </div>
       
                               </div>
                               <div class="modal-footer">
                                   <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                   <button type="submit" class="btn btn-primary">Import</button>
                               </div>
                           </div>
                       </form>
                   </div>
               </div> -->

               
                    <form action="penilaianStore4" class="form-horizontal" method="post"> 
                        {{ @csrf_field() }}   
                                <div class="table-responsive">
                                    <table class="table user-table no-wrap">
                                        <thead>
                                            <tr>
                                                <th class="border-top-0">Kelas
                                                <div class="col-sm-9">
                                                <select id="idkelas" type="text"  name="idkelas" select id="inlineFormInput" class="form-control" > 
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
                                                </th>

                                                <th class="border-top-0">Tanggal Input
                                                <div class="col-sm-9">
                                                <input id="idujian" type="date" name="tglinput" select id="tglinput"  class="form-control">
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
                                                
                                                <th class="border-top-0">Indeks Nilai</th>
                                                <th class="border-top-0">Bobot Nilai</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                       
                                        @foreach ($siswa as $siswa)
                                            <tr>
                                                <td><Input id="noinduk" value="{{ $siswa->NO_INDUK }}" ReadOnly type="text"  name="noinduk[]"></td>
                                                <td>{{ $siswa->NAMA_SISWA }}</td>
                                                
                                                <td><select id="kodenilai" type="text" name="kodenilai[]" select id="inlineFormInput"  class="form-control">
                                                @foreach ($skalanilai as $skalanilaiku)
                                        
                                                <option value="{{ $skalanilaiku->KODE_NILAI }}">
                                                {{ $skalanilaiku->KODE_NILAI }}
                                                </option>
                                       
                                                @endforeach
                                                </select></td>
                                                <td><Input id="jumlahnilai" type="number"  name="jumlahnilai[]"></td>
                                                
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
                    <a href="penilaianindex4"><button type="submit" class="btn btn-success d-none d-md-inline-block text-white">Submit</button>
                    </a>
                </div>              

                            </form>
                             </div>

                             <!-- Import Excel -->
               
               <!-- Modal Import-->
            <div class="modal fade" id="importnilai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                              <form action="{{route('import')}}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                
                                <div class="form-group">
                                  <input type="hidden" name="id_nilai">
                                  <input type="file" class="form-control-file" name="data_nilai"> 
                                  <small class="text-form text-muted">Please upload only XLS file.</small>
                                </div>
                          </div>
                          <div class="modal-footer">
                              <input type="submit" class="btn btn-primary" value="Import"></input>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- End Modal Import-->

     @endsection