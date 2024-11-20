@extends('layouts.master')
@push('header')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h6 class="text-primary">ISI DATA TRANSAKSI</h6>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="form-group">
                        <label style=" font-style: italic; ">Isi data transaksi di bawah ini sesuai dengan slip atau struk
                            bank yang akan diupload.
                            Setelah data diisi lalu tekan tombol SIMPAN. Lalu perhatikan pada tabel DAFTAR PENGAJUAN
                            VALIDASI TRANSAKSI. Klik pada kolom <span class="text-success">Upload Bukti Transaksi</span>
                            untuk mengupload file slip/struk transaksi.
                        </label>
                    </div>
                    <form action="{{ url('postKonfirmasi') }}" method="post">
                        @csrf
                        <div class="form-group row">
                            <label for="nama_pengirim" class="col-sm-4 col-form-label">Nama Pengirim</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control @error('nama_pengirim') is-invalid @enderror"
                                    name="nama_pengirim" value="{{ old('nama_pengirim') }}" placeholder="Nama Pengirim">
                                @error('nama_pengirim')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="bank_pengirim" class="col-sm-4 col-form-label">Bank Pengirim</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control @error('bank_pengirim') is-invalid @enderror"
                                    name="bank_pengirim" value="{{ old('bank_pengirim') }}" placeholder="Bank Pengirim">
                                @error('bank_pengirim')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tanggal_transaksi" class="col-sm-4 col-form-label">Tanggal Transaksi</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control @error('tanggal_transaksi') is-invalid @enderror"
                                    name="tanggal_transaksi" value="{{ old('tanggal_transaksi') }}"
                                    placeholder="Contoh : 31/02/2021">
                                @error('tanggal_transaksi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jam_transaksi" class="col-sm-4 col-form-label">Jam Transaksi</label>
                            <div class="col-sm-8">
                                <input type="time" class="form-control @error('jam_transaksi') is-invalid @enderror"
                                    name="jam_transaksi" value="{{ old('jam_transaksi') }}" placeholder="Contoh : 07:31:27">
                                @error('jam_transaksi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="no_referensi" class="col-sm-4 col-form-label">Nomor Referensi</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control @error('no_referensi') is-invalid @enderror"
                                    name="no_referensi" value="{{ old('no_referensi') }}">
                                @error('no_referensi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jumlah_pembayaran" class="col-sm-4 col-form-label">Jumlah Pembayaran</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control @error('jumlah_pembayaran') is-invalid @enderror"
                                    name="jumlah_pembayaran" value="{{ old('jumlah_pembayaran') }}"
                                    placeholder="Contoh : 6660000">
                                <strong>Tanpa titik atau koma</strong>
                                @error('jumlah_pembayaran')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Rincian Pembayaran (<small>Pilih item pembayaran sesuai dengan jumlah uang yang dibayar.
                                    Item
                                    pembayaran dapat dipilih lebih dari satu</small>)</label>
                            <select class="select2 @error('detail_pembayaran') is-invalid @enderror" multiple
                                name="detail_pembayaran[]" data-placeholder="-- Pilih item pembayaran --"
                                style="width: 100%;">
                                @if (auth()->user()->jalur == 'test')
                                    @for ($i = 0; $i < 3; $i++)
                                        <option value="{{ $biaya[$i]->id_biayakuliahpmb }}">
                                            {{ $biaya[$i]->item_biaya . ' (Rp. ' . number_format($biaya[$i]->test_biaya, '2', ',', '.') . ')' }}
                                        </option>
                                    @endfor
                                @else
                                    @for ($i = 0; $i < 3; $i++)
                                        <option value="{{ $biaya[$i]->id_biayakuliahpmb }}">
                                            {{ $biaya[$i]->item_biaya . ' (Rp. ' . number_format($biaya[$i]->prestasi_biaya, '2', ',', '.') . ')' }}
                                        </option>
                                    @endfor
                                @endif
                            </select>
                            @error('detail_pembayaran')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                </div><!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                    <a href="{{ url('pembayaran') }}" class="btn btn-info"><i class="fas fa-reply"></i> Kembali</a>
                </div>
                </form>
            </div><!-- /.card -->
        </div>
        <div class="col-md-6">
            <div class="card card-info">
                <div class="card-header border-0">
                    <h6 class="text-primary">
                        DAFTAR PENGAJUAN VALIDASI TRANSAKSI
                    </h6>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-head-fixed">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>No. Ref.</th>
                                <th>Bank Pengirim</th>
                                <th>Tgl Transaksi</th>
                                <th style="width: 40px">Jumlah (Rp.)</th>
                                <th>Upload Bukti Transaksi</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!empty($bayar))
                                @foreach ($bayar as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nomor_refe }}</td>
                                        <td>{{ $item->bank_pengirim }}</td>
                                        <td>{{ $item->tgl_trans }}</td>
                                        <td>{{ number_format($item->jlh_bayar, 2, ',', '.') }}</td>
                                        <td>
                                            @if (!empty($item->bukti_bayar))
                                                <a href="{{ asset('assets/berkas/bukti') . '/' . $item->bukti_bayar }}"
                                                    target="_blank">Lihat</a>
                                            @else
                                                <span class="text-danger">Silahkan Upload Bukti Pembayaran </span><br>
                                                <button onclick="getdata({{ $item->id_bukti_bayar }})"
                                                    class="btn btn-sm btn-success" data-toggle="modal"
                                                    data-target="#bukti">Upload</button>
                                            @endif

                                        </td>
                                        <td>
                                            @if ($item->validasi_bukti == '2')
                                                <span class="text-success">Valid</span>
                                            @elseif($item->validasi_bukti == '3')
                                                <span class="text-danger">Tidak Valid</span>
                                            @else
                                                <span class="text-warning">Belum Divalidasi</span>
                                            @endif
                                        </td>

                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7" class="text-danger text-center">Belum ada pengajuan validasi
                                        transaksi</td>
                                </tr>
                            @endif

                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>

    </div>
    @include('info.modalupload')
    @push('footer')
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            $(document).ready(function() {
                $('.select2').select2();
            });
        </script>
    @endpush
@endsection
