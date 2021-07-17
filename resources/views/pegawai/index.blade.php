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
                            <a href="pegawaicreate"
                                class="btn btn-success d-none d-md-inline-block text-white" 
                                ><i class="mr-3  fas fa-plus"
                                    aria-hidden="true"></i>Tambah Data Pegawai</a>
                        @else
                        <a href="pegawaicreate"
                                class="btn btn-success d-none d-md-inline-block text-white disabled" 
                                ><i class="mr-3  fas fa-plus"
                                    aria-hidden="true"></i>Tambah Data Pegawai</a>
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
                                <h4 class="card-title">Data Pegawai</h4>
                                <h6 class="card-subtitle"> <code></code></h6>
                                <div class="table-responsive">
                                    <table class="table user-table no-wrap">
                                        <thead>
                                            <tr>
                                                <th class="border-top-0">#</th>
                                                <th class="border-top-0">Nama Jabatan</th>
                                                <th class="border-top-0">Nama Pegawai</th>
                                                <th class="border-top-0">Alamat Pegawai</th>
                                                <th class="border-top-0">Jenis Kelamin</th>
                                                <th class="border-top-0">tanggal Lahir</th>
                                                <th class="border-top-0">Telelpon</th>
                                                <th class="border-top-0">Email</th>
                                                <th class="border-top-0">Status</th>
                                                <th class="border-top-0">  </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @php $no =1; @endphp
                                        @foreach ($pegawai as $pegawai)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $pegawai->NAMA_JABATAN }}</td>
                                                <td>{{ $pegawai->NAMA_PEGAWAI }}</td>
                                                <td>{{ $pegawai->ALAMAT_OEGAWAI }}</td>
                                                <td>{{ $pegawai->JK_PEGAWAI }}</td>
                                                <td>{{ $pegawai->TGL_LAHIR_PEGAWAI }}</td>
                                                <td>{{ $pegawai->TELP_PEGAWAI }}</td>
                                                <td>{{ $pegawai->EMAIL_PEGAWAI }}</td>
                                                @if(\Session::has('admin'))
                                                @if($pegawai->STATUS_PEGAWAI == 0)
                                                <td>
                                                <a href="pegawaigantiStatus/{{ $pegawai->ID_PEGAWAI  }}">
                                                 <button class=" btn btn-success" type="submit">Active</button>
                                                </a>
                                                </td>
                                                 @else
                                                 <td>
                                                 <a href="pegawaigantiStatus/{{ $pegawai->ID_PEGAWAI  }}">
                                                <button class=" btn btn-danger" type="submit">Non Active</button>
                                                 </a>
                                                </td>
                                                @endif
                                                <td>
                                                 <a href="pegawaiEdit{{ $pegawai->ID_PEGAWAI  }}"><button type="submit" class="btn btn-primary">Edit</button>
                                                </a>

                                                <a href="pegawaiDestroy/{{ $pegawai->ID_PEGAWAI  }}">
                                                <button class="btn btn-danger" type="button" style="padding: 5px" >Delete</button>
                                                </a>
                                                </td>
                                                @else
                                                @if($pegawai->STATUS_PEGAWAI == 0)
                                                <td>
                                                <a href="pegawaigantiStatus/{{ $pegawai->ID_PEGAWAI  }}">
                                                 <button class=" btn btn-success" type="submit" disabled>Active</button>
                                                </a>
                                                </td>
                                                 @else
                                                 <td>
                                                 <a href="pegawaigantiStatus/{{ $pegawai->ID_PEGAWAI  }}">
                                                <button class=" btn btn-danger" type="submit" disabled>Non Active</button>
                                                 </a>
                                                </td>
                                                @endif
                                                <td>
                                                 <a href="pegawaiEdit{{ $pegawai->ID_PEGAWAI  }}"><button type="submit" class="btn btn-primary" disabled>Edit</button>
                                                </a>

                                                <a href="pegawaiDestroy/{{ $pegawai->ID_PEGAWAI  }}">
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