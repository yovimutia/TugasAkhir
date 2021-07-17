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
                            <a href="jadwalcreate"
                                class="btn btn-success d-none d-md-inline-block text-white" 
                                ><i class="mr-3  fas fa-plus"
                                    aria-hidden="true"></i>Tambah Data</a>
                        @else
                        <a href="jadwalcreate"
                                class="btn btn-success d-none d-md-inline-block text-white disabled" 
                                ><i class="mr-3  fas fa-plus"
                                    aria-hidden="true"></i>Tambah Data</a>
                        @endif
                        </div>
                        @if ($message = Session::get('error'))
                        <div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>	
                            <strong>{{ $message }}</strong>
                        </div>
                        @endif

                                <h4 class="card-title">Jadwal</h4>
                                <h6 class="card-subtitle"> <code></code></h6>
                                <div class="table-responsive">
                                    <table class="table user-table no-wrap">
                                        <thead>
                                            <tr>
                                                <th class="border-top-0">#</th>
                                                <th class="border-top-0">Tanggal Les</th>
                                                <th class="border-top-0">Jam</th>
                                                <th class="border-top-0">Kelas</th>
                                                <th class="border-top-0">Mata Pelajaran</th>
                                                <th class="border-top-0">Ruangan</th>
                                                <th class="border-top-0">Tentor</th>
                                                <th class="border-top-0">  </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @php $no =1; @endphp
                                        @foreach ($jadwal as $jadwal)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $jadwal->TGL_LES }}</td>
                                                <td>{{ $jadwal->JAM_LES }}</td>
                                                @foreach ($kelas as $k)
                                                @if ($jadwal->ID_KELAS == $k->ID_KELAS)
                                                <td>{{ $k->NAMA_KELAS }}</td>
                                                @endif
                                                @endforeach
                                                @foreach ($matapelajaran as $mp)
                                                @if ($jadwal->ID_MAPEL == $mp->ID_MAPEL)
                                                <td>{{ $mp->NAMA_MAPEL }}</td>
                                                @endif
                                                @endforeach
                                                @foreach ($ruang as $r)
                                                @if ($jadwal->ID_RUANG == $r->ID_RUANG)
                                                <td>{{ $r->NAMA_RUANG }}</td>
                                                @endif
                                                @endforeach
                                                @foreach ($pegawai as $peg)
                                                @if ($jadwal->ID_PEGAWAI == $peg->ID_PEGAWAI)
                                                <td>{{ $peg->NAMA_PEGAWAI }}</td>
                                                @endif
                                                @endforeach
                                                @if(\Session::has('tentor'))
                                                <td>
                                                 <a href="presensi{{ $jadwal->ID_JADWAL }}"><button type="submit" class="btn btn-primary">Input Presensi</button>
                                                </a>
                                                </td>
                                                <!-- @elseif(\Session::has('tentor'))
                                                <td>
                                                 <a href="presensi{{ $jadwal->ID_JADWAL }}"><button type="submit" class="btn btn-primary">Input Presensi</button>
                                                </a>
                                                </td> -->
                                                @else
                                                <td>
                                                 <a href="presensi{{ $jadwal->ID_JADWAL }}"><button type="submit" class="btn btn-primary" disabled>Input Presensi</button>
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