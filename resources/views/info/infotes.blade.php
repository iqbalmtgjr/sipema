@extends('layouts.master')
@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h6 class="text-primary">Informasi Tes PMB</h6>
        </div>
        @if ($cekjalur->jalur == 'prestasi')
            <div class="card-body">
                <h5>Anda adalah jalur prestasi. Anda tidak harus mengerjakan tes online.</h5>
            </div>
        @else
            <div class="card-body">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Tanggal Tes Tertulis & Wawancara</label>
                    <div class="col-sm-8">
                        <span class="form-control">{{ $data->tes_lak }}</span>
                        <!--<span class="form-control">01 - 15 Agustus 2023</span>-->
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Pengumuman Kelulusan</label>
                    <div class="col-sm-8">
                        <span class="form-control">{{ $data->tes_mum }}</span>
                        <!--<span class="form-control">24 Juli 2023</span>-->
                    </div>
                </div>
                @if (auth()->user()->ujian == 1)
                    <div class="form-group row mt-5">
                        <p>Tes penerimaan mahasiswa baru dibagi menjadi dua tahap yaitu tes tertulis dan tes wawancara.
                            Tes tertulis PMB dilaksanakan secara online, dimulai pada tanggal {{ $data->tes_lak }}.
                            <!--Tes tertulis PMB dilaksanakan secara online, dimulai pada tanggal 01 - 15 Agustus 2023. -->
                            <!--Tes Wawancara PMB dilaksanakan melalui telpon/WhatsApp.-->
                        </p>
                        <p>Tes tertulis dilakukan melalui link <b>&nbsp; <a href="https://tespmb.persadakhatulistiwa.ac.id" target="_blank">https://tespmb.persadakhatulistiwa.ac.id</a></b>&nbsp;
                        </p>
                        <p>Gunakan email dan password yang sama pada akun pmb untuk masuk ke sistem tes. Jika terjadi
                            kendala
                            silahkan menghubungi panitia melalui WA pada no. 082155964080 </p>
                        <p>Gunakan email:<strong>&nbsp;{{ auth()->user()->email_akun_siswa }}</strong>&nbsp; sebagai
                            username
                            dan
                            password:&nbsp;<strong>{{ auth()->user()->kuncigudang }}</strong>&nbsp;untuk masuk ke sistem
                            tes.
                        </p>
                    </div>
                @else
                    <h5 class="text-danger mt-5">Silahkan menunggu sampai panitia memberikan info ujian dan akun yang
                        digunakan untuk
                        ujian dihalaman ini.</h5>
                @endif
            </div>
        @endif
    </div>
    <div class="form-group mt-2">
        <a href="{{ url('calon') }}" class="btn btn-primary float-right">Lanjutkan untuk melengkapi data anda</a>
        {{-- <a class="btn btn-info btn-md" href="https://chat.whatsapp.com/JGNUmmLEscHGgr4vmFXOUq"><i>Klik Disini Untuk
                Bergabung Ke Grup Mahasiswa Baru</i></a> --}}
    </div>
@endsection
