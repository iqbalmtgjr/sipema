@extends('layouts.master')
@push('header')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@section('content')
    {{-- <h1 class="h3 mb-4 text-gray-800">Formulir Pendidikan</h1> --}}
    <div class="alert alert-info d-flex align-items-center" role="alert">
        <i class="fas fa-info-circle me-2"></i>&nbsp;&nbsp;&nbsp;
        <div>
            <strong>Info:</strong>
            Tanda bintang merah <span class="text-danger">*</span> pada formulir, berarti wajib di isi.
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h6 class="text-primary">Pendidikan Tertinggi Sebelumnya</h6>
        </div>
        <div class="card-body">
            <form action="{{ url('postPendidikan') }}" method="post">
                @csrf
                <div class="form-group row">
                    <label for="nama_sekolah" class="col-sm-2 col-form-label">Nama Sekolah<strong
                            style="color: red">*</strong></label>
                    <div class="col-sm-10">
                        <select class="form-control select2 @error('nama_sekolah') is-invalid @enderror" name="nama_sekolah"
                            data-placeholder="-- Cari Sekolah --" style="width: 100%;">
                            @foreach ($datasekolah as $item)
                                <option value="{{ $item->id_data_sekolah }}"
                                    @if ($data == true && $data->data_sekolah_id != null) {{ $data->data_sekolah_id == $item->id_data_sekolah ? 'selected' : '' }} @else {{ old('nama_sekolah') == $item->id_data_sekolah ? 'selected' : '' }} @endif>
                                    {{ $item->nama_sekolah }}
                                </option>
                            @endforeach
                        </select>
                        @error('nama_sekolah')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="alamat" class="col-sm-2 col-form-label">Jurusan<strong
                            style="color: red">*</strong></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control  @error('jurusan_sekolah') is-invalid @enderror"
                            id="alamat" name="jurusan_sekolah" placeholder="Jurusan Sekolah"
                            value="{{ $data == true && $data->jurusan_sekolah != null ? $data->jurusan_sekolah : old('jurusan_sekolah') }}">
                        @error('jurusan_sekolah')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="alamat" class="col-sm-2 col-form-label">Tahun Lulus<strong
                            style="color: red">*</strong></label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control  @error('tahun_lulus_sekolah') is-invalid @enderror"
                            id="alamat" name="tahun_lulus_sekolah" placeholder="Tahun Lulus Sekolah"
                            value="{{ $data == true && $data->tahun_lulus_sekolah != null ? $data->tahun_lulus_sekolah : old('tahun_lulus_sekolah') }}">
                        @error('tahun_lulus_sekolah')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="alamat" class="col-sm-2 col-form-label">Nomor IJAZAH</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control  @error('ijasah_sekolah') is-invalid @enderror"
                            id="alamat" name="ijasah_sekolah" placeholder="Nomor Ijazah Sekolah (Boleh Menyusul)"
                            value="{{ $data == true && $data->ijasah_sekolah != null ? $data->ijasah_sekolah : old('ijasah_sekolah') }}">
                        @error('ijasah_sekolah')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
        </div>
    </div>

    @if ($cekjalur->jalur == 'prestasi')
        <div class="card card-info mt-4">
            <div class="card-header">
                <h6 class="text-primary">Nilai Rapor</h6>
            </div>
            <div class="card-body">
                <p class="text-info">Silahkan masukkan nilai rapor dan upload foto nilai rapor per semester yang ditentukan
                    ke form input yang sudah
                    disediakan.</p>
                <form action="{{ url('postPendidikan') }}" method="post">
                    @csrf
                    <div class="form-group row">
                        <label for="namasekolah" class="col-sm-2 col-form-label">SEMESTER 1<strong
                                style="color: red">*</strong></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control  @error('nilai_satu') is-invalid @enderror"
                                id="namasekolah" name="nilai_satu" placeholder="Masukkan Nilai Rata-rata"
                                value="{{ $data == true && $data->nilai_satu != null ? $data->nilai_satu : old('nilai_satu') }}">
                            @error('nilai_satu')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-sm-5">
                            <a href="#" data-toggle="modal" data-target="#smt1" class="btn btn-success btn-md"><i
                                    class="fas fa-upload"></i> Upload</a>
                            @if (!empty($upload->semes_satu))
                                <a target="_blank" href="{{ asset('assets/berkas/rapor') . '/' . $upload->semes_satu }}"
                                    class="btn btn-info btn-md"><i class="fas fa-eye"></i></a>
                                <a download href="{{ asset('assets/berkas/rapor') . '/' . $upload->semes_satu }}"
                                    class="btn btn-warning btn-md"><i class="fas fa-file-download"></i></a>
                            @else
                                <strong class="text-danger">Belum diupload!</strong>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="namasekolah" class="col-sm-2 col-form-label">SEMESTER 2<strong
                                style="color: red">*</strong></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control  @error('nilai_dua') is-invalid @enderror"
                                id="namasekolah" name="nilai_dua" placeholder="Masukkan Nilai Rata-rata"
                                value="{{ $data == true && $data->nilai_dua != null ? $data->nilai_dua : old('nilai_dua') }}">
                            @error('nilai_dua')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-sm-5">
                            <a href="#" data-toggle="modal" data-target="#smt2" class="btn btn-success btn-md"><i
                                    class="fas fa-upload"></i> Upload</a>
                            @if (!empty($upload->semes_dua))
                                <a target="_blank" href="{{ asset('assets/berkas/rapor') . '/' . $upload->semes_dua }}"
                                    class="btn btn-info btn-md"><i class="fas fa-eye"></i></a>
                                <a download href="{{ asset('assets/berkas/rapor') . '/' . $upload->semes_dua }}"
                                    class="btn btn-warning btn-md"><i class="fas fa-file-download"></i></a>
                            @else
                                <strong class="text-danger">Belum diupload!</strong>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="namasekolah" class="col-sm-2 col-form-label">SEMESTER 3<strong
                                style="color: red">*</strong></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control  @error('nilai_tiga') is-invalid @enderror"
                                id="namasekolah" name="nilai_tiga" placeholder="Masukkan Nilai Rata-rata"
                                value="{{ $data == true && $data->nilai_tiga != null ? $data->nilai_tiga : old('nilai_tiga') }}">
                            @error('nilai_tiga')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-sm-5">
                            <a href="#" data-toggle="modal" data-target="#smt3" class="btn btn-success btn-md"><i
                                    class="fas fa-upload"></i> Upload</a>
                            @if (!empty($upload->semes_tiga))
                                <a target="_blank" href="{{ asset('assets/berkas/rapor') . '/' . $upload->semes_tiga }}"
                                    class="btn btn-info btn-md"><i class="fas fa-eye"></i></a>
                                <a download href="{{ asset('assets/berkas/rapor') . '/' . $upload->semes_tiga }}"
                                    class="btn btn-warning btn-md"><i class="fas fa-file-download"></i></a>
                            @else
                                <strong class="text-danger">Belum diupload!</strong>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="namasekolah" class="col-sm-2 col-form-label">SEMESTER 4<strong
                                style="color: red">*</strong></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control  @error('nilai_empat') is-invalid @enderror"
                                id="namasekolah" name="nilai_empat" placeholder="Masukkan Nilai Rata-rata"
                                value="{{ $data == true && $data->nilai_empat != null ? $data->nilai_empat : old('nilai_empat') }}">
                            @error('nilai_empat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-sm-5">
                            <a href="#" data-toggle="modal" data-target="#smt4" class="btn btn-success btn-md"><i
                                    class="fas fa-upload"></i> Upload</a>
                            @if (!empty($upload->semes_empat))
                                <a target="_blank" href="{{ asset('assets/berkas/rapor') . '/' . $upload->semes_empat }}"
                                    class="btn btn-info btn-md"><i class="fas fa-eye"></i></a>
                                <a download href="{{ asset('assets/berkas/rapor') . '/' . $upload->semes_empat }}"
                                    class="btn btn-warning btn-md"><i class="fas fa-file-download"></i></a>
                            @else
                                <strong class="text-danger">Belum diupload!</strong>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="namasekolah" class="col-sm-2 col-form-label">Piagam</label>
                        <div class="col-sm-10">
                            <a href="#" data-toggle="modal" data-target="#piagam"
                                class="btn btn-success btn-md"><i class="fas fa-upload"></i> Upload</a>
                            @if (!empty($upload->piagam))
                                <a target="_blank"
                                    href="{{ asset('assets/berkas/file_berkas') . '/' . $upload->piagam }}"
                                    class="btn btn-info btn-md"><i class="fas fa-eye"></i></a>
                                <a download href="{{ asset('assets/berkas/file_berkas') . '/' . $upload->piagam }}"
                                    class="btn btn-warning btn-md"><i class="fas fa-file-download"></i></a>
                            @else
                                <strong class="text-danger">Belum diupload!</strong>
                            @endif
                        </div>
                    </div>
            </div>
        </div>
    @endif
    <button type="submit" class="btn btn-primary btn-md float-right mt-3 mb-3">Simpan dan Lanjutkan</button>
    </form>
    @include('pendidikan.uploadsmt1')
    @include('pendidikan.uploadsmt2')
    @include('pendidikan.uploadsmt3')
    @include('pendidikan.uploadsmt4')
    @include('upload.piagam')
    @push('footer')
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            $(document).ready(function() {
                $('.select2').select2();
            });

            $(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $('#jenis_sekolah').on('change', function() {
                    let id_jenis_sekolah = $('#jenis_sekolah').val();
                })
            });
        </script>
    @endpush
@endsection
