@extends('layouts.master')
@section('content')
    @if ($cekputus == true && $cekputus->status_penerimaan == 1)
        <div class="text-center alert alert-success" role="alert">
            Selamat <br> <strong> Anda dinyatakan lulus di STKIP Persada Khatulistiwa Sintang! </strong>
        </div>
        <div class="card">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Info Pembayaran Calon Mahasiswa</h6>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Diterima pada Prodi</label>
                    <div class="col-sm-8">
                        @if ($cekputus->prodi_penerimaan == 1)
                            <span class="form-control">Pendidikan Bahasa dan Sastra Indonesia</span>
                        @elseif($cekputus->prodi_penerimaan == 2)
                            <span class="form-control">Pendidikan Matematika</span>
                        @elseif($cekputus->prodi_penerimaan == 3)
                            <span class="form-control">Pendidikan Ekonomi</span>
                        @elseif($cekputus->prodi_penerimaan == 4)
                            <span class="form-control">Pendidikan Pancasila dan Kewarganegaraan</span>
                        @elseif($cekputus->prodi_penerimaan == 5)
                            <span class="form-control">Pendidikan Komputer</span>
                        @elseif($cekputus->prodi_penerimaan == 6)
                            <span class="form-control">Pendidikan Biologi</span>
                        @elseif($cekputus->prodi_penerimaan == 7)
                            <span class="form-control">Pendidikan Anak Usia Dini</span>
                        @elseif($cekputus->prodi_penerimaan == 8)
                            <span class="form-control">Pendidikan Bahasa Inggris</span>
                        @else
                            <span class="form-control">Pendidikan Guru Sekolah Dasar</span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Catatan Penerimaan</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" rows="5" disabled>{{ $cekputus->note_penerimaan }}</textarea>
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Item Pembayaran</th>
                            <th style="width: 40px">Biaya(Rp.)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($cekjalur->jalur == 'prestasi')
                            <tr>
                                <td>1.</td>
                                <td>Biaya Registrasi Mahasiswa Baru</td>
                                <td>{{ rupiah($biaya[0]->prestasi_biaya) }}</td>
                            </tr>
                            <tr>
                                <td>2.</td>
                                <td>Biaya Pengembangan Kampus</td>
                                <td>{{ rupiah($biaya[1]->prestasi_biaya) }}</td>
                            </tr>
                            <tr>
                                <td>3.</td>
                                <td>SPP Tetap / Semester</td>
                                <td>{{ rupiah($biaya[2]->prestasi_biaya) }}</td>
                            </tr>
                        @elseif($cekjalur->jalur == 'test')
                            <tr>
                                <td>1.</td>
                                <td>Biaya Registrasi Mahasiswa Baru</td>
                                <td>{{ rupiah($biaya[0]->test_biaya) }}</td>
                            </tr>
                            <tr>
                                <td>2.</td>
                                <td>Biaya Pengembangan Kampus</td>
                                <td>{{ rupiah($biaya[1]->test_biaya) }}</td>
                            </tr>
                            <tr>
                                <td>3.</td>
                                <td>SPP Tetap / Semester</td>
                                <td>{{ rupiah($biaya[2]->test_biaya) }}</td>
                            </tr>
                        @else
                            <tr>
                                <td>1.</td>
                                <td>Biaya Registrasi Mahasiswa Baru</td>
                                <td>{{ rupiah($biaya[0]->reguler2_biaya) }}</td>
                            </tr>
                            <tr>
                                <td>2.</td>
                                <td>Biaya Pengembangan Kampus</td>
                                <td>{{ rupiah($biaya[1]->reguler2_biaya) }}</td>
                            </tr>
                            <tr>
                                <td>3.</td>
                                <td>SPP Tetap / Semester</td>
                                <td>{{ rupiah($biaya[2]->reguler2_biaya) }}</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                @php
                    if ($cekjalur->jalur == 'prestasi') {
                        $total = $biaya[0]->prestasi_biaya + $biaya[1]->prestasi_biaya + $biaya[2]->prestasi_biaya;
                    } else {
                        $total = $biaya[0]->test_biaya + $biaya[1]->test_biaya + $biaya[2]->test_biaya;
                    }
                @endphp


            </div>
            <a href="{{ url('calon') }}" class="btn btn-primary btn-md float-right mt-3 mb-3">Lanjutkan untuk melengkapi
                data
                anda</a>
        @else
            @if ($data->metode_bayar != null && $data->valid_bayar == 2)
                <div class="text-center alert alert-success" role="alert">
                    Status Pembayaran <br> <strong> Sudah Divalidasi! </strong>
                </div>
            @elseif($data->metode_bayar != null && $data->valid_bayar == 3)
                <div class="text-center alert alert-danger" role="alert">
                    Status Pembayaran <br> <strong> Tidak Valid! </strong> <br> Pembayaran tidak cocok direkening
                    koran STKIP Persada Khatulistiwa. <br> Hubungi panitia PMB STKIP Persada Khatulistiwa Sintang
                </div>
            @elseif($data->metode_bayar != null)
                <div class="text-center alert alert-warning" role="alert">
                    Status Pembayaran <br> <strong> Belum Divalidasi! </strong>
                </div>
            @endif
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Info Pembayaran</h6>
                </div>
                <div class="card-body">
                    @if ($cekputus == false)
                        @if ($data->valid_bayar == null)
                            <div class="alert alert-info" role="alert">
                                <h5 class="alert-heading">Info</h5>
                                <p>Untuk melanjutkan proses pendaftaran anda diharuskan membayar uang sebesar <b>Rp.
                                        300.000 (Tiga Ratus Ribu Rupiah)</b> terlebih
                                    dahulu.
                                    Klik Tombol "Bayar Sekarang" Untuk membayar uang pendaftaran.</p>
                            </div>
                            <button class="btn btn-primary" id="pay-button">Bayar Sekarang</button>
                            @if ($data->valid_bayar == 2)
                                <h5>Silahkan untuk melanjutkan dalam pengisian data lengkap. Klik link dibawah untuk
                                    melanjutkan
                                    ke
                                    tahap berikutnya.</h5>
                            @endif
                            {{-- @elseif() --}}
                        @elseif($data->valid_bayar != null)
                            <div class="alert alert-success" role="alert">
                                <h5>Pembayaran anda sudah kami terima. <br> Untuk melanjutkan pendaftaran silahkan klik
                                    tombol
                                    dibawah ini.</h5>
                            </div>
                        @endif
                    @elseif($cekputus->status_penerimaan == 2)
                        <p>Mohon Maaf Anda Dinyatakan Tidak Lulus</p>
                    @else
                        <p>Selamat Anda Sudah Dinyatakan Lulus</p>
                    @endif
                </div>
            </div>
            @if ($data->valid_bayar == 2 && $cekjalur->jalur == 'test')
                <a href="{{ url('infoTes') }}" class="btn btn-info btn-md">Lihat Informasi Tes Online</a>
                <a href="{{ url('calon') }}" class="btn btn-primary btn-md">Lanjutkan Pengisian Data</a>
            @elseif($data->valid_bayar == 2 && $cekjalur->jalur == 'prestasi')
                <a href="{{ url('calon') }}" class="btn btn-primary btn-md float-right">Lanjutkan Pengisian Data</a>
            @endif
    @endif
@endsection
@push('footer')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('midtrans.client_key') }}"></script>
    <script>
        document.getElementById('pay-button').onclick = function() {
            snap.pay('{{ $snapToken }}', {
                onSuccess: function(result) {
                    let order_id = result.order_id;
                    let gross_amount = result.gross_amount;
                    let transaction_status = result.transaction_status;
                    window.location.href =
                        `{{ url('afterpay/${order_id}/${gross_amount}/${transaction_status}') }}`;
                    alert('Pembayaran Berhasil!');
                },

                onError: function(result) {
                    let order_id = result.order_id;
                    let gross_amount = result.gross_amount;
                    let transaction_status = result.transaction_status;
                    window.location.href =
                        `{{ url('afterpay/${order_id}/${gross_amount}/${transaction_status}') }}`;
                    alert('Pembayaran Gagal!');
                },
                onPending: function(result) {
                    let order_id = result.order_id;
                    let gross_amount = result.gross_amount;
                    let transaction_status = result.transaction_status;
                    window.location.href =
                        `{{ url('afterpay/${order_id}/${gross_amount}/${transaction_status}') }}`;
                    alert('Pembayaran Sedang Diproses!');
                }
            });
        };
    </script>
@endpush
