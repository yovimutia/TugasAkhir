<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Template Mo">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">

    <title>Bimbingan Belajar Primagama Ngawi</title>
<!--

ART FACTORY

https://templatemo.com/tm-537-art-factory

-->
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="assets/css/templatemo-art-factory.css">
    <link rel="stylesheet" type="text/css" href="assets/css/owl-carousel.css">

    </head>
    
    <body>
    
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->
    
    
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="#" class="logo"><img src="../assets/images/logo.png"  width="235" height="70" margin="20px"></a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="#welcome" class="active">Home</a></li> 
                            <li class="scroll-to-section"><a href="#services">Menu</a></li>
                            @if(\Session::has('admin'))
                            <li class="submenu">
                                <a href="javascript:;">Input Data</a>
                                <ul>
                                    <li><a href="siswaindex">Siswa</a></li>
                                    <li><a href="pegawaiindex">Pegawai</a></li>
                                    <li><a href="kelasindex">Kelas</a></li>
                                    <li><a href="mapelindex">Mata Pelajaran</a></li>
                                    <li><a href="ruangindex">Ruang</a></li>
                                    <li><a href="skalaindex">Skala Nilai</a></li>
                                    <li><a href="jenisujianindex">Jenis Ujian</a></li>
                                    <li><a href="jabatanindex">Jabatan</a></li>
                                    <li><a href="bimbinganindex">Jenis Bimbingan</a></li>
                                </ul>
                            </li>
                            @endif
                            @if(\Session::has('manager'))
                            <li class="submenu">
                                <a href="javascript:;">Input Data</a>
                                <ul>
                                    <li><a href="siswaindex">Siswa</a></li>
                                    <li><a href="pegawaiindex">Pegawai</a></li>
                                    <li><a href="kelasindex">Kelas</a></li>
                                    <li><a href="mapelindex">Mata Pelajaran</a></li>
                                    <li><a href="ruangindex">Ruang</a></li>
                                    <li><a href="skalaindex">Skala Nilai</a></li>
                                    <li><a href="jenisujianindex">Jenis Ujian</a></li>
                                    <li><a href="jabatanindex">Jabatan</a></li>
                                    <li><a href="bimbinganindex">Jenis Bimbingan</a></li>
                                </ul>
                            </li>

                            @endif
                            <li class="scroll-to-section"><a href="edit_profil">Edit Profile</a></li>
                            <li class="scroll-to-section"><a href="logout">Logout</a></li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->


    <!-- ***** Welcome Area Start ***** -->
    <div class="welcome-area" id="welcome">

        <!-- ***** Header Text Start ***** -->
        <div class="header-text">
            <div class="container">
                <div class="row">
                    <div class="left-text col-lg-6 col-md-6 col-sm-12 col-xs-12" data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                        <h1> <strong></strong></h1>
                        <p></p>
                      <!--  <a href="#about" class="main-button-slider"></a>-->
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">
                        <img src="assets/images/slider-icon.png" class="rounded img-fluid d-block mx-auto" alt="First Vector Graphic">
                    </div>
                </div>
            </div>
        </div>
        <!-- ***** Header Text End ***** -->
    </div>
    <!-- ***** Welcome Area End ***** -->


    <!-- ***** Features Big Item Start ***** -->
    
    <!-- ***** Features Big Item End ***** -->


    <!-- ***** Features Big Item Start ***** -->
   
    <!-- ***** Features Big Item End ***** -->


    <!-- ***** Features Small Start ***** -->
    <section class="section" id="services">
        <div class="container">
            <div class="row">
                <div class="owl-carousel owl-theme">
                    <div class="item service-item">
                        <div class="icon">
                            <i><img src="assets/images/service-icon-01.png" alt=""></i>
                        </div>
                        <h5 class="service-title">Input Nilai Siswa</h5>
                        <p></p>
                        <a href="penilaianindex1" class="main-button">Input</a>
                    </div>
                    <div class="item service-item">
                        <div class="icon">
                            <i><img src="assets/images/service-icon-03.png" alt=""></i>
                        </div>
                        <h5 class="service-title">Jadwal</h5>
                        <p></p>
                        <a href="jadwalindex" class="main-button">More Detail</a>
                    </div>
                    <div class="item service-item">
                        <div class="icon">
                            <i><img src="assets/images/service-icon-02.png" alt=""></i>
                        </div>
                        <h5 class="service-title">Presensi Siswa</h5>
                        <p></p>
                        <a href="presensiindex" class="main-button">More Detail</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Features Small End ***** -->


    <!-- ***** Frequently Question Start ***** -->
    
    <!-- ***** Frequently Question End ***** -->


    <!-- ***** Contact Us Start ***** -->
    <
    <!-- ***** Contact Us End ***** -->

    
    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 col-sm-12">
                    <p class="copyright">Copyright &copy; 2020 Primagama Ngawi
                
                . Design: <a rel="nofollow" href="https://templatemo.com">TemplateMo</a></p>
                </div>
                <div class="col-lg-5 col-md-12 col-sm-12">
                    <ul class="social">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-rss"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    
    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script> 
    
    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>

  </body>
</html>