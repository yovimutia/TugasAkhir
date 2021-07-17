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
                                <form action="cari_laporan" method="post">
                            
                                    @csrf
                                    <select id="no_induk" name="no_induk" required>
                                        <option disabled selected value="">-Pilih Siswa-</option>
                                        @foreach ($siswaku as $s)
                                        <option value="{{ $s->NO_INDUK }}">{{ $s->NAMA_SISWA }}</option>
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