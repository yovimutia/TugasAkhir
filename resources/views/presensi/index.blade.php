@extends('tampilan/index')
@section('head')
<link rel="stylesheet" href="{{ asset('LTE/plugins/daterangepicker/daterangepicker.css')}}">
@endsection
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


                                <h4 class="card-title">Rekap Presensi Siswa</h4>
                                <h6 class="card-subtitle"> <code></code></h6>
                                
                                <form action="presensiindex" method="get">
                                <div class="row form-group">
                                    <div class="col col-md-8" align="right"><label for="text-input" class=" form-control-label">Range</label></div>
                                    <div class="col-12 col-md-3" align="left">
                                        <input type="text" class="form-control float-right" id="reservation" name="date">                                      
                                    </div>
                                    <div class="col-12 col-md-1" align="left">
                                        <button class="btn btn-secondary" type="submit">Filter</button>                                        
                                    </div>
                                </div>
                            </form>

                <div class="table-responsive">
                                    <table class="table user-table no-wrap">
                                        <thead>
                                            <tr>
                                                <th class="border-top-0">#</th>
                                                
                                                <th class="border-top-0">No Induk</th>
                                                <th class="border-top-0">Nama Siswa</th>
                                                <th class="border-top-0">Kelas</th>
                                                <th class="border-top-0">Total Kehadiran</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @php $no =1; @endphp
                                        @foreach ($jumlah_hadir as $presensi)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                
                                                <td>{{ $presensi->NO_INDUK }}</td>
                                                @foreach ($siswa as $s)
                                                @if ($presensi->NO_INDUK == $s->NO_INDUK)
                                                <td>{{ $s->NAMA_SISWA }}</td>
                                                  @foreach ($kelas as $k)
                                                  @if ($s->ID_KELAS == $k->ID_KELAS)
                                                <td>{{ $k->NAMA_KELAS }}</td>
                                                  @endif
                                                  @endforeach
                                                @endif
                                                @endforeach
          
                                                <td>{{ $presensi->total_hadir }}</td>   
                                            </tr>

                                            @endforeach
                                        </tbody>
                                    </table>
                                    @if(\Session::has('admin'))
                                    <a href="presensi_pdf">
                                        <button type="button" class="btn btn-primary btn-pulse">
                                            <i class="ti-printer mr-2" ></i> Cetak Pdf
                                        </button>
                                    </a>
                                    @else
                                    <a href="presensi_pdf">
                                        <button type="button" class="btn btn-primary btn-pulse" disabled>
                                            <i class="ti-printer mr-2" ></i> Cetak Pdf
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
                   @endsection
@section('script')
<script src="{{ asset('LTE/plugins/moment/moment.min.js')}}"></script>

<script src="{{ asset('LTE/plugins/daterangepicker/daterangepicker.js')}}"></script>

<script type="text/javascript">
        $(document).ready(function() {
            let start = moment().startOf('month')
            let end = moment().endOf('month')

            $('#reservation').daterangepicker({
                startDate: start,
                endDate: end
            })
        })
    </script>
    @endsection