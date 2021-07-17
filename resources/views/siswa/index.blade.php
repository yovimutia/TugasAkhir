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
                            <a href="siswacreate"
                                class="btn btn-success d-none d-md-inline-block text-white" 
                                ><i class="mr-3  fas fa-plus"
                                    aria-hidden="true"></i>Tambah Data Siswa</a>
                        @else
                        <a href="siswacreate"
                                class="btn btn-success d-none d-md-inline-block text-white disabled" 
                                ><i class="mr-3  fas fa-plus"
                                    aria-hidden="true"></i>Tambah Data Siswa</a>
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

                                <h4 class="card-title">Data Siswa</h4>
                                <h6 class="card-subtitle"> <code></code></h6>
                                <div class="table-responsive">
                                    <table class="table user-table no-wrap">
                                        <thead>
                                            <tr>
                                                <th class="border-top-0">#</th>
                                                <th class="border-top-0">No Induk</th>
                                                <th class="border-top-0">Nama Bimbingan</th>
                                                <th class="border-top-0">Kelas</th>
                                                <th class="border-top-0">Nama</th>
                                                <th class="border-top-0">Alamat</th>
                                                <th class="border-top-0">Tangggal Lahir</th>
                                                <th class="border-top-0">Jenis Kelamin</th>
                                                <th class="border-top-0">Telepon</th>
                                                <th class="border-top-0">Asal Sekolah</th>
                                                <th class="border-top-0">status Siswa</th>
                                                <th class="border-top-0">  </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @php $no =1; @endphp
                                        @foreach ($siswa as $siswa)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $siswa->NO_INDUK }}</td>
                                                <td>{{ $siswa->NAMA_BIMBINGAN }}</td>
                                                <td>{{ $siswa->NAMA_KELAS }}</td>
                                                <td>{{ $siswa->NAMA_SISWA }}</td>
                                                <td>{{ $siswa->ALAMAT_SISWA }}</td>
                                                <td>{{ $siswa->TGL_LAHIR_SISWA }}</td>
                                                <td>{{ $siswa->JK_SISWA }}</td>
                                                <td>{{ $siswa->TELP_SISWA }}</td>
                                                <td>{{ $siswa->ASAL_SEKOLAH }}</td>
                                                @if(\Session::has('admin'))
                                                @if($siswa->STATUS_SISWA == 0)
                                                <td>
                                                <a href="siswagantiStatus/{{ $siswa->NO_INDUK  }}">
                                                 <button class=" btn btn-success" type="submit">Active</button>
                                                </a>
                                                </td>
                                                 @else
                                                 <td>
                                                 <a href="siswagantiStatus/{{ $siswa->NO_INDUK  }}">
                                                <button class=" btn btn-danger" type="submit">Non Active</button>
                                                 </a>
                                                </td>
                                                @endif
                                                
                                                <td>
                                                 <a href="siswaEdit{{ $siswa->NO_INDUK }}"><button type="submit" class="btn btn-primary">Edit</button>
                                                </a>

                                                <a href="siswaDestroy/{{ $siswa->NO_INDUK }}">
                                                <button class="btn btn-danger" type="button" style="padding: 5px" >Delete</button>
                                                </a>
                                                </td>
                                                @else
                                                @if($siswa->STATUS_SISWA == 0)
                                                <td>
                                                <a href="siswagantiStatus/{{ $siswa->NO_INDUK  }}">
                                                 <button class=" btn btn-success" type="submit" disabled>Active</button>
                                                </a>
                                                </td>
                                                 @else
                                                 <td>
                                                 <a href="siswagantiStatus/{{ $siswa->NO_INDUK  }}">
                                                <button class=" btn btn-danger" type="submit" disabled>Non Active</button>
                                                 </a>
                                                </td>
                                                @endif
                                                
                                                <td>
                                                 <a href="siswaEdit{{ $siswa->NO_INDUK }}"><button type="submit" class="btn btn-primary" disabled>Edit</button>
                                                </a>

                                                <a href="siswaDestroy/{{ $siswa->NO_INDUK }}">
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