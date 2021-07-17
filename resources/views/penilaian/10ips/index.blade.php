@extends('tampilan/index')
@section('konten')

<div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- column -->
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body"> 


                    <div class="row">
                    <!-- Column -->
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-left">
                                <form action="search4" method="post">
                            
                                    @csrf
                                    <select id="id_mapel" name="id_mapel" required>
                                        <option disabled selected value="">-Pilih Mapel-</option>
                                        @foreach ($mapel as $m)
                                        <option value="{{ $m->ID_MAPEL }}">{{ $m->NAMA_MAPEL }}</option>
                                        @endforeach
                                
                                    </select>
                                    <select id="id_ujian" name="id_ujian"  required>
                                        <option disabled selected value="">-Pilih Ujian-</option>
                                        @foreach ($jenis_ujian as $ujian)
                                        <option value="{{ $ujian->ID_UJIAN }}">{{ $ujian->NAMA_UJIAN }}</option>
                                        @endforeach
                                
                                    </select>
                                    
                                    <button type="submit" class="btn btn-success d-none d-md-inline-block text-white">Pilih</button>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-right">
                                
                                    @if(\Session::has('tentor'))
                                        <a href="penilaiancreate4"
                                            class="btn btn-success d-none d-md-inline-block text-white" 
                                            ><i class="mr-3  fas fa-plus"
                                                aria-hidden="true"></i>input Nilai Siswa</a>
                                    @else
                                    <a href="penilaiancreate4"
                                            class="btn btn-success d-none d-md-inline-block text-white disabled" 
                                            ><i class="mr-3  fas fa-plus"
                                                aria-hidden="true"></i>input Nilai Siswa</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                
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

                        <h4 class="card-title">Data Nilai Siswa</h4>
                        <h6 class="card-subtitle"> <code></code></h6>
                        <div class="table-responsive">
                        <table class="table user-table no-wrap">
                                        <thead>
                                            <tr>
                                                <th class="border-top-0">#</th>
                                                <th class="border-top-0">No Induk</th>
                                                <th class="border-top-0">Nama</th>
                                                <th class="border-top-0">Kelas</th>
                                                <th class="border-top-0">Mata Pelajaran</th>
                                                <th class="border-top-0">Indeks Nilai</th>
                                                <th class="border-top-0">Bobot Nilai</th>
                                                <th class="border-top-0"> Aksi </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @php $no =1; @endphp
                                        @foreach ($siswaku as $s)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $s->NO_INDUK }}</td>
                                                <td>{{ $s->NAMA_SISWA }}</td>
                                                <td>{{ $s->NAMA_KELAS }}</td>
                                                <td>{{ $s->NAMA_MAPEL }}</td>
                                                <td>{{ $s->KODE_NILAI }}</td>
                                                <td>{{ $s->JUMLAH_NILAI }}</td>
                                            </tr>

                                            @endforeach
                                        </tbody>
                                    </table>
                                    @if(\Session::has('admin'))
                                    <a href="laporan_index4">
                                        <button type="button" class="btn btn-primary btn-pulse">
                                            <i class="ti-printer mr-2" ></i> Laporan
                                        </button>
                                        </a>
                                    @else
                                    <a href="laporan_index4">
                                        <button type="button" class="btn btn-primary btn-pulse">
                                            <i class="ti-printer mr-2" ></i> Laporan
                                        </button>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>

            <!-- <script>
            $(document).ready(function(){
                $('#id_mapel').on('change',function(){
                    var mapel = $(this).val();
                    console.log(mapel)
                    $.ajax({
                        type:'post',
                        url: 'mapel',
                        data: {
                            mapel: mapel
                        }
                        dataType: 'json',
                        success: function(result){
                            if(result.success === true){
                                $('#btnpilih').val(result.mapel)
                            }
                        }
                    });
                    
                });
                
            });
            </script> -->
                   @endsection