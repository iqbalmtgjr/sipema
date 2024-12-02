@extends('layouts.master')
@section('content')
    @if (isset($regis) && $regis == true)
        <div class="text-center alert alert-success" role="alert">
            <strong>Klik dibawah ini untuk mendaftar PKKMB 2024</strong> <br>
            <a class="btn btn-primary btn-sm" href="#" data-toggle="modal" data-target="#pkkmb"><strong>Daftar
                    PKKMB</strong></a>
        </div>
        <div class="modal fade" id="pkkmb" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Daftar PKKMB</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('postPkkmb') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="provinsi">Provinsi:</label>
                                <input type="text" class="form-control @error('provinsi') is-invalid @enderror"
                                    id="provinsi" name="provinsi" placeholder="Contoh: Kalimantan Barat">
                                @error('provinsi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="instagram">Instagram:</label>
                                <input type="text" class="form-control" id="instagram" name="instagram"
                                    placeholder="Masukkan Instagram Anda">
                            </div>
                            <div class="form-group">
                                <label for="facebook">Facebook:</label>
                                <input type="text" class="form-control" id="facebook" name="facebook"
                                    placeholder="Masukkan Facebook Anda">
                            </div>
                            <div class="form-group">
                                <label for="tiktok">Tiktok:</label>
                                <input type="text" class="form-control" id="tiktok" name="tiktok"
                                    placeholder="Masukkan Tiktok Anda">
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @else
        @if ($data->metode_bayar != null && $data->valid_bayar == 2)
            <div class="text-center alert alert-success" role="alert">
                Status Pembayaran <br> <strong> Sudah Divalidasi! </strong> <br>
                <a class="btn btn-secondary btn-sm" href="https://chat.whatsapp.com/I6rVyHgbNzULLoymOiZFqq"><span
                        class="fab fa-whatsapp text-success"></span> <strong>Klik Disini Untuk Bergabung Grup
                        PMB</strong></a>
            </div>
        @elseif($data->metode_bayar != null && $data->valid_bayar == 3)
            <div class="text-center alert alert-danger" role="alert">
                Status Pembayaran <br> <strong> Tidak Valid! </strong> <br> Pembayaran tidak cocok direkening
                koran STKIP Persada Khatulistiwa. <br> Hubungi panitia PMB STKIP Persada Khatulistiwa Sintang
            </div>
        @endif
    @endif
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Informasi Pendaftaran, Persyaratan dan Pembayaran PMB</h1>
        <a download href="{{ asset('assets/img/brosur.jpg') }}"
            class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Download
            Brosur</a>
    </div>
    <div class="card">
        <div class="card-header text-white text-center">
            <div class="row">
                <div class="col">
                    <ul class="nav nav-pills card-header-pills">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="pill" href="#tabprestasi">Jalur Prestasi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="#tabtes">Jalur Tes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="#tabreg2">Jalur Reguler 2</a>
                        </li>
                    </ul>
                </div>
                {{-- <div class="col">
                    <a href="{{ url('info') }}" class="btn btn-success btn-md float-right">Lanjut Pendaftaran <i
                            class="fas fa-arrow-right"></i></a>
                </div> --}}
            </div>
        </div>
        <div class="card-body">
            <div class="tab-content">
                <div class="tab-pane fade show active mb-5" id="tabprestasi">
                    <h3 class="card-title text-center text-primary"><strong>Jalur Prestasi</strong></h3>
                    <div>
                        <h5><strong>Jadwal</strong></h5>
                        <div>
                            <table>
                                <tbody>
                                    <tr>
                                        <td>Pendaftaran Jalur Prestasi Gelombang I</td>
                                        <td></td>
                                        <td>: 1 Desember 2023 - 30 Maret 2024</td>
                                    </tr>
                                    <tr>
                                        <td>Pengumuman Penerimaan Jalur Prestasi Gelombang I</td>
                                        <td></td>
                                        <td>: 4 April 2024</td>
                                    </tr>
                                    <tr>
                                        <td>Registrasi Jalur Prestasi Gelombang I</td>
                                        <td></td>
                                        <td>: 11 - 25 April 2024</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-5">
                            <table>
                                <tbody>
                                    <tr>
                                        <td>Pendaftaran Jalur Prestasi Gelombang II</td>
                                        <td></td>
                                        <td>: 1 April - 29 Juni 2024</td>
                                    </tr>
                                    <tr>
                                        <td>Pengumuman I Penerimaan Jalur Prestasi Gelombang II</td>
                                        <td></td>
                                        <td>: 15 Mei 2024</td>
                                    </tr>
                                    <tr>
                                        <td>Pengumuman II Penerimaan Jalur Prestasi Gelombang II</td>
                                        <td></td>
                                        <td>: 11 Juli 2024</td>
                                    </tr>
                                    <tr>
                                        <td>Registrasi Jalur Prestasi Gelombang II</td>
                                        <td></td>
                                        <td>: 12 - 26 Juli 2024</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-5">
                            <table>
                                <tbody>
                                    <tr>
                                        <td>Pendaftaran Jalur Prestasi Gelombang III</td>
                                        <td></td>
                                        <td>: 1 Juli - 24 Agustus 2024</td>
                                    </tr>
                                    <tr>
                                        <td>Pengumuman I Penerimaan Jalur Prestasi Gelombang III</td>
                                        <td></td>
                                        <td>: 31 Juli 2024</td>
                                    </tr>
                                    <tr>
                                        <td>Pengumuman II Penerimaan Jalur Prestasi Gelombang III</td>
                                        <td></td>
                                        <td>: 30 Agustus 2024</td>
                                    </tr>
                                    <tr>
                                        <td>Registrasi Jalur Prestasi Gelombang III</td>
                                        <td></td>
                                        <td>: 31 Agustus - 7 September 2024</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="mt-5">
                        <h5><strong>Persyaratan</strong></h5>
                        <ol>
                            <li>Foto 4 x 6</li>
                            <li>Ijazah</li>
                            <li>Kartu Tanda Penduduk (KTP)</li>
                            <li>Surat Keterangan Lulus (Ijazah Belum Terbit)</li>
                            <li>Surat Keterangan Kelakuan Baik/SKKB (Dikeluarkan Pihak Sekolah)</li>
                            <li>Kartu Keluarga</li>
                            <li>Akta Kelahiran</li>
                            <li>Nilai Rapor Semester 1 s/d Semester 4 (Prestasi Akademik)</li>
                            <li>Sertifikat/Piagam (Prestasi Non Akademik)</li>
                        </ol>
                    </div>
                    <div class="mt-5">
                        <h5><strong>Pembayaran</strong></h5>
                        <ul>
                            <li>Biaya Registrasi <strong>Rp. {{ rupiah($biaya[0]->prestasi_biaya) }}</strong></li>
                            <li>Biaya Pengembangan Kampus <strong>Rp.
                                    {{ rupiah($biaya[1]->prestasi_biaya) }}</strong></li>
                            <li>Biaya Kuliah (SPP Tetap <strong>Rp.
                                    {{ rupiah($biaya[2]->prestasi_biaya) }}</strong>/Semester dan SKS <strong>Rp.
                                    {{ rupiah($biaya[3]->prestasi_biaya) }}</strong>/SKS)</li>
                        </ul>
                    </div>
                </div>
                <div class="tab-pane fade mb-5" id="tabtes">
                    <h3 class="card-title text-center text-primary"><strong>Jalur Tes</strong></h3>
                    <div>
                        <h5><strong>Jadwal</strong></h5>
                        <div>
                            <table>
                                <tbody>
                                    <tr>
                                        <td>Pendaftaran Jalur Tes Gelombang I</td>
                                        <td></td>
                                        <td>: 1 Desember 2023 - 30 Maret 2024</td>
                                    </tr>
                                    <tr>
                                        <td>Pelaksanaan Tes Gelombang I</td>
                                        <td></td>
                                        <td>: 1 - 8 April 2024</td>
                                    </tr>
                                    <tr>
                                        <td>Pengumuman Penerimaan Jalur Tes Gelombang I</td>
                                        <td></td>
                                        <td>: 10 April 2024</td>
                                    </tr>
                                    <tr>
                                        <td>Registrasi Jalur Tes Gelombang I</td>
                                        <td></td>
                                        <td>: 11 - 25 April 2024</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-5">
                            <table>
                                <tbody>
                                    <tr>
                                        <td>Pendaftaran Jalur Tes Gelombang II</td>
                                        <td></td>
                                        <td>: 1 April - 29 Juni 2024</td>
                                    </tr>
                                    <tr>
                                        <td>Pelaksanaan Tes Gelombang II</td>
                                        <td></td>
                                        <td>: 1 - 8 Juli 2024</td>
                                    </tr>
                                    <tr>
                                        <td>Pengumuman Penerimaan Jalur Tes Gelombang II</td>
                                        <td></td>
                                        <td>: 11 Juli 2024</td>
                                    </tr>
                                    <tr>
                                        <td>Registrasi Jalur Tes Gelombang II</td>
                                        <td></td>
                                        <td>: 12 - 26 Juli 2024</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-5">
                            <table>
                                <tbody>
                                    <tr>
                                        <td>Pendaftaran Jalur Tes Gelombang III</td>
                                        <td></td>
                                        <td>: 1 Juli - 24 Agustus 2024</td>
                                    </tr>
                                    <tr>
                                        <td>Pelaksanaan Tes Gelombang III</td>
                                        <td></td>
                                        <td>: 26 - 29 Agustus 2024</td>
                                    </tr>
                                    <tr>
                                        <td>Pengumuman Penerimaan Jalur Tes Gelombang III</td>
                                        <td></td>
                                        <td>: 30 Agustus 2024</td>
                                    </tr>
                                    <tr>
                                        <td>Registrasi Jalur Tes Gelombang III</td>
                                        <td></td>
                                        <td>: 31 Agustus - 7 September 2024</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="mt-5">
                        <h5><strong>Persyaratan</strong></h5>
                        <ol>
                            <li>Foto 4 x 6</li>
                            <li>Ijazah</li>
                            <li>Kartu Tanda Penduduk (KTP)</li>
                            <li>Surat Keterangan Lulus (Ijazah Belum Terbit)</li>
                            <li>Surat Keterangan Kelakuan Baik/SKKB (Dikeluarkan Pihak Sekolah)</li>
                            <li>Kartu Keluarga</li>
                            <li>Akta Kelahiran</li>
                        </ol>
                    </div>
                    <div class="mt-5">
                        <h5><strong>Pembayaran</strong></h5>
                        <ul>
                            <li>Biaya Registrasi <strong>Rp. {{ rupiah($biaya[0]->test_biaya) }}</strong></li>
                            <li>Biaya Pengembangan Kampus <strong>Rp.
                                    {{ rupiah($biaya[1]->test_biaya) }}</strong></li>
                            <li>Biaya Kuliah (SPP Tetap <strong>Rp.
                                    {{ rupiah($biaya[2]->test_biaya) }}</strong>/Semester dan SKS <strong>Rp.
                                    {{ rupiah($biaya[3]->test_biaya) }}</strong>/SKS)</li>
                        </ul>
                    </div>
                </div>
                <div class="tab-pane fade" id="tabreg2">
                    <h3 class="card-title text-center text-primary"><strong>Jalur Reguler II</strong></h3>
                    <div>
                        <h5><strong>Jadwal</strong></h5>
                        <div>
                            <table>
                                <tbody>
                                    <tr>
                                        <td>Pendaftaran</td>
                                        <td></td>
                                        <td>: 1 Desember 2023 - 17 Agustus 2024</td>
                                    </tr>
                                    <tr>
                                        <td>Pengecekan Kuota per-prodi</td>
                                        <td></td>
                                        <td>: 18 - 21 Agustus 2024</td>
                                    </tr>
                                    <tr>
                                        <td>Pengumuman Penerimaan (Bagi prodi yang memenuhi kuota)</td>
                                        <td></td>
                                        <td>: 23 Agustus 2024</td>
                                    </tr>
                                    <tr>
                                        <td>Registrasi</td>
                                        <td></td>
                                        <td>: 24 Agustus - 7 September 2024</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="mt-5">
                        <h5><strong>Persyaratan</strong></h5>
                        <ol>
                            <li>Foto 4 x 6</li>
                            <li>Ijazah</li>
                            <li>Surat Keterangan Catatan Kepolisian (SKCK)</li>
                            <li>Kartu Keluarga</li>
                            <li>Kartu Tanda Penduduk (KTP)</li>
                            <li>Akta Kelahiran</li>
                        </ol>
                    </div>
                    <div class="mt-5">
                        <h5><strong>Pembayaran</strong></h5>
                        <ul>
                            <li>Biaya Registrasi <strong>Rp. {{ rupiah($biaya[0]->reguler2_biaya) }}</strong></li>
                            <li>Biaya Pengembangan Kampus <strong>Rp.
                                    {{ rupiah($biaya[1]->reguler2_biaya) }}</strong></li>
                            <li>Biaya Kuliah (SPP Tetap <strong>Rp.
                                    {{ rupiah($biaya[2]->reguler2_biaya) }}</strong>/Semester dan SKS <strong>Rp.
                                    {{ rupiah($biaya[3]->reguler2_biaya) }}</strong>/SKS)</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="{{ url('info') }}" class="btn btn-success btn-sm float-right mt-3 mb-3">Lanjut Pendaftaran <i
            class="fas fa-arrow-right"></i></a>
    <?php
    function rupiah($angka)
    {
        $hasil_rupiah = number_format($angka, 0, ',', '.');
        return $hasil_rupiah;
    }
    ?>
@endsection
