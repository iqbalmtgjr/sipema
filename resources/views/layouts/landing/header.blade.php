<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>PMB STKIP Persada Khatulistiwa</title>
    <meta name="description"
        content="Pendaftaran Mahasiswa Baru STKIP Persada Khatulistiwa Sintang, pendaftaran mahasiswa baru online, pmb online, pmb stkip persada khatulistiwa, pmb persada khatulistiwa, pmb sintang, pmb kalbar, pmb pontianak">
    <meta name="keywords"
        content="pmb stkip persada khatulistiwa sintang, pmb online, pmb persada khatulistiwa, pmb sintang, pmb kalbar, pmb pontianak, pendaftaran mahasiswa baru stkip persada khatulistiwa, pendaftaran mahasiswa baru online, stkip persada khatulistiwa sintang">

    <!-- Favicons -->
    <link href="{{ asset('') }}assets/img/favicon.ico" rel="icon">
    <link href="{{ asset('') }}landing/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('') }}landing/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('') }}landing/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('') }}landing/vendor/aos/aos.css" rel="stylesheet">
    <link href="{{ asset('') }}landing/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('') }}landing/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="{{ asset('') }}landing/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('') }}landing/css/main.css" rel="stylesheet">

</head>

<body class="index-page">

    <header id="header" class="header sticky-top">

        <div class="topbar d-flex align-items-center">
            <div class="container d-flex justify-content-center justify-content-md-between">
                <div class="contact-info d-flex align-items-center">
                    <i class="bi bi-envelope d-flex align-items-center"><a
                            href="mailto:persada@persadakhatulistiwa.ac.id">persada@persadakhatulistiwa.ac.id</a></i>
                    <i class="bi bi-phone d-flex align-items-center ms-4"><span>+62 821-5596-4080</span></i>
                </div>
                <div class="social-links d-none d-md-flex align-items-center">
                    {{-- <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a> --}}
                    <a href="https://www.facebook.com/stkipsintang/" target="_blank" class="facebook"><i
                            class="bi bi-facebook"></i></a>
                    <a href="https://www.instagram.com/persadakhatulistiwa/" target="_blank" class="instagram"><i
                            class="bi bi-instagram"></i></a>
                </div>
            </div>
        </div><!-- End Top Bar -->

        <div class="branding d-flex align-items-center">

            <div class="container position-relative d-flex align-items-center justify-content-between">
                <a href="index.html" class="logo d-flex align-items-center me-auto">
                    <img src="{{ asset('') }}assets/img/stkip.png" alt="">
                    {{-- <h1 class="sitename">Persada Khatulistiwa</h1> --}}
                </a>

                <nav id="navmenu" class="navmenu">
                    <ul>
                        <li><a href="#hero" class="active">Beranda<br></a></li>
                        <li><a href="#syarat">Syarat Pendaftaran</a></li>
                        {{-- <li><a href="#jalur">Jalur Penerimaan</a></li> --}}
                        <li><a href="#alur">Alur Pendaftaran</a></li>
                        <li><a href="#biaya">Biaya Pendaftaran</a></li>
                        <li><a href="/register" class="cta-btn btn btn-primary">Daftar Sekarang</a></li>
                        {{-- <li class="btn btn-primary"><a href="/login" class="btn btn-success">Masuk</a></li> --}}
                        {{-- <li><a href="#doctors">Doctors</a></li> --}}
                        {{-- <li class="dropdown"><a href="#"><span>Dropdown</span> <i
                                    class="bi bi-chevron-down toggle-dropdown"></i></a>
                            <ul>
                                <li><a href="#">Dropdown 1</a></li>
                                <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i
                                            class="bi bi-chevron-down toggle-dropdown"></i></a>
                                    <ul>
                                        <li><a href="#">Deep Dropdown 1</a></li>
                                        <li><a href="#">Deep Dropdown 2</a></li>
                                        <li><a href="#">Deep Dropdown 3</a></li>
                                        <li><a href="#">Deep Dropdown 4</a></li>
                                        <li><a href="#">Deep Dropdown 5</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Dropdown 2</a></li>
                                <li><a href="#">Dropdown 3</a></li>
                                <li><a href="#">Dropdown 4</a></li>
                            </ul>
                        </li> --}}
                        {{-- <li><a href="#contact">Kontak</a></li> --}}
                    </ul>
                    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
                </nav>

                {{-- <a class="cta-btn d-none d-sm-block" href="/register">Daftar Sekarang</a> --}}
                {{-- <a class="cta-btn d-none d-sm-block" href="/login">Login</a> --}}

            </div>

        </div>

    </header>
