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
                                                <th class="border-top-0">Mata Pelajaran</th>
                                                <th class="border-top-0">Indeks Nilai</th>
                                                <th class="border-top-0">Bobot Nilai</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @php $no =1; @endphp
                                        @foreach ($laporan as $l)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $l->NO_INDUK }}</td>
                                                <td>{{ $l->NAMA_SISWA }}</td>
                                                <td>{{ $l->NAMA_MAPEL }}</td>
                                                <td>{{ $l->KODE_NILAI }}</td>
                                                <td>{{ $l->JUMLAH_NILAI }}</td>
                                            </tr>

                                            @endforeach
                                        </tbody>
                                    </table>
                                    @if(\Session::has('admin'))
                                    <form action="cetak_pdf" method="post" target="_blank">
                                    @csrf
                                        <div class="col-sm-9">
                                            <input id="no_induk" type="hidden" name="no_induk" select id="no_induk" value="{{ $no_induk }}"  class="form-control">
                                        </div>
                                        <div class="col-sm-9">
                                            <input id="id_ujian" type="hidden" name="id_ujian" select id="id_ujian" value="{{ $id_ujian }}"  class="form-control">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-pulse" >
                                            <i class="ti-printer mr-2" ></i> Cetak
                                        </button>
                                    </form>
                                    @else
                                    <a href="cetak_pdf">
                                        <button type="submit" class="btn btn-primary btn-pulse">
                                            <i class="ti-printer mr-2" ></i> Cetak
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