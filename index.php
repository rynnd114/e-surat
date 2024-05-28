<?php
session_start();
include 'konek.php';
$level = "pemohon";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Pelayanan Surat Keterangan Online Desa Handil TERUSAN</title>
    <link href="style/css/bootstrap.min.css" rel="stylesheet">
    <link href="style/css/font-awesome.min.css" rel="stylesheet">
    <link href="style/css/animate.min.css" rel="stylesheet">
    <link href="style/css/owl.carousel.css" rel="stylesheet">
    <link href="style/css/owl.transitions.css" rel="stylesheet">
    <link href="style/css/prettyPhoto.css" rel="stylesheet">
    <link href="style/css/main.css" rel="stylesheet">
    <link href="style/css/responsive.css" rel="stylesheet">
</head>

<body id="home" class="homepage">

    <header id="header">
        <nav id="main-menu" class="navbar navbar-default navbar-fixed-top" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php"><img src="style/img/lo.png" width="60" height="60"
                            alt="logo"></a>
                </div>

                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="scroll"><a href="#home">Beranda</a></li>
                        <li class="scroll"><a href="#features">Jadwal</a></li>
                        <li class="scroll"><a href="#services">Informasi</a></li>
                        <li class="scroll"><a href="pegawai.php">Pegawai</a></li>
                        <li class="scroll"><a href="#get-in-touch">Lokasi</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <section id="cta2">
        <div class="container">
            <div class="text-center">
                <h2 class="wow fadeInUp" data-wow-duration="300ms" data-wow-delay="0ms"><span>PELAYANAN</span> SURAT
                    KETERANGAN <br> DESA HANDIL TERUSAN</h2>
                <p class="wow fadeInUp" data-wow-duration="300ms" data-wow-delay="100ms">KLIK LOGIN UNTUK REQUEST
                    PEMBUATAN SURAT KETERANGAN
                <div class="row justify-content-center">
                    <div class="col-lg-12 text-center">
                        <div class="wow fadeInUp" data-wow-duration="300ms" data-wow-delay="200ms">
                            <a href="warga/login.php" type="submit" class="btn btn-primary">Login</a>
                            <a href="warga/register.php" type="submit" class="btn btn-primary">Daftar</a>
                        </div>
                    </div>
                </div>
                <img class="img-responsive wow fadeIn" src="style/img/cta2-img.png" alt="" data-wow-duration="300ms"
                    data-wow-delay="300ms">
            </div>
        </div>
    </section>

    <section id="features">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Waktu Pelayanan</h2>
            </div>
            <div class="row">
                <div class="col-sm-6 wow fadeInLeft">
                    <img class="img-responsive" src="style/img/attendance.png" alt="">
                </div>
                <div class="col-sm-6">
                    <div class="media service-box wow fadeInRight">
                        <div class="pull-left">
                            <img src="style/img/clock.png" alt="">
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">SENIN - KAMIS</h4>
                            <p>08.00 - 14.00 WITA</p>
                        </div>
                    </div>

                    <div class="media service-box wow fadeInRight">
                        <div class="pull-left">
                            <img src="style/img/clock.png" alt="">
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">JUM'AT</h4>
                            <p>08.00 - 11.00 WITA</p>
                        </div>
                    </div>

                    <div class="media service-box wow fadeInRight">
                        <div class="pull-left">
                            <img src="style/img/clock.png" alt="">
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">SABTU - MINGGU</h4>
                            <p>LIBUR</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section id="services">
        <div class="container">

            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Prosedur Permohonan Surat</h2>
            </div>

            <div class="row">
                <div class="features">
                    <div class="col-md-6 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="0ms">
                        <div class="media service-box">
                            <div class="pull-left">
                                <img src="style/img/number.png" alt="">
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Login</h4>
                                <p>Pemohon Surat melakukan login, melalui halaman Login.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="100ms">
                        <div class="media service-box">
                            <div class="pull-left">
                                <img src="style/img/number2.png" alt="">
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Menginput Data</h4>
                                <p>Input data pemohon dengan sebelumnya melakukan Login dengan username dan password.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="200ms">
                        <div class="media service-box">
                            <div class="pull-left">
                                <img src="style/img/number3.png" alt="">
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Mengajukan Surat Permohonan</h4>
                                <p>Setelah input data pemohon dengan lengkap dan benar, Pemohon memilih Surat yang mau
                                    direquest serta melengkapi data request, Kemudian Dikirim dan Menunggu persetujuan
                                    dariKepala Desa.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="300ms">
                        <div class="media service-box">
                            <div class="pull-left">
                                <img src="style/img/number4.png" alt="">
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Permohonan Disetujui</h4>
                                <p>Permohonan di setujui olehKepala Desa, kemudian staf akan mencetak surat sesuai
                                    request surat yang diajukan, pemohon mengambil surat yang sudah dicetak dan
                                    bertandatangan di Kantor Kelurahan Wergu Wetan.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section id="get-in-touch">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">LOKASI</h2>
            </div>
        </div>
    </section>


    <section id="contact">
        <div>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.635208988939!2d117.38388570000001!3d-0.5489342999999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df432bf1732b75f%3A0xbb1816dea86bb55c!2sKantor%20Desa%20Handil%20Terusan!5e0!3m2!1sid!2sid!4v1692185617615!5m2!1sid!2sid"
                width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>

    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    &copy;
                    <?php echo date('Y'); ?> KANTOR DESA HANDIL TERUSAN KECAMATAN ANGGANA KABUPATEN KUTAI KARTANEGARA
                </div>
            </div>
        </div>
    </footer>

    <script src="style/js/jquery.js"></script>
    <script src="style/js/bootstrap.min.js"></script>
    <script src="style/js/owl.carousel.min.js"></script>
    <script src="style/js/mousescroll.js"></script>
    <script src="style/js/smoothscroll.js"></script>
    <script src="style/js/jquery.prettyPhoto.js"></script>
    <script src="style/js/jquery.isotope.min.js"></script>
    <script src="style/js/jquery.inview.min.js"></script>
    <script src="style/js/wow.min.js"></script>
    <script src="style/js/main.js"></script>
    <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.15.2/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
</body>

</html>