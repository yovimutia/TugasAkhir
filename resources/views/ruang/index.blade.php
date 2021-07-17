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

                        
                            <link rel="stylesheet" href="ruangindex">
     @if(\Session::has('admin'))
    <form class="form-horizontal" action="ruangStore" method="post" enctype="multipart/form-data">
        {{ @csrf_field() }}
        <div class="form-group row">
            <div class="col col-md-1"></div>
            <div class="col col-md-2"><strong><label for="text-input" class=" form-control-label">Nama Ruang</label></strong></div>
            <div class="col col-md-6"><input type="text" id="namaruang" name="namaruang" placeholder="Masukkan Nama Ruang" class="form-control"></div>
            <div class="col col-md-2"><input type="submit" value="add" class="btn btn-success"></div>
        </div>
    </form>
    @endif
                        

                                <h4 class="card-title">Data Ruangan</h4>
                                <h6 class="card-subtitle"> <code></code></h6>
                                <div class="table-responsive">
                                    <table class="table user-table no-wrap">
                                        <thead>
                                            <tr>
                                                <th class="border-top-0">#</th>
                                                <th class="border-top-0">Nama Ruang</th>
                                                <th class="border-top-0">  </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @php $no =1; @endphp
                                        @foreach ($ruang as $ruang)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $ruang->NAMA_RUANG }}</td>
                                                @if(\Session::has('admin'))
                                                <td>
                                                 <a href="ruangEdit{{ $ruang->ID_RUANG }}"><button type="submit" class="btn btn-primary">Edit</button>
                                                </a>

                                                <a href="ruangDestroy/{{ $ruang->ID_RUANG }}">
                                                <button class="btn btn-danger" type="button" style="padding: 5px" >Delete</button>
                                                </a>
                                                </td>
                                                @else
                                                <td>
                                                 <a href="ruangEdit{{ $ruang->ID_RUANG }}"><button type="submit" class="btn btn-primary" disabled>Edit</button>
                                                </a>

                                                <a href="ruangDestroy/{{ $ruang->ID_RUANG }}">
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