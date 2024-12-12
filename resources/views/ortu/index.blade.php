@extends('layouts.master')
@section('content')
    <div class="alert alert-info d-flex align-items-center" role="alert">
        <i class="fas fa-info-circle me-2"></i>&nbsp;&nbsp;&nbsp;
        <div>
            Isi identitas ayah dan ibu. Bisa dikosongkan apabila ayah dan ibu tidak ada, wafat, jauh. <br>
            Jika identitas ayah dan ibu kosong, silahkan isi formulir wali.
        </div>
    </div>

    <div class="mb-4" id="ortu">
        <form action="{{ url('postOrtu') }}" method="post">
            @csrf
            <div class="card">
                <div class="card-header">
                    <h6 class="text-primary">Identitas Ayah</h6>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="form-group row">
                        <label for="inputNIK" class="col-sm-2 col-form-label">NIK<strong
                                style="color: red">*</strong></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('nik_ayah') is-invalid @enderror"
                                id="inputNIK" name="nik_ayah" placeholder="Nomor Induk Kependudukan"
                                value="{{ $data == true && $data->nik_ayah != null ? $data->nik_ayah : old('nik_ayah') }}">
                            @error('nik_ayah')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama_ayah" class="col-sm-2 col-form-label">Nama Ayah<strong
                                style="color: red">*</strong></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('nama_ayah') is-invalid @enderror"
                                id="inputKPS" name="nama_ayah" placeholder="Nama Ayah"
                                value="{{ $data == true && $data->nama_ayah != null ? $data->nama_ayah : old('nama_ayah') }}">
                            @error('nama_ayah')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tempat, Tanggal Lahir<strong
                                style="color: red">*</strong></label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="text" class="form-control @error('tmp_lahir_ayah') is-invalid @enderror"
                                        name="tmp_lahir_ayah" placeholder="Tempat Lahir"
                                        value="{{ $data == true && $data->tmp_lahir_ayah != null ? $data->tmp_lahir_ayah : old('tmp_lahir_ayah') }}">
                                    @error('tmp_lahir_ayah')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <input type="date" name="tgl_lahir_ayah"
                                        class="form-control @error('tgl_lahir_ayah') is-invalid @enderror"
                                        value="{{ $data == true && $data->tgl_lahir_ayah != null ? $data->tgl_lahir_ayah : old('tgl_lahir_ayah') }}">
                                    @error('tgl_lahir_ayah')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat<strong
                                style="color: red">*</strong></label>
                        <div class="col-sm-10">
                            <textarea class="form-control @error('alamat_ayah') is-invalid @enderror" rows="3" name="alamat_ayah"
                                placeholder="Alamat">{{ $data == true && $data->alamat_ayah != null ? $data->alamat_ayah : old('alamat_ayah') }}</textarea>
                            @error('alamat_ayah')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="pekerjaan" class="col-sm-2 col-form-label">Pekerjaan<strong
                                style="color: red">*</strong></label>
                        <div class="col-sm-10">
                            <select class="form-control @error('pekerjaan_ayah') is-invalid @enderror" name="pekerjaan_ayah"
                                id="">
                                <option value="">-- Pilih Pekerjaan Ayah --</option>
                                <option value="Pimpinan/Manjerial"
                                    @if ($data == true && $data->pekerjaan_ayah != null) {{ $data->pekerjaan_ayah == 'Pimpinan/Manjerial' ? 'selected' : '' }} @else {{ old('pekerjaan_ayah') == 'Pimpinan/Manjerial' ? 'selected' : '' }} @endif>
                                    Pimpinan/Manjerial</option>
                                <option value="PNS/TNI/Polri"
                                    @if ($data == true && $data->pekerjaan_ayah != null) {{ $data->pekerjaan_ayah == 'PNS/TNI/Polri' ? 'selected' : '' }} @else {{ old('pekerjaan_ayah') == 'PNS/TNI/Polri' ? 'selected' : '' }} @endif>
                                    PNS/TNI/Polri</option>
                                <option value="Pensiunan"
                                    @if ($data == true && $data->pekerjaan_ayah != null) {{ $data->pekerjaan_ayah == 'Pensiunan' ? 'selected' : '' }} @else {{ old('pekerjaan_ayah') == 'Pensiunan' ? 'selected' : '' }} @endif>
                                    Pensiunan</option>
                                <option value="Peternak"
                                    @if ($data == true && $data->pekerjaan_ayah != null) {{ $data->pekerjaan_ayah == 'Peternak' ? 'selected' : '' }} @else {{ old('pekerjaan_ayah') == 'Peternak' ? 'selected' : '' }} @endif>
                                    Peternak</option>
                                <option value="Wiraswasta"
                                    @if ($data == true && $data->pekerjaan_ayah != null) {{ $data->pekerjaan_ayah == 'Wiraswasta' ? 'selected' : '' }} @else {{ old('pekerjaan_ayah') == 'Wiraswasta' ? 'selected' : '' }} @endif>
                                    Wiraswasta</option>
                                <option value="Petani"
                                    @if ($data == true && $data->pekerjaan_ayah != null) {{ $data->pekerjaan_ayah == 'Petani' ? 'selected' : '' }} @else {{ old('pekerjaan_ayah') == 'Petani' ? 'selected' : '' }} @endif>
                                    Petani</option>
                                <option value="Tim Ahli/Konsultan"
                                    @if ($data == true && $data->pekerjaan_ayah != null) {{ $data->pekerjaan_ayah == 'Tim Ahli/Konsultan' ? 'selected' : '' }} @else {{ old('pekerjaan_ayah') == 'Tim Ahli/Konsultan' ? 'selected' : '' }} @endif>
                                    Tim Ahli/Konsultan</option>
                                <option value="Tenaga Pengajar/Instruktur/Fasilitator"
                                    @if ($data == true && $data->pekerjaan_ayah != null) {{ $data->pekerjaan_ayah == 'Tenaga Pengajar/Instruktur/Fasilitator' ? 'selected' : '' }} @else {{ old('pekerjaan_ayah') == 'Tenaga Pengajar/Instruktur/Fasilitator' ? 'selected' : '' }} @endif>
                                    Tenaga Pengajar/Instruktur/Fasilitator</option>
                                <option value="Sudah Meninggal"
                                    @if ($data == true && $data->pekerjaan_ayah != null) {{ $data->pekerjaan_ayah == 'Sudah Meninggal' ? 'selected' : '' }} @else {{ old('pekerjaan_ayah') == 'Sudah Meninggal' ? 'selected' : '' }} @endif>
                                    Sudah Meninggal</option>
                                <option value="Tidak Bekerja"
                                    @if ($data == true && $data->pekerjaan_ayah != null) {{ $data->pekerjaan_ayah == 'Tidak Bekerja' ? 'selected' : '' }} @else {{ old('pekerjaan_ayah') == 'Tidak Bekerja' ? 'selected' : '' }} @endif>
                                    Tidak Bekerja</option>
                                <option value="Pedagang Kecil"
                                    @if ($data == true && $data->pekerjaan_ayah != null) {{ $data->pekerjaan_ayah == 'Pedagang Kecil' ? 'selected' : '' }} @else {{ old('pekerjaan_ayah') == 'Pedagang Kecil' ? 'selected' : '' }} @endif>
                                    Pedagang Kecil</option>
                                <option value="Magang"
                                    @if ($data == true && $data->pekerjaan_ayah != null) {{ $data->pekerjaan_ayah == 'Magang' ? 'selected' : '' }} @else {{ old('pekerjaan_ayah') == 'Magang' ? 'selected' : '' }} @endif>
                                    Magang</option>
                                <option value="Nelayan"
                                    @if ($data == true && $data->pekerjaan_ayah != null) {{ $data->pekerjaan_ayah == 'Nelayan' ? 'selected' : '' }} @else {{ old('pekerjaan_ayah') == 'Nelayan' ? 'selected' : '' }} @endif>
                                    Nelayan</option>
                                <option value="Pedagang Besar"
                                    @if ($data == true && $data->pekerjaan_ayah != null) {{ $data->pekerjaan_ayah == 'Pedagang Besar' ? 'selected' : '' }} @else {{ old('pekerjaan_ayah') == 'Pedagang Besar' ? 'selected' : '' }} @endif>
                                    Pedagang Besar</option>
                                <option value="Karyawan Swasta"
                                    @if ($data == true && $data->pekerjaan_ayah != null) {{ $data->pekerjaan_ayah == 'Karyawan Swasta' ? 'selected' : '' }} @else {{ old('pekerjaan_ayah') == 'Karyawan Swasta' ? 'selected' : '' }} @endif>
                                    Karyawan Swasta</option>
                                <option value="Buruh"
                                    @if ($data == true && $data->pekerjaan_ayah != null) {{ $data->pekerjaan_ayah == 'Buruh' ? 'selected' : '' }} @else {{ old('pekerjaan_ayah') == 'Buruh' ? 'selected' : '' }} @endif>
                                    Buruh</option>
                                <option value="Peneliti"
                                    @if ($data == true && $data->pekerjaan_ayah != null) {{ $data->pekerjaan_ayah == 'Peneliti' ? 'selected' : '' }} @else {{ old('pekerjaan_ayah') == 'Peneliti' ? 'selected' : '' }} @endif>
                                    Peneliti</option>
                                <option value="Wirausaha"
                                    @if ($data == true && $data->pekerjaan_ayah != null) {{ $data->pekerjaan_ayah == 'Wirausaha' ? 'selected' : '' }} @else {{ old('pekerjaan_ayah') == 'Wirausaha' ? 'selected' : '' }} @endif>
                                    Wirausaha</option>
                                <option value="lainnya"
                                    @if ($data == true && $data->pekerjaan_ayah != null) {{ $data->pekerjaan_ayah == 'lainnya' ? 'selected' : '' }} @else {{ old('pekerjaan_ayah') == 'lainnya' ? 'selected' : '' }} @endif>
                                    Lainnya</option>
                            </select>
                            @error('pekerjaan_ayah')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="pekerjaan" class="col-sm-2 col-form-label">Pendidikan Terakhir<strong
                                style="color: red">*</strong></label>
                        <div class="col-sm-10">
                            <select class="form-control @error('pendidikan_ayah') is-invalid @enderror"
                                name="pendidikan_ayah" id="">
                                <option value="">-- Pilih Pendidikan Terakhir Ayah --</option>
                                <option value="SD/Sederajat"
                                    @if ($data == true && $data->pendidikan_ayah != null) {{ $data->pendidikan_ayah == 'SD/Sederajat' ? 'selected' : '' }} @else {{ old('pendidikan_ayah') == 'SD/Sederajat' ? 'selected' : '' }} @endif>
                                    SD/Sederajat</option>
                                <option value="Paket C"
                                    @if ($data == true && $data->pendidikan_ayah != null) {{ $data->pendidikan_ayah == 'Paket C' ? 'selected' : '' }} @else {{ old('pendidikan_ayah') == 'Paket C' ? 'selected' : '' }} @endif>
                                    Paket C</option>
                                <option value="S1"
                                    @if ($data == true && $data->pendidikan_ayah != null) {{ $data->pendidikan_ayah == 'S1' ? 'selected' : '' }} @else {{ old('pendidikan_ayah') == 'S1' ? 'selected' : '' }} @endif>
                                    S1</option>
                                <option value="Tidak Sekolah"
                                    @if ($data == true && $data->pendidikan_ayah != null) {{ $data->pendidikan_ayah == 'Tidak Sekolah' ? 'selected' : '' }} @else {{ old('pendidikan_ayah') == 'Tidak Sekolah' ? 'selected' : '' }} @endif>
                                    Tidak Sekolah</option>
                                <option value="SMP/Sederajat"
                                    @if ($data == true && $data->pendidikan_ayah != null) {{ $data->pendidikan_ayah == 'SMP/Sederajat' ? 'selected' : '' }} @else {{ old('pendidikan_ayah') == 'SMP/Sederajat' ? 'selected' : '' }} @endif>
                                    SMP/Sederajat</option>
                                <option value="Putus SD"
                                    @if ($data == true && $data->pendidikan_ayah != null) {{ $data->pendidikan_ayah == 'Putus SD' ? 'selected' : '' }} @else {{ old('pendidikan_ayah') == 'Putus SD' ? 'selected' : '' }} @endif>
                                    Putus SD</option>
                                <option value="S2"
                                    @if ($data == true && $data->pendidikan_ayah != null) {{ $data->pendidikan_ayah == 'S2' ? 'selected' : '' }} @else {{ old('pendidikan_ayah') == 'S2' ? 'selected' : '' }} @endif>
                                    S2</option>
                                <option value="Sp-1"
                                    @if ($data == true && $data->pendidikan_ayah != null) {{ $data->pendidikan_ayah == 'Sp-1' ? 'selected' : '' }} @else {{ old('pendidikan_ayah') == 'Sp-1' ? 'selected' : '' }} @endif>
                                    Sp-1</option>
                                <option value="PAUD"
                                    @if ($data == true && $data->pendidikan_ayah != null) {{ $data->pendidikan_ayah == 'PAUD' ? 'selected' : '' }} @else {{ old('pendidikan_ayah') == 'PAUD' ? 'selected' : '' }} @endif>
                                    PAUD</option>
                                <option value="D1"
                                    @if ($data == true && $data->pendidikan_ayah != null) {{ $data->pendidikan_ayah == 'D1' ? 'selected' : '' }} @else {{ old('pendidikan_ayah') == 'D1' ? 'selected' : '' }} @endif>
                                    D1</option>
                                <option value="Informal"
                                    @if ($data == true && $data->pendidikan_ayah != null) {{ $data->pendidikan_ayah == 'Informal' ? 'selected' : '' }} @else {{ old('pendidikan_ayah') == 'Informal' ? 'selected' : '' }} @endif>
                                    Informal</option>
                                <option value="Profesi"
                                    @if ($data == true && $data->pendidikan_ayah != null) {{ $data->pendidikan_ayah == 'Profesi' ? 'selected' : '' }} @else {{ old('pendidikan_ayah') == 'Profesi' ? 'selected' : '' }} @endif>
                                    Profesi</option>
                                <option value="S2 Terapan"
                                    @if ($data == true && $data->pendidikan_ayah != null) {{ $data->pendidikan_ayah == 'S2 Terapan' ? 'selected' : '' }} @else {{ old('pendidikan_ayah') == 'S2 Terapan' ? 'selected' : '' }} @endif>
                                    S2 Terapan</option>
                                <option value="S3 Terapan"
                                    @if ($data == true && $data->pendidikan_ayah != null) {{ $data->pendidikan_ayah == 'S3 Terapan' ? 'selected' : '' }} @else {{ old('pendidikan_ayah') == 'S3 Terapan' ? 'selected' : '' }} @endif>
                                    S3 Terapan</option>
                                <option value="SMA/Sederajat"
                                    @if ($data == true && $data->pendidikan_ayah != null) {{ $data->pendidikan_ayah == 'SMA/Sederajat' ? 'selected' : '' }} @else {{ old('pendidikan_ayah') == 'SMA/Sederajat' ? 'selected' : '' }} @endif>
                                    SMA/Sederajat</option>
                                <option value="S3"
                                    @if ($data == true && $data->pendidikan_ayah != null) {{ $data->pendidikan_ayah == 'S3' ? 'selected' : '' }} @else {{ old('pendidikan_ayah') == 'S3' ? 'selected' : '' }} @endif>
                                    S3</option>
                                <option value="TK/Sederajat"
                                    @if ($data == true && $data->pendidikan_ayah != null) {{ $data->pendidikan_ayah == 'TK/Sederajat' ? 'selected' : '' }} @else {{ old('pendidikan_ayah') == 'TK/Sederajat' ? 'selected' : '' }} @endif>
                                    TK/Sederajat</option>
                                <option value="Non formal"
                                    @if ($data == true && $data->pendidikan_ayah != null) {{ $data->pendidikan_ayah == 'Non formal' ? 'selected' : '' }} @else {{ old('pendidikan_ayah') == 'Non formal' ? 'selected' : '' }} @endif>
                                    Non formal</option>
                                <option value="Paket A"
                                    @if ($data == true && $data->pendidikan_ayah != null) {{ $data->pendidikan_ayah == 'Paket A' ? 'selected' : '' }} @else {{ old('pendidikan_ayah') == 'Paket A' ? 'selected' : '' }} @endif>
                                    Paket A</option>
                                <option value="D4"
                                    @if ($data == true && $data->pendidikan_ayah != null) {{ $data->pendidikan_ayah == 'D4' ? 'selected' : '' }} @else {{ old('pendidikan_ayah') == 'D4' ? 'selected' : '' }} @endif>
                                    D4</option>
                                <option value="D3"
                                    @if ($data == true && $data->pendidikan_ayah != null) {{ $data->pendidikan_ayah == 'D3' ? 'selected' : '' }} @else {{ old('pendidikan_ayah') == 'D3' ? 'selected' : '' }} @endif>
                                    D3</option>
                                <option value="D2"
                                    @if ($data == true && $data->pendidikan_ayah != null) {{ $data->pendidikan_ayah == 'D2' ? 'selected' : '' }} @else {{ old('pendidikan_ayah') == 'D2' ? 'selected' : '' }} @endif>
                                    D2</option>
                                <option value="Lainnya"
                                    @if ($data == true && $data->pendidikan_ayah != null) {{ $data->pendidikan_ayah == 'Lainnya' ? 'selected' : '' }} @else {{ old('pendidikan_ayah') == 'Lainnya' ? 'selected' : '' }} @endif>
                                    Lainnya</option>

                            </select>
                            @error('pendidikan_ayah')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputNOHP" class="col-sm-2 col-form-label">Nomor HP<strong
                                style="color: red">*</strong></label>
                        <div class="col-sm-10 input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">+62</span>
                            </div>
                            <input type="number" class="form-control @error('hp_ayah') is-invalid @enderror"
                                id="inputNOHP" name="hp_ayah" placeholder="8xxxxxxxxxx"
                                value="{{ $data == true && $data->hp_ayah != null ? $data->hp_ayah : old('hp_ayah') }}">
                            @error('hp_ayah')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kps" class="col-sm-2 col-form-label">NPWP</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('npwp_ayah') is-invalid @enderror"
                                id="inputKPS" name="npwp_ayah" placeholder="NPWP"
                                value="{{ $data == true && $data->npwp_ayah != null ? $data->npwp_ayah : old('npwp_ayah') }}">
                            @error('npwp_ayah')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kps" class="col-sm-2 col-form-label">Penghasilan<strong
                                style="color: red">*</strong></label>
                        <div class="col-sm-10">
                            <select class="form-control @error('penghasilan_ayah') is-invalid @enderror"
                                name="penghasilan_ayah" id="">
                                <option value="">-- Pilih Penghasilan Ayah --</option>
                                <option value="Rp. 5.000.000-Rp. 20.000.000"
                                    @if ($data == true && $data->penghasilan_ayah != null) {{ $data->penghasilan_ayah == 'Rp. 5.000.000-Rp. 20.000.000' ? 'selected' : '' }} @else 
                                            {{ old('penghasilan_ayah') == 'Rp. 5.000.000-Rp. 20.000.000' ? 'selected' : '' }} @endif>
                                    Rp. 5.000.000-Rp. 20.000.000</option>
                                <option value="Rp. 2.000.000-Rp. 4.999.999"
                                    @if ($data == true && $data->penghasilan_ayah != null) {{ $data->penghasilan_ayah == 'Rp. 2.000.000-Rp. 4.999.999' ? 'selected' : '' }} @else 
                                            {{ old('penghasilan_ayah') == 'Rp. 2.000.000-Rp. 4.999.999' ? 'selected' : '' }} @endif>
                                    Rp. 2.000.000-Rp. 4.999.999</option>
                                <option value="Rp. 1.000.000-Rp. 1.999.999"
                                    @if ($data == true && $data->penghasilan_ayah != null) {{ $data->penghasilan_ayah == 'Rp. 1.000.000-Rp. 1.999.999' ? 'selected' : '' }} @else
                                            {{ old('penghasilan_ayah') == 'Rp. 1.000.000-Rp. 1.999.999' ? 'selected' : '' }} @endif>
                                    Rp. 1.000.000-Rp. 1.999.999</option>
                                <option value="Rp. 500.000-Rp. 999.999"
                                    @if ($data == true && $data->penghasilan_ayah != null) {{ $data->penghasilan_ayah == 'Rp. 500.000-Rp. 999.999' ? 'selected' : '' }} @else
                                            {{ old('penghasilan_ayah') == 'Rp. 500.000-Rp. 999.999' ? 'selected' : '' }} @endif>
                                    Rp. 500.000-Rp. 999.999</option>
                                <option value="Lebih dari Rp. 20.000.000"
                                    @if ($data == true && $data->penghasilan_ayah != null) {{ $data->penghasilan_ayah == 'Lebih dari Rp. 20.000.000' ? 'selected' : '' }} @else
                                            {{ old('penghasilan_ayah') == 'Lebih dari Rp. 20.000.000' ? 'selected' : '' }} @endif>
                                    Lebih dari Rp. 20.000.000</option>
                                <option value="Kurang dari Rp. 500.000"
                                    @if ($data == true && $data->penghasilan_ayah != null) {{ $data->penghasilan_ayah == 'Kurang dari Rp. 500.000' ? 'selected' : '' }} @else
                                            {{ old('penghasilan_ayah') == 'Kurang dari Rp. 500.000' ? 'selected' : '' }} @endif>
                                    Kurang dari Rp. 500.000</option>
                            </select>
                            @error('penghasilan_ayah')
                                <span class="invalid-feedback" role="alert">
                                    <div id="emailHelp" class="form-text text-danger">{{ $message }}
                                    </div>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-header">
                    <h6 class="text-primary">Identitas Ibu</h6>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="form-group row">
                        <label for="inputNIK" class="col-sm-2 col-form-label">NIK<strong
                                style="color: red">*</strong></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('nik_ibu') is-invalid @enderror"
                                id="inputNIK" name="nik_ibu" placeholder="Nomor Induk Kependudukan"
                                value="{{ $data == true && $data->nik_ibu != null ? $data->nik_ibu : old('nik_ibu') }}">
                            @error('nik_ibu')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kps" class="col-sm-2 col-form-label">Nama Ibu<strong
                                style="color: red">*</strong></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('nama_ibu') is-invalid @enderror"
                                id="inputKPS" name="nama_ibu" placeholder="Nama Ibu"
                                value="{{ $data == true && $data->nama_ibu != null ? $data->nama_ibu : old('nama_ibu') }}">
                            @error('nama_ibu')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tempat, Tanggal Lahir<strong
                                style="color: red">*</strong></label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="text"
                                        class="form-control @error('tmp_lahir_ibu') is-invalid @enderror"
                                        name="tmp_lahir_ibu" placeholder="Tempat Lahir"
                                        value="{{ $data == true && $data->tmp_lahir_ibu != null ? $data->tmp_lahir_ibu : old('tmp_lahir_ibu') }}">
                                    @error('tmp_lahir_ibu')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <input type="date" name="tgl_lahir_ibu"
                                        class="form-control @error('tgl_lahir_ibu') is-invalid @enderror"
                                        value="{{ $data == true && $data->tgl_lahir_ibu != null ? $data->tgl_lahir_ibu : old('tgl_lahir_ibu') }}">
                                    @error('tgl_lahir_ibu')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat<strong
                                style="color: red">*</strong></label>
                        <div class="col-sm-10">
                            <textarea class="form-control @error('alamat_ibu') is-invalid @enderror" rows="3" name="alamat_ibu"
                                placeholder="Alamat">{{ $data == true && $data->alamat_ibu != null ? $data->alamat_ibu : old('alamat_ibu') }}</textarea>
                            @error('alamat_ibu')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="pekerjaan" class="col-sm-2 col-form-label">Pekerjaan<strong
                                style="color: red">*</strong></label>
                        <div class="col-sm-10">
                            <select class="form-control @error('pekerjaan_ibu') is-invalid @enderror"
                                name="pekerjaan_ibu" id="">
                                <option value="">-- Pilih Pekerjaan Ibu --</option>
                                <option value="Pimpinan/Manjerial"
                                    @if ($data == true && $data->pekerjaan_ibu != null) {{ $data->pekerjaan_ibu == 'Pimpinan/Manjerial' ? 'selected' : '' }} @else {{ old('pekerjaan_ibu') == 'Pimpinan/Manjerial' ? 'selected' : '' }} @endif>
                                    Pimpinan/Manjerial</option>
                                <option value="PNS/TNI/Polri"
                                    @if ($data == true && $data->pekerjaan_ibu != null) {{ $data->pekerjaan_ibu == 'PNS/TNI/Polri' ? 'selected' : '' }} @else {{ old('pekerjaan_ibu') == 'PNS/TNI/Polri' ? 'selected' : '' }} @endif>
                                    PNS/TNI/Polri</option>
                                <option value="Pensiunan"
                                    @if ($data == true && $data->pekerjaan_ibu != null) {{ $data->pekerjaan_ibu == 'Pensiunan' ? 'selected' : '' }} @else {{ old('pekerjaan_ibu') == 'Pensiunan' ? 'selected' : '' }} @endif>
                                    Pensiunan</option>
                                <option value="Peternak"
                                    @if ($data == true && $data->pekerjaan_ibu != null) {{ $data->pekerjaan_ibu == 'Peternak' ? 'selected' : '' }} @else {{ old('pekerjaan_ibu') == 'Peternak' ? 'selected' : '' }} @endif>
                                    Peternak</option>
                                <option value="Wiraswasta"
                                    @if ($data == true && $data->pekerjaan_ibu != null) {{ $data->pekerjaan_ibu == 'Wiraswasta' ? 'selected' : '' }} @else {{ old('pekerjaan_ibu') == 'Wiraswasta' ? 'selected' : '' }} @endif>
                                    Wiraswasta</option>
                                <option value="Petani"
                                    @if ($data == true && $data->pekerjaan_ibu != null) {{ $data->pekerjaan_ibu == 'Petani' ? 'selected' : '' }} @else {{ old('pekerjaan_ibu') == 'Petani' ? 'selected' : '' }} @endif>
                                    Petani</option>
                                <option value="Tim Ahli/Konsultan"
                                    @if ($data == true && $data->pekerjaan_ibu != null) {{ $data->pekerjaan_ibu == 'Tim Ahli/Konsultan' ? 'selected' : '' }} @else {{ old('pekerjaan_ibu') == 'Tim Ahli/Konsultan' ? 'selected' : '' }} @endif>
                                    Tim Ahli/Konsultan</option>
                                <option value="Tenaga Pengajar/Instruktur/Fasilitator"
                                    @if ($data == true && $data->pekerjaan_ibu != null) {{ $data->pekerjaan_ibu == 'Tenaga Pengajar/Instruktur/Fasilitator' ? 'selected' : '' }} @else {{ old('pekerjaan_ibu') == 'Tenaga Pengajar/Instruktur/Fasilitator' ? 'selected' : '' }} @endif>
                                    Tenaga Pengajar/Instruktur/Fasilitator</option>
                                <option value="Sudah Meninggal"
                                    @if ($data == true && $data->pekerjaan_ibu != null) {{ $data->pekerjaan_ibu == 'Sudah Meninggal' ? 'selected' : '' }} @else {{ old('pekerjaan_ibu') == 'Sudah Meninggal' ? 'selected' : '' }} @endif>
                                    Sudah Meninggal</option>
                                <option value="Tidak Bekerja"
                                    @if ($data == true && $data->pekerjaan_ibu != null) {{ $data->pekerjaan_ibu == 'Tidak Bekerja' ? 'selected' : '' }} @else {{ old('pekerjaan_ibu') == 'Tidak Bekerja' ? 'selected' : '' }} @endif>
                                    Tidak Bekerja</option>
                                <option value="Pedagang Kecil"
                                    @if ($data == true && $data->pekerjaan_ibu != null) {{ $data->pekerjaan_ibu == 'Pedagang Kecil' ? 'selected' : '' }} @else {{ old('pekerjaan_ibu') == 'Pedagang Kecil' ? 'selected' : '' }} @endif>
                                    Pedagang Kecil</option>
                                <option value="Magang"
                                    @if ($data == true && $data->pekerjaan_ibu != null) {{ $data->pekerjaan_ibu == 'Magang' ? 'selected' : '' }} @else {{ old('pekerjaan_ibu') == 'Magang' ? 'selected' : '' }} @endif>
                                    Magang</option>
                                <option value="Nelayan"
                                    @if ($data == true && $data->pekerjaan_ibu != null) {{ $data->pekerjaan_ibu == 'Nelayan' ? 'selected' : '' }} @else {{ old('pekerjaan_ibu') == 'Nelayan' ? 'selected' : '' }} @endif>
                                    Nelayan</option>
                                <option value="Pedagang Besar"
                                    @if ($data == true && $data->pekerjaan_ibu != null) {{ $data->pekerjaan_ibu == 'Pedagang Besar' ? 'selected' : '' }} @else {{ old('pekerjaan_ibu') == 'Pedagang Besar' ? 'selected' : '' }} @endif>
                                    Pedagang Besar</option>
                                <option value="Karyawan Swasta"
                                    @if ($data == true && $data->pekerjaan_ibu != null) {{ $data->pekerjaan_ibu == 'Karyawan Swasta' ? 'selected' : '' }} @else {{ old('pekerjaan_ibu') == 'Karyawan Swasta' ? 'selected' : '' }} @endif>
                                    Karyawan Swasta</option>
                                <option value="Buruh"
                                    @if ($data == true && $data->pekerjaan_ibu != null) {{ $data->pekerjaan_ibu == 'Buruh' ? 'selected' : '' }} @else {{ old('pekerjaan_ibu') == 'Buruh' ? 'selected' : '' }} @endif>
                                    Buruh</option>
                                <option value="Peneliti"
                                    @if ($data == true && $data->pekerjaan_ibu != null) {{ $data->pekerjaan_ibu == 'Peneliti' ? 'selected' : '' }} @else {{ old('pekerjaan_ibu') == 'Peneliti' ? 'selected' : '' }} @endif>
                                    Peneliti</option>
                                <option value="Wirausaha"
                                    @if ($data == true && $data->pekerjaan_ibu != null) {{ $data->pekerjaan_ibu == 'Wirausaha' ? 'selected' : '' }} @else {{ old('pekerjaan_ibu') == 'Wirausaha' ? 'selected' : '' }} @endif>
                                    Wirausaha</option>
                                <option value="lainnya"
                                    @if ($data == true && $data->pekerjaan_ibu != null) {{ $data->pekerjaan_ibu == 'lainnya' ? 'selected' : '' }} @else {{ old('pekerjaan_ibu') == 'lainnya' ? 'selected' : '' }} @endif>
                                    Lainnya</option>
                            </select>
                            @error('pekerjaan_ibu')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="pekerjaan" class="col-sm-2 col-form-label">Pendidikan Terakhir<strong
                                style="color: red">*</strong></label>
                        <div class="col-sm-10">
                            <select class="form-control @error('pendidikan_ibu') is-invalid @enderror"
                                name="pendidikan_ibu" id="">
                                <option value="">-- Pilih Pendidikan Terakhir Ibu --</option>
                                <option value="SD/Sederajat"
                                    @if ($data == true && $data->pendidikan_ibu != null) {{ $data->pendidikan_ibu == 'SD/Sederajat' ? 'selected' : '' }} @else {{ old('pendidikan_ibu') == 'SD/Sederajat' ? 'selected' : '' }} @endif>
                                    SD/Sederajat</option>
                                <option value="Paket C"
                                    @if ($data == true && $data->pendidikan_ibu != null) {{ $data->pendidikan_ibu == 'Paket C' ? 'selected' : '' }} @else {{ old('pendidikan_ibu') == 'Paket C' ? 'selected' : '' }} @endif>
                                    Paket C</option>
                                <option value="S1"
                                    @if ($data == true && $data->pendidikan_ibu != null) {{ $data->pendidikan_ibu == 'S1' ? 'selected' : '' }} @else {{ old('pendidikan_ibu') == 'S1' ? 'selected' : '' }} @endif>
                                    S1</option>
                                <option value="Tidak Sekolah"
                                    @if ($data == true && $data->pendidikan_ibu != null) {{ $data->pendidikan_ibu == 'Tidak Sekolah' ? 'selected' : '' }} @else {{ old('pendidikan_ibu') == 'Tidak Sekolah' ? 'selected' : '' }} @endif>
                                    Tidak Sekolah</option>
                                <option value="SMP/Sederajat"
                                    @if ($data == true && $data->pendidikan_ibu != null) {{ $data->pendidikan_ibu == 'SMP/Sederajat' ? 'selected' : '' }} @else {{ old('pendidikan_ibu') == 'SMP/Sederajat' ? 'selected' : '' }} @endif>
                                    SMP/Sederajat</option>
                                <option value="Putus SD"
                                    @if ($data == true && $data->pendidikan_ibu != null) {{ $data->pendidikan_ibu == 'Putus SD' ? 'selected' : '' }} @else {{ old('pendidikan_ibu') == 'Putus SD' ? 'selected' : '' }} @endif>
                                    Putus SD</option>
                                <option value="S2"
                                    @if ($data == true && $data->pendidikan_ibu != null) {{ $data->pendidikan_ibu == 'S2' ? 'selected' : '' }} @else {{ old('pendidikan_ibu') == 'S2' ? 'selected' : '' }} @endif>
                                    S2</option>
                                <option value="Sp-1"
                                    @if ($data == true && $data->pendidikan_ibu != null) {{ $data->pendidikan_ibu == 'Sp-1' ? 'selected' : '' }} @else {{ old('pendidikan_ibu') == 'Sp-1' ? 'selected' : '' }} @endif>
                                    Sp-1</option>
                                <option value="PAUD"
                                    @if ($data == true && $data->pendidikan_ibu != null) {{ $data->pendidikan_ibu == 'PAUD' ? 'selected' : '' }} @else {{ old('pendidikan_ibu') == 'PAUD' ? 'selected' : '' }} @endif>
                                    PAUD</option>
                                <option value="D1"
                                    @if ($data == true && $data->pendidikan_ibu != null) {{ $data->pendidikan_ibu == 'D1' ? 'selected' : '' }} @else {{ old('pendidikan_ibu') == 'D1' ? 'selected' : '' }} @endif>
                                    D1</option>
                                <option value="Informal"
                                    @if ($data == true && $data->pendidikan_ibu != null) {{ $data->pendidikan_ibu == 'Informal' ? 'selected' : '' }} @else {{ old('pendidikan_ibu') == 'Informal' ? 'selected' : '' }} @endif>
                                    Informal</option>
                                <option value="Profesi"
                                    @if ($data == true && $data->pendidikan_ibu != null) {{ $data->pendidikan_ibu == 'Profesi' ? 'selected' : '' }} @else {{ old('pendidikan_ibu') == 'Profesi' ? 'selected' : '' }} @endif>
                                    Profesi</option>
                                <option value="S2 Terapan"
                                    @if ($data == true && $data->pendidikan_ibu != null) {{ $data->pendidikan_ibu == 'S2 Terapan' ? 'selected' : '' }} @else {{ old('pendidikan_ibu') == 'S2 Terapan' ? 'selected' : '' }} @endif>
                                    S2 Terapan</option>
                                <option value="S3 Terapan"
                                    @if ($data == true && $data->pendidikan_ibu != null) {{ $data->pendidikan_ibu == 'S3 Terapan' ? 'selected' : '' }} @else {{ old('pendidikan_ibu') == 'S3 Terapan' ? 'selected' : '' }} @endif>
                                    S3 Terapan</option>
                                <option value="SMA/Sederajat"
                                    @if ($data == true && $data->pendidikan_ibu != null) {{ $data->pendidikan_ibu == 'SMA/Sederajat' ? 'selected' : '' }} @else {{ old('pendidikan_ibu') == 'SMA/Sederajat' ? 'selected' : '' }} @endif>
                                    SMA/Sederajat</option>
                                <option value="S3"
                                    @if ($data == true && $data->pendidikan_ibu != null) {{ $data->pendidikan_ibu == 'S3' ? 'selected' : '' }} @else {{ old('pendidikan_ibu') == 'S3' ? 'selected' : '' }} @endif>
                                    S3</option>
                                <option value="TK/Sederajat"
                                    @if ($data == true && $data->pendidikan_ibu != null) {{ $data->pendidikan_ibu == 'TK/Sederajat' ? 'selected' : '' }} @else {{ old('pendidikan_ibu') == 'TK/Sederajat' ? 'selected' : '' }} @endif>
                                    TK/Sederajat</option>
                                <option value="Non formal"
                                    @if ($data == true && $data->pendidikan_ibu != null) {{ $data->pendidikan_ibu == 'Non formal' ? 'selected' : '' }} @else {{ old('pendidikan_ibu') == 'Non formal' ? 'selected' : '' }} @endif>
                                    Non formal</option>
                                <option value="Paket A"
                                    @if ($data == true && $data->pendidikan_ibu != null) {{ $data->pendidikan_ibu == 'Paket A' ? 'selected' : '' }} @else {{ old('pendidikan_ibu') == 'Paket A' ? 'selected' : '' }} @endif>
                                    Paket A</option>
                                <option value="D4"
                                    @if ($data == true && $data->pendidikan_ibu != null) {{ $data->pendidikan_ibu == 'D4' ? 'selected' : '' }} @else {{ old('pendidikan_ibu') == 'D4' ? 'selected' : '' }} @endif>
                                    D4</option>
                                <option value="D3"
                                    @if ($data == true && $data->pendidikan_ibu != null) {{ $data->pendidikan_ibu == 'D3' ? 'selected' : '' }} @else {{ old('pendidikan_ibu') == 'D3' ? 'selected' : '' }} @endif>
                                    D3</option>
                                <option value="D2"
                                    @if ($data == true && $data->pendidikan_ibu != null) {{ $data->pendidikan_ibu == 'D2' ? 'selected' : '' }} @else {{ old('pendidikan_ibu') == 'D2' ? 'selected' : '' }} @endif>
                                    D2</option>
                                <option value="Lainnya"
                                    @if ($data == true && $data->pendidikan_ibu != null) {{ $data->pendidikan_ibu == 'Lainnya' ? 'selected' : '' }} @else {{ old('pendidikan_ibu') == 'Lainnya' ? 'selected' : '' }} @endif>
                                    Lainnya</option>

                            </select>
                            @error('pendidikan_ibu')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputNOHP" class="col-sm-2 col-form-label">Nomor HP<strong
                                style="color: red">*</strong></label>
                        <div class="col-sm-10 input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">+62</span>
                            </div>
                            <input type="number" class="form-control @error('hp_ibu') is-invalid @enderror"
                                id="inputNOHP" name="hp_ibu" placeholder="8xxxxxxxxxx"
                                value="{{ $data == true && $data->hp_ibu != null ? $data->hp_ibu : old('hp_ibu') }}">
                            @error('hp_ibu')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kps" class="col-sm-2 col-form-label">NPWP</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('npwp_ibu') is-invalid @enderror"
                                id="inputKPS" name="npwp_ibu" placeholder="NPWP"
                                value="{{ $data == true && $data->npwp_ibu != null ? $data->npwp_ibu : old('npwp_ibu') }}">
                            @error('npwp_ibu')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kps" class="col-sm-2 col-form-label">Penghasilan<strong
                                style="color: red">*</strong></label>
                        <div class="col-sm-10">
                            <select class="form-control @error('penghasilan_ibu') is-invalid @enderror"
                                name="penghasilan_ibu" id="">
                                <option value="">-- Pilih Penghasilan Ibu --</option>
                                <option value="Rp. 5.000.000-Rp. 20.000.000"
                                    @if ($data == true && $data->penghasilan_ibu != null) {{ $data->penghasilan_ibu == 'Rp. 5.000.000-Rp. 20.000.000' ? 'selected' : '' }} @else 
                                            {{ old('penghasilan_ibu') == 'Rp. 5.000.000-Rp. 20.000.000' ? 'selected' : '' }} @endif>
                                    Rp. 5.000.000-Rp. 20.000.000</option>
                                <option value="Rp. 2.000.000-Rp. 4.999.999"
                                    @if ($data == true && $data->penghasilan_ibu != null) {{ $data->penghasilan_ibu == 'Rp. 2.000.000-Rp. 4.999.999' ? 'selected' : '' }} @else 
                                            {{ old('penghasilan_ibu') == 'Rp. 2.000.000-Rp. 4.999.999' ? 'selected' : '' }} @endif>
                                    Rp. 2.000.000-Rp. 4.999.999</option>
                                <option value="Rp. 1.000.000-Rp. 1.999.999"
                                    @if ($data == true && $data->penghasilan_ibu != null) {{ $data->penghasilan_ibu == 'Rp. 1.000.000-Rp. 1.999.999' ? 'selected' : '' }} @else
                                            {{ old('penghasilan_ibu') == 'Rp. 1.000.000-Rp. 1.999.999' ? 'selected' : '' }} @endif>
                                    Rp. 1.000.000-Rp. 1.999.999</option>
                                <option value="Rp. 500.000-Rp. 999.999"
                                    @if ($data == true && $data->penghasilan_ibu != null) {{ $data->penghasilan_ibu == 'Rp. 500.000-Rp. 999.999' ? 'selected' : '' }} @else
                                            {{ old('penghasilan_ibu') == 'Rp. 500.000-Rp. 999.999' ? 'selected' : '' }} @endif>
                                    Rp. 500.000-Rp. 999.999</option>
                                <option value="Lebih dari Rp. 20.000.000"
                                    @if ($data == true && $data->penghasilan_ibu != null) {{ $data->penghasilan_ibu == 'Lebih dari Rp. 20.000.000' ? 'selected' : '' }} @else
                                            {{ old('penghasilan_ibu') == 'Lebih dari Rp. 20.000.000' ? 'selected' : '' }} @endif>
                                    Lebih dari Rp. 20.000.000</option>
                                <option value="Kurang dari Rp. 500.000"
                                    @if ($data == true && $data->penghasilan_ibu != null) {{ $data->penghasilan_ibu == 'Kurang dari Rp. 500.000' ? 'selected' : '' }} @else
                                            {{ old('penghasilan_ibu') == 'Kurang dari Rp. 500.000' ? 'selected' : '' }} @endif>
                                    Kurang dari Rp. 500.000</option>
                            </select>
                            @error('penghasilan_ibu')
                                <span class="invalid-feedback" role="alert">
                                    <div id="emailHelp" class="form-text text-danger">{{ $message }}
                                    </div>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary btn-md mt-2 mb-2">Simpan dan Lanjutkan</button>
            </div>
        </form>
    </div>

    {{-- form ibu --}}


    {{-- form wali --}}
    <div class="mb-4" id="wali">
        <div class="card">
            <form action="{{ url('postWali') }}" method="post">
                @csrf
                <div class="card-header">
                    <h6 class="text-primary">Identitas Wali</h6>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="form-group row">
                        <label for="inputNIK" class="col-sm-2 col-form-label">NIK<strong
                                style="color: red">*</strong></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('nik_wali') is-invalid @enderror"
                                id="inputNIK" name="nik_wali" placeholder="Nomor Induk Kependudukan"
                                value="{{ $data == true && $data->nik_wali != null ? $data->nik_wali : old('nik_wali') }}">
                            @error('nik_wali')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama_wali" class="col-sm-2 col-form-label">Nama Wali<strong
                                style="color: red">*</strong></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('nama_wali') is-invalid @enderror"
                                id="inputKPS" name="nama_wali" placeholder="Nama Wali"
                                value="{{ $data == true && $data->nama_wali != null ? $data->nama_wali : old('nama_wali') }}">
                            @error('nama_wali')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tempat, Tanggal Lahir<strong
                                style="color: red">*</strong></label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="text"
                                        class="form-control @error('tmp_lahir_wali') is-invalid @enderror"
                                        name="tmp_lahir_wali" placeholder="Tempat Lahir"
                                        value="{{ $data == true && $data->tmp_lahir_wali != null ? $data->tmp_lahir_wali : old('tmp_lahir_wali') }}">
                                    @error('tmp_lahir_wali')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <input type="date" name="tgl_lahir_wali"
                                        class="form-control @error('tgl_lahir_wali') is-invalid @enderror"
                                        value="{{ $data == true && $data->tgl_lahir_wali != null ? $data->tgl_lahir_wali : old('tgl_lahir_wali') }}">
                                    @error('tgl_lahir_wali')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat<strong
                                style="color: red">*</strong></label>
                        <div class="col-sm-10">
                            <textarea class="form-control @error('alamat_wali') is-invalid @enderror" rows="3" name="alamat_wali"
                                placeholder="Alamat">{{ $data == true && $data->alamat_wali != null ? $data->alamat_wali : old('alamat_wali') }}</textarea>
                            @error('alamat_wali')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="pekerjaan" class="col-sm-2 col-form-label">Pekerjaan<strong
                                style="color: red">*</strong></label>
                        <div class="col-sm-10">
                            <select class="form-control @error('pekerjaan_wali') is-invalid @enderror"
                                name="pekerjaan_wali" id="">
                                <option value="">-- Pilih Pekerjaan Wali --</option>
                                <option value="Pimpinan/Manjerial"
                                    @if ($data == true && $data->pekerjaan_wali != null) {{ $data->pekerjaan_wali == 'Pimpinan/Manjerial' ? 'selected' : '' }} @else {{ old('pekerjaan_wali') == 'Pimpinan/Manjerial' ? 'selected' : '' }} @endif>
                                    Pimpinan/Manjerial</option>
                                <option value="PNS/TNI/Polri"
                                    @if ($data == true && $data->pekerjaan_wali != null) {{ $data->pekerjaan_wali == 'PNS/TNI/Polri' ? 'selected' : '' }} @else {{ old('pekerjaan_wali') == 'PNS/TNI/Polri' ? 'selected' : '' }} @endif>
                                    PNS/TNI/Polri</option>
                                <option value="Pensiunan"
                                    @if ($data == true && $data->pekerjaan_wali != null) {{ $data->pekerjaan_wali == 'Pensiunan' ? 'selected' : '' }} @else {{ old('pekerjaan_wali') == 'Pensiunan' ? 'selected' : '' }} @endif>
                                    Pensiunan</option>
                                <option value="Peternak"
                                    @if ($data == true && $data->pekerjaan_wali != null) {{ $data->pekerjaan_wali == 'Peternak' ? 'selected' : '' }} @else {{ old('pekerjaan_wali') == 'Peternak' ? 'selected' : '' }} @endif>
                                    Peternak</option>
                                <option value="Wiraswasta"
                                    @if ($data == true && $data->pekerjaan_wali != null) {{ $data->pekerjaan_wali == 'Wiraswasta' ? 'selected' : '' }} @else {{ old('pekerjaan_wali') == 'Wiraswasta' ? 'selected' : '' }} @endif>
                                    Wiraswasta</option>
                                <option value="Petani"
                                    @if ($data == true && $data->pekerjaan_wali != null) {{ $data->pekerjaan_wali == 'Petani' ? 'selected' : '' }} @else {{ old('pekerjaan_wali') == 'Petani' ? 'selected' : '' }} @endif>
                                    Petani</option>
                                <option value="Tim Ahli/Konsultan"
                                    @if ($data == true && $data->pekerjaan_wali != null) {{ $data->pekerjaan_wali == 'Tim Ahli/Konsultan' ? 'selected' : '' }} @else {{ old('pekerjaan_wali') == 'Tim Ahli/Konsultan' ? 'selected' : '' }} @endif>
                                    Tim Ahli/Konsultan</option>
                                <option value="Tenaga Pengajar/Instruktur/Fasilitator"
                                    @if ($data == true && $data->pekerjaan_wali != null) {{ $data->pekerjaan_wali == 'Tenaga Pengajar/Instruktur/Fasilitator' ? 'selected' : '' }} @else {{ old('pekerjaan_wali') == 'Tenaga Pengajar/Instruktur/Fasilitator' ? 'selected' : '' }} @endif>
                                    Tenaga Pengajar/Instruktur/Fasilitator</option>
                                <option value="Sudah Meninggal"
                                    @if ($data == true && $data->pekerjaan_wali != null) {{ $data->pekerjaan_wali == 'Sudah Meninggal' ? 'selected' : '' }} @else {{ old('pekerjaan_wali') == 'Sudah Meninggal' ? 'selected' : '' }} @endif>
                                    Sudah Meninggal</option>
                                <option value="Tidak Bekerja"
                                    @if ($data == true && $data->pekerjaan_wali != null) {{ $data->pekerjaan_wali == 'Tidak Bekerja' ? 'selected' : '' }} @else {{ old('pekerjaan_wali') == 'Tidak Bekerja' ? 'selected' : '' }} @endif>
                                    Tidak Bekerja</option>
                                <option value="Pedagang Kecil"
                                    @if ($data == true && $data->pekerjaan_wali != null) {{ $data->pekerjaan_wali == 'Pedagang Kecil' ? 'selected' : '' }} @else {{ old('pekerjaan_wali') == 'Pedagang Kecil' ? 'selected' : '' }} @endif>
                                    Pedagang Kecil</option>
                                <option value="Magang"
                                    @if ($data == true && $data->pekerjaan_wali != null) {{ $data->pekerjaan_wali == 'Magang' ? 'selected' : '' }} @else {{ old('pekerjaan_wali') == 'Magang' ? 'selected' : '' }} @endif>
                                    Magang</option>
                                <option value="Nelayan"
                                    @if ($data == true && $data->pekerjaan_wali != null) {{ $data->pekerjaan_wali == 'Nelayan' ? 'selected' : '' }} @else {{ old('pekerjaan_wali') == 'Nelayan' ? 'selected' : '' }} @endif>
                                    Nelayan</option>
                                <option value="Pedagang Besar"
                                    @if ($data == true && $data->pekerjaan_wali != null) {{ $data->pekerjaan_wali == 'Pedagang Besar' ? 'selected' : '' }} @else {{ old('pekerjaan_wali') == 'Pedagang Besar' ? 'selected' : '' }} @endif>
                                    Pedagang Besar</option>
                                <option value="Karyawan Swasta"
                                    @if ($data == true && $data->pekerjaan_wali != null) {{ $data->pekerjaan_wali == 'Karyawan Swasta' ? 'selected' : '' }} @else {{ old('pekerjaan_wali') == 'Karyawan Swasta' ? 'selected' : '' }} @endif>
                                    Karyawan Swasta</option>
                                <option value="Buruh"
                                    @if ($data == true && $data->pekerjaan_wali != null) {{ $data->pekerjaan_wali == 'Buruh' ? 'selected' : '' }} @else {{ old('pekerjaan_wali') == 'Buruh' ? 'selected' : '' }} @endif>
                                    Buruh</option>
                                <option value="Peneliti"
                                    @if ($data == true && $data->pekerjaan_wali != null) {{ $data->pekerjaan_wali == 'Peneliti' ? 'selected' : '' }} @else {{ old('pekerjaan_wali') == 'Peneliti' ? 'selected' : '' }} @endif>
                                    Peneliti</option>
                                <option value="Wirausaha"
                                    @if ($data == true && $data->pekerjaan_wali != null) {{ $data->pekerjaan_wali == 'Wirausaha' ? 'selected' : '' }} @else {{ old('pekerjaan_wali') == 'Wirausaha' ? 'selected' : '' }} @endif>
                                    Wirausaha</option>
                                <option value="lainnya"
                                    @if ($data == true && $data->pekerjaan_wali != null) {{ $data->pekerjaan_wali == 'lainnya' ? 'selected' : '' }} @else {{ old('pekerjaan_wali') == 'lainnya' ? 'selected' : '' }} @endif>
                                    Lainnya</option>
                            </select>
                            @error('pekerjaan_wali')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputNOHP" class="col-sm-2 col-form-label">Nomor HP<strong
                                style="color: red">*</strong></label>
                        <div class="col-sm-10 input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">+62</span>
                            </div>
                            <input type="number" class="form-control @error('hp_wali') is-invalid @enderror"
                                id="inputNOHP" name="hp_wali" placeholder="8xxxxxxxxxx"
                                value="{{ $data == true && $data->hp_wali != null ? $data->hp_wali : old('hp_wali') }}">
                            @error('hp_wali')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kps" class="col-sm-2 col-form-label">NPWP Wali</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('npwp_wali') is-invalid @enderror"
                                id="inputKPS" name="npwp_wali" placeholder="NPWP"
                                value="{{ $data == true && $data->npwp_wali != null ? $data->npwp_wali : old('npwp_wali') }}">
                            @error('npwp_ayah')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kps" class="col-sm-2 col-form-label">Penghasilan Wali<strong
                                style="color: red">*</strong></label>
                        <div class="col-sm-10">
                            <select class="form-control @error('penghasilan_wali') is-invalid @enderror"
                                name="penghasilan_wali" id="">
                                <option value="">-- Pilih Penghasilan Wali --</option>
                                <option value="<1juta"
                                    @if ($data == true && $data->penghasilan_wali != null) {{ $data->penghasilan_wali == '<1juta' ? 'selected' : '' }} @else {{ old('penghasilan_wali') == '<1juta' ? 'selected' : '' }} @endif>
                                    < 1 Juta</option>
                                <option value="2 - 4juta"
                                    @if ($data == true && $data->penghasilan_wali != null) {{ $data->penghasilan_wali == '2 - 4juta' ? 'selected' : '' }} @else {{ old('penghasilan_wali') == '2 - 4juta' ? 'selected' : '' }} @endif>
                                    2 - 4 Juta</option>
                                <option value=">5juta" @if ($data == true && $data->penghasilan_wali != null)
                                    {{ $data->penghasilan_wali == '>5juta' ? 'selected' : '' }}
                                @else
                                    {{ old('penghasilan_wali') == '>5juta' ? 'selected' : '' }}
                                    @endif> > 5 Juta</option>
                            </select>
                            @error('penghasilan_wali')
                                <span class="invalid-feedback" role="alert">
                                    <div id="emailHelp" class="form-text text-danger">{{ $message }}
                                    </div>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
        </div>
        <button type="submit" class="btn btn-primary btn-md mt-2 mb-2 float-right">Simpan dan Lanjutkan</button>
        </form>
    </div>
    {{-- <hr> --}}
@endsection
@push('footer')
    {{-- <script>
        function pilihOrtuWali(pilih) {
            document.getElementById('ortu').style.display = pilih === 'ortu' ? 'block' : 'none';
            document.getElementById('wali').style.display = pilih === 'wali' ? 'block' : 'none';
            localStorage.setItem('pilihOrtuWali', pilih);
            document.getElementById('inputPilih').value = pilih;
        }
        window.addEventListener('load', function() {
            const selected = localStorage.getItem('pilihOrtuWali');
            if (selected === 'ortu' || selected === 'wali') {
                pilihOrtuWali(selected);
            }
        });
    </script> --}}
@endpush
