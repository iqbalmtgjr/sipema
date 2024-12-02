@include('layouts.landing.header')
<main class="main">
    <!-- Hero Section -->
    <section id="hero" class="hero section light-background">

        <img src="{{ asset('') }}landing/img/1.jpg" alt="" data-aos="fade-in">

        <div class="container position-relative">

            <div class="welcome position-relative" data-aos="fade-down" data-aos-delay="100">
                <h2 class="text-light">Selamat Datang di <br> PMB Persada Khatulistiwa</h2>
                {{-- <p>We are team of talented designers making websites with Bootstrap</p> --}}
            </div><!-- End Welcome -->

            <div class="content row gy-4">
                <div class="col-lg-4 d-flex align-items-stretch">
                    <div class="why-box" data-aos="zoom-out" data-aos-delay="200">
                        <h3>Kenapa di STKIP Persada Khatulistiwa?</h3>
                        <p>
                            STKIP Persada Khatulistiwa memiliki beberapa kelebihan yang membuatnya berbeda dari
                            institusi lain. Kami memiliki tenaga pengajar yang berpengalaman dan berdedikasi,
                            fasilitas
                            yang memadai, serta suasana akademis yang kondusif. Kami juga memiliki berbagai program
                            yang dapat membantu anda dalam mengembangkan kemampuan dan potensi anda.
                        </p>
                        <div class="text-center">
                            <a href="/register" class="more-btn"><span>Daftar Sekarang</span> <i
                                    class="bi bi-chevron-right"></i></a>
                            {{-- <a href="/login" class="more-btn"><span>Login</span> <i
                                    class="bi bi-chevron-right"></i></a> --}}
                        </div>
                    </div>
                </div><!-- End Why Box -->
                <div class="col-lg-8 d-flex align-items-stretch">
                    <div class="d-flex flex-column justify-content-center">
                        <div class="row gy-4">

                            <div class="col-xl-4 d-flex align-items-stretch">
                                <div class="icon-box" data-aos="zoom-out" data-aos-delay="300">
                                    <i class="bi bi-trophy"></i>
                                    <h4>Jalur Prestasi</h4>
                                    <p>Pilih jalur prestasi untuk memanfaatkan kemampuan dan pencapaian akademis
                                        atau non-akademis Anda.</p>
                                </div>
                            </div><!-- End Icon Box -->

                            <div class="col-xl-4 d-flex align-items-stretch">
                                <div class="icon-box" data-aos="zoom-out" data-aos-delay="400">
                                    <i class="bi bi-gem"></i>
                                    <h4>Jalur Tes</h4>
                                    <p>Pilih jalur tes untuk memanfaatkan kemampuan dan keterampilan Anda dalam
                                        mengikuti seleksi masuk.</p>
                                </div>
                            </div><!-- End Icon Box -->
                            <div class="col-xl-4 d-flex align-items-stretch">
                                <div class="icon-box" data-aos="zoom-out" data-aos-delay="500">
                                    <i class="bi bi-book"></i>
                                    <h4>Jalur Reguler 2</h4>
                                    <p>Reguler 2 adalah kelas karyawan yang diadakan di hari Jumat dan Sabtu. Pilih
                                        jalur ini untuk memanfaatkan waktu luang Anda menjadi lebih produktif.</p>
                                </div>
                            </div><!-- End Icon Box -->

                        </div>
                    </div>
                </div>
            </div><!-- End  Content-->

        </div>

    </section><!-- /Hero Section -->

    <section id="jadwal" class="departments section light-background">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Jadwal Pendaftaran</h2>
            <p>Informasi mengenai jadwal pendaftaran untuk berbagai jalur yang tersedia di STKIP Persada Khatulistiwa.
                Jika Anda memiliki pertanyaan terkait jadwal pendaftaran, silakan hubungi panitia PMB atau kirimkan
                pesan melalui WhatsApp (+62821-5596-4080).
            </p>

            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="accordion" id="accordionJadwalPendaftaran">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingGelombang1">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseGelombang1" aria-expanded="true"
                                        aria-controls="collapseGelombang1">
                                        <strong>Gelombang 1</strong>
                                    </button>
                                </h2>
                                <div id="collapseGelombang1"
                                    class="accordion-collapse collapse {{ $gelombang == 1 ? 'show' : '' }}"
                                    aria-labelledby="headingGelombang1" data-bs-parent="#accordionJadwalPendaftaran">
                                    <div class="accordion-body">
                                        <strong>Jalur Tes</strong>
                                        <p>
                                            <strong>Pendaftaran:</strong> {{ $jadwal_gel1->daftar_buka }} <br>
                                            <strong>Pelaksanaan Tes:</strong> {{ $jadwal_gel1->tes_lak }} <br>
                                            <strong>Pengumuman Hasil:</strong> {{ $jadwal_gel1->tes_mum }} <br>
                                            <strong>Pembayaran Registrasi:</strong> {{ $jadwal_gel1->regi }}
                                        </p> <br>
                                        <strong>Jalur Prestasi</strong>
                                        <p>
                                            <strong>Pendaftaran:</strong> {{ $jadwal_gel1->daftar_buka }} <br>
                                            <strong>Pengumuman Hasil:</strong> {{ $jadwal_gel1->pres_mum1 }} <br>
                                            <strong>Pembayaran Registrasi:</strong> {{ $jadwal_gel1->regi }}
                                        </p> <br>
                                        <strong>Jalur Reguler 2</strong>
                                        <p>
                                            <strong>Pendaftaran:</strong> {{ $reguler2->daftar_buka }} <br>
                                            <strong>Pengecekan Kuota per-prodi:</strong> {{ $reguler2->pres_mum1 }}
                                            <br>
                                            <strong>Pengumuman Hasil:</strong> {{ $reguler2->pres_mum2 }} <br>
                                            <strong>Pembayaran Registrasi:</strong> {{ $reguler2->regi }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingGelombang2">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseGelombang2" aria-expanded="false"
                                        aria-controls="collapseGelombang2">
                                        <strong>Gelombang 2</strong>
                                    </button>
                                </h2>
                                <div id="collapseGelombang2"
                                    class="accordion-collapse collapse {{ $gelombang == 2 ? 'show' : '' }}"
                                    aria-labelledby="headingGelombang2" data-bs-parent="#accordionJadwalPendaftaran">
                                    <div class="accordion-body">
                                        <strong>Jalur Tes</strong>
                                        <p>
                                            <strong>Pendaftaran:</strong> {{ $jadwal_gel2->daftar_buka }} <br>
                                            <strong>Pelaksanaan Tes:</strong> {{ $jadwal_gel2->tes_lak }} <br>
                                            <strong>Pengumuman Hasil:</strong> {{ $jadwal_gel2->tes_mum }} <br>
                                            <strong>Pembayaran Registrasi:</strong> {{ $jadwal_gel2->regi }}
                                        </p> <br>
                                        <strong>Jalur Prestasi</strong>
                                        <p>
                                            <strong>Pendaftaran:</strong> {{ $jadwal_gel2->daftar_buka }} <br>
                                            <strong>Pengumuman Hasil:</strong> {{ $jadwal_gel2->pres_mum1 }} <br>
                                            <strong>Pembayaran Registrasi:</strong> {{ $jadwal_gel2->regi }}
                                        </p> <br>
                                        <strong>Jalur Reguler 2</strong>
                                        <p>
                                            <strong>Pendaftaran:</strong> {{ $reguler2->daftar_buka }} <br>
                                            <strong>Pengecekan Kuota per-prodi:</strong> {{ $reguler2->pres_mum1 }}
                                            <br>
                                            <strong>Pengumuman Hasil:</strong> {{ $reguler2->pres_mum2 }} <br>
                                            <strong>Pembayaran Registrasi:</strong> {{ $reguler2->regi }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingGelombang3">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseGelombang3" aria-expanded="false"
                                        aria-controls="collapseGelombang3">
                                        <strong>Gelombang 3</strong>
                                    </button>
                                </h2>
                                <div id="collapseGelombang3"
                                    class="accordion-collapse collapse {{ $gelombang == 3 ? 'show' : '' }}"
                                    aria-labelledby="headingGelombang3" data-bs-parent="#accordionJadwalPendaftaran">
                                    <div class="accordion-body">
                                        <strong>Jalur Tes</strong>
                                        <p>
                                            <strong>Pendaftaran:</strong> {{ $jadwal_gel3->daftar_buka }} <br>
                                            <strong>Pelaksanaan Tes:</strong> {{ $jadwal_gel3->tes_lak }} <br>
                                            <strong>Pengumuman Hasil:</strong> {{ $jadwal_gel3->tes_mum }} <br>
                                            <strong>Pembayaran Registrasi:</strong> {{ $jadwal_gel3->regi }}
                                        </p> <br>
                                        <strong>Jalur Prestasi</strong>
                                        <p>
                                            <strong>Pendaftaran:</strong> {{ $jadwal_gel3->daftar_buka }} <br>
                                            <strong>Pengumuman Hasil:</strong> {{ $jadwal_gel3->pres_mum1 }} <br>
                                            <strong>Pembayaran Registrasi:</strong> {{ $jadwal_gel3->regi }}
                                        </p> <br>
                                        <strong>Jalur Reguler 2</strong>
                                        <p>
                                            <strong>Pendaftaran:</strong> {{ $reguler2->daftar_buka }} <br>
                                            <strong>Pengecekan Kuota per-prodi:</strong> {{ $reguler2->pres_mum1 }}
                                            <br>
                                            <strong>Pengumuman Hasil:</strong> {{ $reguler2->pres_mum2 }} <br>
                                            <strong>Pembayaran Registrasi:</strong> {{ $reguler2->regi }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End Section Title -->
    </section>
    <!-- About Section -->
    <section id="syarat" class="about section">

        <div class="container">

            <div class="row gy-4 gx-5">

                {{--  <div class="col-lg-6 position-relative align-self-start" data-aos="fade-up" data-aos-delay="200">
                        <img src="{{ asset('') }}landing/img/3.jpg" class="img-fluid" alt="">
                        {{-- <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox pulsating-play-btn"></a> 
                    </div> --}}

                <div class="col-lg-12 content" data-aos="fade-up" data-aos-delay="100">
                    <h3>Syarat Pendaftaran</h3>
                    <p>
                        Yuk, pastikan Anda telah memenuhi semua syarat pendaftaran dengan lengkap dan akurat.
                        Dengan demikian, proses pendaftaran Anda akan berjalan lancar dan mudah.
                    </p>
                    <table class="table table-bordered" style="width: 100%; text-align: left;">
                        <tbody>
                            <tr>
                                <td style="padding-bottom: 5px; text-align: center; vertical-align: middle;">
                                    <i style="color: green;" class="fas fa-trophy"></i>
                                    Jalur Prestasi
                                </td>
                                <td style="padding-bottom: 5px;">
                                    <ol style="padding-left: 20px;">
                                        <li>Foto 4 x 6</li>
                                        <li>Ijazah</li>
                                        <li>Kartu Tanda Penduduk (KTP)</li>
                                        <li>Surat Keterangan Lulus (Ijazah Belum Terbit)</li>
                                        <li>Surat Keterangan Kelakuan Baik/SKKB (Dari Sekolah)</li>
                                        <li>Kartu Keluarga</li>
                                        <li>Akta Kelahiran</li>
                                        <li>Nilai Rapor Semester 1 s/d 4 (Prestasi Akademik)</li>
                                        <li>Sertifikat/Piagam (Prestasi Non Akademik)</li>
                                    </ol>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-bottom: 5px; text-align: center; vertical-align: middle;">
                                    <i style="color: green;" class="fas fa-pencil-alt"></i>
                                    Jalur Tes
                                </td>
                                <td style="padding-bottom: 5px;">
                                    <ol style="padding-left: 20px;">
                                        <li>Foto 4 x 6</li>
                                        <li>Ijazah</li>
                                        <li>Kartu Tanda Penduduk (KTP)</li>
                                        <li>Surat Keterangan Lulus (Ijazah Belum Terbit)</li>
                                        <li>Surat Keterangan Kelakuan Baik/SKKB (Dari Sekolah)</li>
                                        <li>Kartu Keluarga (KK)</li>
                                        <li>Akta Kelahiran</li>
                                        <li>Nilai Rapor Semester 1 s/d 4 (Prestasi Akademik)</li>
                                        <li>Sertifikat/Piagam (Prestasi Non Akademik)</li>
                                        <li>Bukti Pembayaran Ujian</li>
                                    </ol>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-bottom: 5px; text-align: center; vertical-align: middle;">
                                    <i style="color: green;" class="fas fa-users"></i>
                                    Jalur Reguler 2
                                </td>
                                <td style="padding-bottom: 5px;">
                                    <ol style="padding-left: 20px;">
                                        <li>Foto 4 x 6</li>
                                        <li>Ijazah</li>
                                        <li>Kartu Tanda Penduduk (KTP)</li>
                                        <li>Surat Keterangan Kelakuan Baik (SKCK)</li>
                                        <li>Kartu Keluarga</li>
                                        <li>Akta Kelahiran</li>
                                    </ol>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>

            </div>

        </div>

    </section><!-- /About Section -->

    <!-- Stats Section -->
    <section id="stats" class="stats section light-background">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">

                <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
                    <i class="fa-regular fa-hospital"></i>
                    <div class="stats-item">
                        <span data-purecounter-start="0" data-purecounter-end="9" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Program Studi</p>
                    </div>
                </div><!-- End Stats Item -->

                <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
                    <i class="fa-solid fa-user-doctor"></i>
                    <div class="stats-item">
                        <span data-purecounter-start="0" data-purecounter-end="1883" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Mahasiswa Aktif</p>
                    </div>
                </div><!-- End Stats Item -->

                <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
                    <i class="fas fa-flask"></i>
                    <div class="stats-item">
                        <span data-purecounter-start="0" data-purecounter-end="1268" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Lulusan</p>
                    </div>
                </div><!-- End Stats Item -->

                <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
                    <i class="fas fa-award"></i>
                    <div class="stats-item">
                        <span data-purecounter-start="0" data-purecounter-end="150" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Penghargaan</p>
                    </div>
                </div><!-- End Stats Item -->

            </div>

        </div>

    </section><!-- End Stats Section -->

    <!-- Services Section -->
    <section id="alur" class="services section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Alur Pendaftaran</h2>
            <p>Alur pendaftaran ini diharapkan dapat membantu calon mahasiswa memahami tahapan-tahapan yang harus
                dilakukan dalam proses pendaftaran.</p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row gy-4">
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-item  position-relative">
                        <div class="icon">
                            <i class="fas fa-1"></i>
                        </div>
                        <a href="/register" target="_blank" class="stretched-link">
                            <h3>Daftar Akun PMB</h3>
                        </a>
                        <p>Daftarkan akun PMB di website PMB Persada Khatulistiwa dengan email dan nomor whatsapp aktif.
                            Klik disini
                            untuk daftar.</p>
                    </div>
                </div><!-- End Service Item -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-item position-relative">
                        <div class="icon">
                            <i class="fas fa-2"></i>
                        </div>
                        <a href="#" class="stretched-link">
                            <h3>Lihat Password PMB</h3>
                        </a>
                        <p>Jika kamu sudah mendaftar, maka kamu akan menerima password di email dan whatsapp kamu.</p>
                    </div>
                </div><!-- End Service Item -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="service-item position-relative">
                        <div class="icon">
                            <i class="fas fa-3"></i>
                        </div>
                        <a href="/login" class="stretched-link">
                            <h3>Login atau Masuk</h3>
                        </a>
                        <p>Silahkan login dengan password yang sudah kamu dapatkan di email dan whatsapp kamu. Gunakan
                            email yang sudah didaftarkan dan juga password yang sudah kamu dapatkan. Jika sudah masuk
                            atau login, kamu akan diarahkan kehalaman informasi data kamu.</p>
                    </div>
                </div><!-- End Service Item -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="service-item position-relative">
                        <div class="icon">
                            <i class="fas fa-4"></i>
                        </div>
                        <a href="#" class="stretched-link">
                            <h3>Bayar Uang Pendaftaran</h3>
                        </a>
                        <p>Silahkan tekan tombol lanjutkan di kanan bawah. Lalu tekan tombol bayar sekarang. Kamu bebas
                            ingin membayar lewat apa sesuai dengan pilihan pembayaran pada sistem.</p>
                        <a href="#" class="stretched-link"></a>
                    </div>
                </div><!-- End Service Item -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
                    <div class="service-item position-relative">
                        <div class="icon">
                            <i class="fas fa-5"></i>
                        </div>
                        <a href="#" class="stretched-link">
                            <h3>Isi Formulir Pendaftaran</h3>
                        </a>
                        <p>Jika pembayaran kamu sudah valid, maka kamu tekan tombol lanjutkan. Kamu akan diarahkan ke
                            halaman formulir pendaftaran. Formulir pendaftaran harus diisi dengan benar. Jika sudah
                            tekan tombol lanjutkan di kanan bawah sampai semua formulir di isi. </p>
                    </div>
                </div><!-- End Service Item -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
                    <div class="service-item position-relative">
                        <div class="icon">
                            <i class="fas fa-6"></i>
                        </div>
                        <a href="#" class="stretched-link">
                            <h3>Upload Berkas</h3>
                        </a>
                        <p>Pada formulir terakhir kamu akan diarahkan ke formulir upload berkas. Silahkan upload berkas
                            kamu sampai selesai. </p>
                    </div>
                </div><!-- End Service Item -->
            </div>

        </div>

    </section><!-- End Services Section -->

    <!-- Departments Section -->
    <section id="biaya" class="departments section light-background">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Biaya Pendaftaran</h2>
            <p>Informasi mengenai biaya pendaftaran untuk berbagai jalur yang tersedia di STKIP Persada Khatulistiwa.
            </p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 50%">Jalur</th>
                                    <th class="text-center">Biaya Pendaftaran</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Prestasi</td>
                                    <td>Rp 250.000</td>
                                </tr>
                                <tr>
                                    <td>Tes</td>
                                    <td>Rp 300.000</td>
                                </tr>
                                <tr>
                                    <td>Reguler 2</td>
                                    <td>Rp 300.000</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </section><!-- End Departments Section -->

    <!-- Faq Section -->
    {{-- <section id="faq" class="faq section light-background">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Frequently Asked Questions</h2>
            <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row justify-content-center">

                <div class="col-lg-10" data-aos="fade-up" data-aos-delay="100">

                    <div class="faq-container">

                        <div class="faq-item faq-active">
                            <h3>Non consectetur a erat nam at lectus urna duis?</h3>
                            <div class="faq-content">
                                <p>Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus
                                    laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor
                                    rhoncus dolor purus non.</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                        <div class="faq-item">
                            <h3>Feugiat scelerisque varius morbi enim nunc faucibus?</h3>
                            <div class="faq-content">
                                <p>Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id
                                    interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus
                                    scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim.
                                    Mauris ultrices eros in cursus turpis massa tincidunt dui.</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                        <div class="faq-item">
                            <h3>Dolor sit amet consectetur adipiscing elit pellentesque?</h3>
                            <div class="faq-content">
                                <p>Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci.
                                    Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl
                                    suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis
                                    convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
                                </p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                        <div class="faq-item">
                            <h3>Ac odio tempor orci dapibus. Aliquam eleifend mi in nulla?</h3>
                            <div class="faq-content">
                                <p>Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id
                                    interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus
                                    scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim.
                                    Mauris ultrices eros in cursus turpis massa tincidunt dui.</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                        <div class="faq-item">
                            <h3>Tempus quam pellentesque nec nam aliquam sem et tortor?</h3>
                            <div class="faq-content">
                                <p>Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse
                                    in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl
                                    suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in
                                </p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                        <div class="faq-item">
                            <h3>Perspiciatis quod quo quos nulla quo illum ullam?</h3>
                            <div class="faq-content">
                                <p>Enim ea facilis quaerat voluptas quidem et dolorem. Quis et consequatur non sed
                                    in suscipit sequi. Distinctio ipsam dolore et.</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                    </div>

                </div><!-- End Faq Column-->

            </div>

        </div>

    </section><!-- /Faq Section --> --}}

    <!-- Testimonials Section -->
    {{-- <section id="testimonials" class="testimonials section">

        <div class="container">

            <div class="row align-items-center">

                <div class="col-lg-5 info" data-aos="fade-up" data-aos-delay="100">
                    <h3>Testimonials</h3>
                    <p>
                        Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                        reprehenderit in voluptate
                        velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident.
                    </p>
                </div>

                <div class="col-lg-7" data-aos="fade-up" data-aos-delay="200">

                    <div class="swiper init-swiper">
                        <script type="application/json" class="swiper-config">
                {
                  "loop": true,
                  "speed": 600,
                  "autoplay": {
                    "delay": 5000
                  },
                  "slidesPerView": "auto",
                  "pagination": {
                    "el": ".swiper-pagination",
                    "type": "bullets",
                    "clickable": true
                  }
                }
              </script>
                        <div class="swiper-wrapper">

                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    <div class="d-flex">
                                        <img src="{{ asset('') }}landing/img/testimonials/testimonials-1.jpg"
                                            class="testimonial-img flex-shrink-0" alt="">
                                        <div>
                                            <h3>Saul Goodman</h3>
                                            <h4>Ceo &amp; Founder</h4>
                                            <div class="stars">
                                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                    class="bi bi-star-fill"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p>
                                        <i class="bi bi-quote quote-icon-left"></i>
                                        <span>Proin iaculis purus consequat sem cure digni ssim donec porttitora
                                            entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam
                                            eget nibh et. Maecen aliquam, risus at semper.</span>
                                        <i class="bi bi-quote quote-icon-right"></i>
                                    </p>
                                </div>
                            </div><!-- End testimonial item -->

                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    <div class="d-flex">
                                        <img src="{{ asset('') }}landing/img/testimonials/testimonials-2.jpg"
                                            class="testimonial-img flex-shrink-0" alt="">
                                        <div>
                                            <h3>Sara Wilsson</h3>
                                            <h4>Designer</h4>
                                            <div class="stars">
                                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                    class="bi bi-star-fill"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p>
                                        <i class="bi bi-quote quote-icon-left"></i>
                                        <span>Export tempor illum tamen malis malis eram quae irure esse labore quem
                                            cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua
                                            noster fugiat irure amet legam anim culpa.</span>
                                        <i class="bi bi-quote quote-icon-right"></i>
                                    </p>
                                </div>
                            </div><!-- End testimonial item -->

                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    <div class="d-flex">
                                        <img src="{{ asset('') }}landing/img/testimonials/testimonials-3.jpg"
                                            class="testimonial-img flex-shrink-0" alt="">
                                        <div>
                                            <h3>Jena Karlis</h3>
                                            <h4>Store Owner</h4>
                                            <div class="stars">
                                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                    class="bi bi-star-fill"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p>
                                        <i class="bi bi-quote quote-icon-left"></i>
                                        <span>Enim nisi quem export duis labore cillum quae magna enim sint quorum
                                            nulla quem veniam duis minim tempor labore quem eram duis noster aute
                                            amet eram fore quis sint minim.</span>
                                        <i class="bi bi-quote quote-icon-right"></i>
                                    </p>
                                </div>
                            </div><!-- End testimonial item -->

                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    <div class="d-flex">
                                        <img src="{{ asset('') }}landing/img/testimonials/testimonials-4.jpg"
                                            class="testimonial-img flex-shrink-0" alt="">
                                        <div>
                                            <h3>Matt Brandon</h3>
                                            <h4>Freelancer</h4>
                                            <div class="stars">
                                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                    class="bi bi-star-fill"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p>
                                        <i class="bi bi-quote quote-icon-left"></i>
                                        <span>Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos
                                            export minim fugiat minim velit minim dolor enim duis veniam ipsum anim
                                            magna sunt elit fore quem dolore labore illum veniam.</span>
                                        <i class="bi bi-quote quote-icon-right"></i>
                                    </p>
                                </div>
                            </div><!-- End testimonial item -->

                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    <div class="d-flex">
                                        <img src="{{ asset('') }}landing/img/testimonials/testimonials-5.jpg"
                                            class="testimonial-img flex-shrink-0" alt="">
                                        <div>
                                            <h3>John Larson</h3>
                                            <h4>Entrepreneur</h4>
                                            <div class="stars">
                                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                    class="bi bi-star-fill"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p>
                                        <i class="bi bi-quote quote-icon-left"></i>
                                        <span>Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam
                                            tempor noster veniam enim culpa labore duis sunt culpa nulla illum
                                            cillum fugiat legam esse veniam culpa fore nisi cillum quid.</span>
                                        <i class="bi bi-quote quote-icon-right"></i>
                                    </p>
                                </div>
                            </div><!-- End testimonial item -->

                        </div>
                        <div class="swiper-pagination"></div>
                    </div>

                </div>

            </div>

        </div>

    </section><!-- /Testimonials Section --> --}}

    <!-- Gallery Section -->
    {{-- <section id="gallery" class="gallery section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Gallery</h2>
            <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
        </div><!-- End Section Title -->

        <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">

            <div class="row g-0">

                <div class="col-lg-3 col-md-4">
                    <div class="gallery-item">
                        <a href="{{ asset('') }}landing/img/gallery/gallery-1.jpg" class="glightbox"
                            data-gallery="images-gallery">
                            <img src="{{ asset('') }}landing/img/gallery/gallery-1.jpg" alt=""
                                class="img-fluid">
                        </a>
                    </div>
                </div><!-- End Gallery Item -->

                <div class="col-lg-3 col-md-4">
                    <div class="gallery-item">
                        <a href="{{ asset('') }}landing/img/gallery/gallery-2.jpg" class="glightbox"
                            data-gallery="images-gallery">
                            <img src="{{ asset('') }}landing/img/gallery/gallery-2.jpg" alt=""
                                class="img-fluid">
                        </a>
                    </div>
                </div><!-- End Gallery Item -->

                <div class="col-lg-3 col-md-4">
                    <div class="gallery-item">
                        <a href="{{ asset('') }}landing/img/gallery/gallery-3.jpg" class="glightbox"
                            data-gallery="images-gallery">
                            <img src="{{ asset('') }}landing/img/gallery/gallery-3.jpg" alt=""
                                class="img-fluid">
                        </a>
                    </div>
                </div><!-- End Gallery Item -->

                <div class="col-lg-3 col-md-4">
                    <div class="gallery-item">
                        <a href="{{ asset('') }}landing/img/gallery/gallery-4.jpg" class="glightbox"
                            data-gallery="images-gallery">
                            <img src="{{ asset('') }}landing/img/gallery/gallery-4.jpg" alt=""
                                class="img-fluid">
                        </a>
                    </div>
                </div><!-- End Gallery Item -->

                <div class="col-lg-3 col-md-4">
                    <div class="gallery-item">
                        <a href="{{ asset('') }}landing/img/gallery/gallery-5.jpg" class="glightbox"
                            data-gallery="images-gallery">
                            <img src="{{ asset('') }}landing/img/gallery/gallery-5.jpg" alt=""
                                class="img-fluid">
                        </a>
                    </div>
                </div><!-- End Gallery Item -->

                <div class="col-lg-3 col-md-4">
                    <div class="gallery-item">
                        <a href="{{ asset('') }}landing/img/gallery/gallery-6.jpg" class="glightbox"
                            data-gallery="images-gallery">
                            <img src="{{ asset('') }}landing/img/gallery/gallery-6.jpg" alt=""
                                class="img-fluid">
                        </a>
                    </div>
                </div><!-- End Gallery Item -->

                <div class="col-lg-3 col-md-4">
                    <div class="gallery-item">
                        <a href="{{ asset('') }}landing/img/gallery/gallery-7.jpg" class="glightbox"
                            data-gallery="images-gallery">
                            <img src="{{ asset('') }}landing/img/gallery/gallery-7.jpg" alt=""
                                class="img-fluid">
                        </a>
                    </div>
                </div><!-- End Gallery Item -->

                <div class="col-lg-3 col-md-4">
                    <div class="gallery-item">
                        <a href="{{ asset('') }}landing/img/gallery/gallery-8.jpg" class="glightbox"
                            data-gallery="images-gallery">
                            <img src="{{ asset('') }}landing/img/gallery/gallery-8.jpg" alt=""
                                class="img-fluid">
                        </a>
                    </div>
                </div><!-- End Gallery Item -->

            </div>

        </div>

    </section><!-- /Gallery Section --> --}}

    <!-- Contact Section -->
    <section id="kontak" class="contact section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Kontak</h2>
            <p>Informasi kontak dan alamat STKIP Persada Khatulistiwa</p>
        </div><!-- End Section Title -->

        <div class="mb-5" data-aos="fade-up" data-aos-delay="200">
            <iframe style="border:0; width: 100%; height: 270px;"
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14774.789431949983!2d111.4794564!3d0.0538913!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31fe21386fed864f%3A0xa775a01ca2476eae!2sSTKIP%20Persada%20Khatulistiwa%20Sintang!5e1!3m2!1sid!2sid!4v1733113507980!5m2!1sid!2sid"
                frameborder="0" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div><!-- End Google Maps -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">

                <div class="col-lg-12">
                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                        <i class="bi bi-geo-alt flex-shrink-0"></i>
                        <div>
                            <h3>Alamat</h3>
                            <p>Jl. Pertamina, KM 4 Sengkuang, Sintang, Kalimantan Barat.</p>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                        <i class="bi bi-telephone flex-shrink-0"></i>
                        <div>
                            <h3>Hubungi Kami</h3>
                            <p>+62 821-5596-4080</p>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="500">
                        <i class="bi bi-envelope flex-shrink-0"></i>
                        <div>
                            <h3>Email Kami</h3>
                            <p>persada@persadakhatulistiwa.ac.id</p>
                        </div>
                    </div><!-- End Info Item -->

                </div>
            </div>

        </div>

    </section><!-- /Contact Section -->

</main>
@include('layouts.landing.footer')
