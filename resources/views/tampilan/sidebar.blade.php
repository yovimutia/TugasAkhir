<div class="scroll-sidebar">

                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="p-t-30">
                    
                        <!-- User Profile-->
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="dashboard" aria-expanded="false"><i class="mr-3 fas fa-home"
                                    aria-hidden="true"></i><span class="hide-menu">Dashboard</span></a></li>

                 @if(\Session::has('admin'))
                    <!--    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="pages-profile.html" aria-expanded="false">
                                <i class="mr-3 fa fa-user" aria-hidden="true"></i><span
                                    class="hide-menu">Profile</span></a></li>   -->

                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="javascript:void(0)" aria-expanded="false"><i class="mr-3 fas fa-angle-down"
                                    ></i><span class="hide-menu">Table Master</span></a>

                                    <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="mapelindex" class="sidebar-link">
                                <i class="mr-3 fa fa-table"></i>
                                <span class="hide-menu"> Data Mata Pelajaran </span></a></li>

                                <li class="sidebar-item"><a href="kelasindex" class="sidebar-link">
                                <i class="mr-3 fa fa-table"></i>
                                <span class="hide-menu"> Data Kelas </span></a></li>

                                <li class="sidebar-item"><a href="ruangindex" class="sidebar-link">
                                <i class="mr-3 fa fa-table"></i>
                                <span class="hide-menu"> Data Ruang </span></a></li>

                                <li class="sidebar-item"><a href="skalaindex" class="sidebar-link">
                                <i class="mr-3 fa fa-table"></i>
                                <span class="hide-menu"> Skala Nilai </span></a></li>

                                <li class="sidebar-item"><a href="jenisujianindex" class="sidebar-link">
                                <i class="mr-3 fa fa-table"></i>
                                <span class="hide-menu"> Jenis Ujian </span></a></li>

                                <li class="sidebar-item"><a href="jabatanindex" class="sidebar-link">
                                <i class="mr-3 fa fa-table"></i>
                                <span class="hide-menu"> Jabatan </span></a></li>

                                <li class="sidebar-item"><a href="bimbinganindex" class="sidebar-link">
                                <i class="mr-3 fa fa-table"></i>
                                <span class="hide-menu"> Jenis Bimbingan </span></a></li>

                                </ul>                
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="pegawaiindex" aria-expanded="false"><i class="mr-3  fas fa-address-book"
                                    aria-hidden="true"></i><span class="hide-menu">Data Pegawai</span></a></li>

                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="siswaindex" aria-expanded="false"><i class="mr-3 fas fa-users"
                                    aria-hidden="true"></i><span class="hide-menu">Data Siswa</span></a></li>
                       
                        </li>
                        

                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="javascript:void(0)" aria-expanded="false"><i class="mr-3 fas fa-angle-down"
                                    ></i><span class="hide-menu">Penilaian Siswa</span></a>
                                    <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="penilaianindex1" class="sidebar-link">
                                <i class="mr-3 fa fa-table"></i>
                                <span class="hide-menu"> Kelas 10 MIPA </span></a></li>

                                <li class="sidebar-item"><a href="penilaianindex2" class="sidebar-link">
                                <i class="mr-3 fa fa-table"></i>
                                <span class="hide-menu"> Kelas 11 MIPA </span></a></li>

                                <li class="sidebar-item"><a href="penilaianindex3" class="sidebar-link">
                                <i class="mr-3 fa fa-table"></i>
                                <span class="hide-menu"> Kelas 12 MIPA </span></a></li>

                                <li class="sidebar-item"><a href="penilaianindex4" class="sidebar-link">
                                <i class="mr-3 fa fa-table"></i>
                                <span class="hide-menu"> Kelas 10 IPS </span></a></li>

                                <li class="sidebar-item"><a href="penilaianindex5" class="sidebar-link">
                                <i class="mr-3 fa fa-table"></i>
                                <span class="hide-menu"> Kelas 11 IPS </span></a></li>

                                <li class="sidebar-item"><a href="penilaianindex6" class="sidebar-link">
                                <i class="mr-3 fa fa-table"></i>
                                <span class="hide-menu"> Kelas 12 IPS </span></a></li>
                                </ul>

                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="jadwalindex" aria-expanded="false"><i class="mr-3 far fa-calendar-check"
                                    aria-hidden="true"></i><span class="hide-menu">Jadwal</span></a></li>

                                    
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="presensiindex" aria-expanded="false"><i class="mr-3 far fa-clipboard"
                                    aria-hidden="true"></i><span class="hide-menu">Data Presensi Siswa</span></a></li>

                     @endif   

                     @if(\Session::has('manager cabang'))
                     <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="javascript:void(0)" aria-expanded="false"><i class="mr-3 fas fa-angle-down"
                                    ></i><span class="hide-menu">Table Master</span></a>

                                    <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="mapelindex" class="sidebar-link">
                                <i class="mr-3 fa fa-table"></i>
                                <span class="hide-menu"> Data Mata Pelajaran </span></a></li>

                                <li class="sidebar-item"><a href="kelasindex" class="sidebar-link">
                                <i class="mr-3 fa fa-table"></i>
                                <span class="hide-menu"> Data Kelas </span></a></li>

                                <li class="sidebar-item"><a href="ruangindex" class="sidebar-link">
                                <i class="mr-3 fa fa-table"></i>
                                <span class="hide-menu"> Data Ruang </span></a></li>

                                <li class="sidebar-item"><a href="skalaindex" class="sidebar-link">
                                <i class="mr-3 fa fa-table"></i>
                                <span class="hide-menu"> Skala Nilai </span></a></li>

                                <li class="sidebar-item"><a href="jenisujianindex" class="sidebar-link">
                                <i class="mr-3 fa fa-table"></i>
                                <span class="hide-menu"> Jenis Ujian </span></a></li>

                                <li class="sidebar-item"><a href="jabatanindex" class="sidebar-link">
                                <i class="mr-3 fa fa-table"></i>
                                <span class="hide-menu"> Jabatan </span></a></li>

                                <li class="sidebar-item"><a href="bimbinganindex" class="sidebar-link">
                                <i class="mr-3 fa fa-table"></i>
                                <span class="hide-menu"> Jenis Bimbingan </span></a></li>

                                </ul>                
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="pegawaiindex" aria-expanded="false"><i class="mr-3  fas fa-address-book"
                                    aria-hidden="true"></i><span class="hide-menu">Data Pegawai</span></a></li>

                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="siswaindex" aria-expanded="false"><i class="mr-3 fas fa-users"
                                    aria-hidden="true"></i><span class="hide-menu">Data Siswa</span></a></li>
                       
                        </li>
                        

                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="javascript:void(0)" aria-expanded="false"><i class="mr-3 fas fa-angle-down"
                                    ></i><span class="hide-menu">Penilaian Siswa</span></a>
                                    <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="penilaianindex1" class="sidebar-link">
                                <i class="mr-3 fa fa-table"></i>
                                <span class="hide-menu"> Kelas 10 MIPA </span></a></li>

                                <li class="sidebar-item"><a href="penilaianindex2" class="sidebar-link">
                                <i class="mr-3 fa fa-table"></i>
                                <span class="hide-menu"> Kelas 11 MIPA </span></a></li>

                                <li class="sidebar-item"><a href="penilaianindex3" class="sidebar-link">
                                <i class="mr-3 fa fa-table"></i>
                                <span class="hide-menu"> Kelas 12 MIPA </span></a></li>

                                <li class="sidebar-item"><a href="penilaianindex4" class="sidebar-link">
                                <i class="mr-3 fa fa-table"></i>
                                <span class="hide-menu"> Kelas 10 IPS </span></a></li>

                                <li class="sidebar-item"><a href="penilaianindex5" class="sidebar-link">
                                <i class="mr-3 fa fa-table"></i>
                                <span class="hide-menu"> Kelas 11 IPS </span></a></li>

                                <li class="sidebar-item"><a href="penilaianindex6" class="sidebar-link">
                                <i class="mr-3 fa fa-table"></i>
                                <span class="hide-menu"> Kelas 12 IPS </span></a></li>
                                </ul>

                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="jadwalindex" aria-expanded="false"><i class="mr-3 far fa-calendar-check"
                                    aria-hidden="true"></i><span class="hide-menu">Jadwal</span></a></li>

                                    
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="presensiindex" aria-expanded="false"><i class="mr-3 far fa-clipboard"
                                    aria-hidden="true"></i><span class="hide-menu">Data Presensi Siswa</span></a></li>

                        @endif
                        @if(\Session::has('tentor'))
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="javascript:void(0)" aria-expanded="false"><i class="mr-3 fas fa-angle-down"
                                    ></i><span class="hide-menu">Penilaian Siswa</span></a>
                                    <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="penilaianindex1" class="sidebar-link">
                                <i class="mr-3 fa fa-table"></i>
                                <span class="hide-menu"> Kelas 10 MIPA </span></a></li>

                                <li class="sidebar-item"><a href="penilaianindex2" class="sidebar-link">
                                <i class="mr-3 fa fa-table"></i>
                                <span class="hide-menu"> Kelas 11 MIPA </span></a></li>

                                <li class="sidebar-item"><a href="penilaianindex3" class="sidebar-link">
                                <i class="mr-3 fa fa-table"></i>
                                <span class="hide-menu"> Kelas 12 MIPA </span></a></li>

                                <li class="sidebar-item"><a href="penilaianindex4" class="sidebar-link">
                                <i class="mr-3 fa fa-table"></i>
                                <span class="hide-menu"> Kelas 10 IPS </span></a></li>

                                <li class="sidebar-item"><a href="penilaianindex5" class="sidebar-link">
                                <i class="mr-3 fa fa-table"></i>
                                <span class="hide-menu"> Kelas 11 IPS </span></a></li>

                                <li class="sidebar-item"><a href="penilaianindex6" class="sidebar-link">
                                <i class="mr-3 fa fa-table"></i>
                                <span class="hide-menu"> Kelas 12 IPS </span></a></li>
                                </ul>

                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="jadwalindex" aria-expanded="false"><i class="mr-3 far fa-calendar-check"
                                    aria-hidden="true"></i><span class="hide-menu">Jadwal</span></a></li>

                                    
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="presensiindex" aria-expanded="false"><i class="mr-3 far fa-clipboard"
                                    aria-hidden="true"></i><span class="hide-menu">Data Presensi Siswa</span></a></li>
                        @endif

                    </ul>

                </nav>
                <!-- End Sidebar navigation -->
            </div>