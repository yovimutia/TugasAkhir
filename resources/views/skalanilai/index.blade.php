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

                        
                        <div class="text-right upgrade-btn">
                        @if(\Session::has('admin'))
                            <a href="skalacreate"
                                class="btn btn-success d-none d-md-inline-block text-white" 
                                ><i class="mr-3  fas fa-plus"
                                    aria-hidden="true"></i>Tambah Data Skala Nilai</a>
                        @else
                        <a href="skalacreate"
                                class="btn btn-success d-none d-md-inline-block text-white disabled" 
                                ><i class="mr-3  fas fa-plus"
                                    aria-hidden="true"></i>Tambah Data Skala Nilai</a>
                        @endif
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

                                <h4 class="card-title">Data Skala Nilai</h4>
                                <h6 class="card-subtitle"> <code></code></h6>
                                <div class="table-responsive">
                                    <table class="table user-table no-wrap">
                                        <thead>
                                            <tr>
                                                <th class="border-top-0">#</th>
                                                <th class="border-top-0">Indeks Nilai</th>
                                                <th class="border-top-0">Range Nilai</th>
                                                <th class="border-top-0">  </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @php $no =1; @endphp
                                        @foreach ($skalanilai as $skalanilai)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $skalanilai->KODE_NILAI }}</td>
                                                <td>{{ $skalanilai->RANGE_NILAI }}</td>
                                                @if(\Session::has('admin'))
                                                <td>
                                                 <a href="skalaEdit{{ $skalanilai->KODE_NILAI }}"><button type="submit" class="btn btn-primary">Edit</button>
                                                </a>

                                                <a href="skalaDestroy/{{ $skalanilai->KODE_NILAI }}">
                                                <button class="btn btn-danger" type="button" style="padding: 5px" >Delete</button>
                                                </a>
                                                </td>
                                                @else
                                                <td>
                                                 <a href="skalaEdit{{ $skalanilai->KODE_NILAI }}"><button type="submit" class="btn btn-primary" disabled>Edit</button>
                                                </a>

                                                <a href="skalaDestroy/{{ $skalanilai->KODE_NILAI }}">
                                                <button class="btn btn-danger" type="button" style="padding: 5px" disabled>Delete</button>
                                                </a>
                                                </td>
                                                @endif
                                            </tr>

                                            @endforeach
                                        </tbody>
                                    </table>
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