@extends('layouts.master')
@section('content')
    @if ($cekputus == true && $cekputus->status_penerimaan == 1)
        <div class="text-center alert alert-success" role="alert">
            Selamat <br> <strong> Anda dinyatakan lulus di STKIP Persada Khatulistiwa Sintang! </strong>
        </div>
    @endif
    @if (auth()->user()->valid_bayar != 2)
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Ingin Ubah Jalur Pendaftaran?</h6>
            </div>
            <div class="card-body mb-4">
                <form action="{{ route('updateJalur') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="jalurPendaftaran">Pilih Jalur Pendaftaran</label>
                        <select class="form-control" id="jalurPendaftaran" name="jalurPendaftaran">
                            <option value="">-- Pilih Jalur --</option>
                            <option value="prestasi">Prestasi</option>
                            <option value="test">Tes</option>
                            <option value="reguler2">Reguler 2</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Ubah Jalur</button>
                </form>

            </div>
        </div>
    @endif
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Info Siswa</h6>
        </div>
        <div class="card-body">
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-4 col-form-label">Nomor Pendaftaran</label>
                <div class="col-sm-8">
                    <span class="form-control">{{ $data->ref }}</span>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-4 col-form-label">Jalur Pendaftaran</label>
                <div class="col-sm-8">
                    @if ($data->jalur == 'test')
                        <span class="form-control">Tes</span>
                    @elseif($data->jalur == 'prestasi')
                        <span class="form-control">Prestasi</span>
                    @else
                        <span class="form-control">Reguler 2</span>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-4 col-form-label">Nama</label>
                <div class="col-sm-8">
                    <span class="form-control">{{ $data->nama_siswa }}</span>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-4 col-form-label">NISN</label>
                <div class="col-sm-8">
                    <span class="form-control">{{ $data->nis_siswa }}</span>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-4 col-form-label">Program Studi Pilihan I</label>
                <div class="col-sm-8">
                    @if ($data->pilihan_satu == 1)
                        <span class="form-control">Pendidikan Bahasa dan Sastra Indonesia</span>
                    @elseif ($data->pilihan_satu == 2)
                        <span class="form-control">Pendidikan Matematika</span>
                    @elseif ($data->pilihan_satu == 3)
                        <span class="form-control">Pendidikan Ekonomi</span>
                    @elseif ($data->pilihan_satu == 4)
                        <span class="form-control">Pendidikan Pancasila dan Kewarganegaraan</span>
                    @elseif ($data->pilihan_satu == 5)
                        <span class="form-control">Pendidikan Komputer</span>
                    @elseif ($data->pilihan_satu == 6)
                        <span class="form-control">Pendidikan Biologi</span>
                    @elseif ($data->pilihan_satu == 7)
                        <span class="form-control">Pendidikan Anak Usia Dini</span>
                    @elseif ($data->pilihan_satu == 8)
                        <span class="form-control">Pendidikan Bahasa Inggris</span>
                    @else
                        <span class="form-control">Pendidikan Guru Sekolah Dasar</span>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-4 col-form-label">Program Studi Pilihan II</label>
                <div class="col-sm-8">
                    @if ($data->pilihan_dua == 1)
                        <span class="form-control">Pendidikan Bahasa dan Sastra Indonesia</span>
                    @elseif ($data->pilihan_dua == 2)
                        <span class="form-control">Pendidikan Matematika</span>
                    @elseif ($data->pilihan_dua == 3)
                        <span class="form-control">Pendidikan Ekonomi</span>
                    @elseif ($data->pilihan_dua == 4)
                        <span class="form-control">Pendidikan Pancasila dan Kewarganegaraan</span>
                    @elseif ($data->pilihan_dua == 5)
                        <span class="form-control">Pendidikan Komputer</span>
                    @elseif ($data->pilihan_dua == 6)
                        <span class="form-control">Pendidikan Biologi</span>
                    @elseif ($data->pilihan_dua == 7)
                        <span class="form-control">Pendidikan Anak Usia Dini</span>
                    @elseif ($data->pilihan_dua == 8)
                        <span class="form-control">Pendidikan Bahasa Inggris</span>
                    @else
                        <span class="form-control">Pendidikan Guru Sekolah Dasar</span>
                    @endif
                </div>
            </div>
            @if (auth()->user()->valid_bayar == '2')
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Status</label>
                    <div class="col-sm-8">
                        <span class="form-control text-success">Sudah Divalidasi</span>
                    </div>
                </div>
                <a class="btn btn-success btn-sm" href="https://chat.whatsapp.com/I6rVyHgbNzULLoymOiZFqq"><span
                        class="fab fa-whatsapp"></span> Klik Disini Untuk
                    Bergabung Ke Grup Mahasiswa Baru</a>
            @elseif (auth()->user()->valid_bayar == null)
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Status</label>
                    <div class="col-sm-8">
                        <span class="form-control text-danger">Belum Bayar</span>
                    </div>
                </div>
            @else
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Status</label>
                    <div class="col-sm-8">
                        <span class="form-control text-warning">Tidak dapat divalidasi! Hubungi panitia PMB</span>
                    </div>
                </div>
            @endif
        </div>
    </div>
    @if (auth()->user()->valid_bayar == 2 && $cekjalur->jalur == 'test')
        <a href="{{ url('infoTes') }}" class="btn btn-info btn-md">Lihat Informasi Tes Online</a>
        <a href="{{ url('calon') }}" class="btn btn-primary btn-md">Lanjutkan Pengisian Data</a>
    @elseif(auth()->user()->valid_bayar == 2 && $cekjalur->jalur == 'prestasi')
        <a href="{{ url('calon') }}" class="btn btn-primary btn-md float-right">Lanjutkan Pengisian Data</a>
    @endif
@endsection
