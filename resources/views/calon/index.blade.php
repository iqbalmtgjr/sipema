@extends('layouts.master')
@section('content')
    <div class="alert alert-info d-flex align-items-center" role="alert">
        <i class="fas fa-info-circle me-2"></i>&nbsp;&nbsp;&nbsp;
        <div>
            <strong>Info:</strong>
            Tanda bintang merah <span class="text-danger">*</span> pada formulir, berarti wajib di isi.
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h6 class="text-primary">Identitas</h6>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <p><b class="text-warning">Silahkan lengkapi data anda di bawah ini!</b> Jangan lupa meng-klik tombol SIMPAN
                untuk menyimpan data yang anda tambahkan dan untuk melanjutkan pengisian data berikutnya.</p>

            <form action="{{ url('postCalon') }}" method="post">
                @csrf
                <div class="form-group row">
                    <label for="inputNIK" class="col-sm-2 col-form-label">NIK<strong style="color: red">*</strong></label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control @error('nik_siswa') is-invalid @enderror" id="inputNIK"
                            name="nik_siswa" placeholder="Nomor Induk Kependudukan"
                            value="{{ $data->nik_siswa != null ? $data->nik_siswa : old('nik_siswa') }}">
                        @error('nik_siswa')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputNISN" class="col-sm-2 col-form-label">NISN<strong style="color: red">*</strong></label>
                    <div class="col-sm-10">
                        <span class="form-control" style="background-color: #e9ecef;">{{ $data->nis_siswa }}</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputNamaLengkap" class="col-sm-2 col-form-label">Nama Lengkap<strong
                            style="color: red">*</strong></label>
                    <div class="col-sm-10">
                        <span class="form-control" style="background-color: #e9ecef;">{{ $data->nama_siswa }}</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tempat, Tanggal Lahir<strong
                            style="color: red">*</strong></label>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col-sm-6">
                                <input type="text" class="form-control @error('tmp_lahir_siswa') is-invalid @enderror"
                                    name="tmp_lahir_siswa" placeholder="Tempat Lahir"
                                    value="{{ $data->tmp_lahir_siswa != null ? $data->tmp_lahir_siswa : old('tmp_lahir_siswa') }}">
                                @error('tmp_lahir_siswa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            <div class="col-sm-6">
                                <input type="date" name="tgl_lahir_siswa"
                                    class="form-control @error('tgl_lahir_siswa') is-invalid @enderror"
                                    value="{{ $data->tgl_lahir_siswa != null ? $data->tgl_lahir_siswa : old('tgl_lahir_siswa') }}">
                                @error('tgl_lahir_siswa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jekel" class="col-sm-2 col-form-label">Jenis Kelamin<strong
                            style="color: red">*</strong></label>
                    <div class="col-sm-10">
                        <select name="jekel_siswa" class="form-control  @error('jekel_siswa') is-invalid @enderror">
                            <option value="">-- Pilih Jenis Kelamin --</option>
                            <option value="pria"
                                @if ($data->jekel_siswa != null) {{ $data->jekel_siswa == 'pria' ? 'selected' : '' }} @else {{ old('jekel_siswa') == 'pria' ? 'selected' : '' }} @endif>
                                Pria</option>
                            <option value="wanita"
                                @if ($data->jekel_siswa != null) {{ $data->jekel_siswa == 'wanita' ? 'selected' : '' }} @else {{ old('jekel_siswa') == 'wanita' ? 'selected' : '' }} @endif>
                                Wanita
                            </option>
                        </select>
                        @error('jekel_siswa')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="agama" class="col-sm-2 col-form-label">Agama<strong style="color: red">*</strong></label>
                    <div class="col-sm-10">
                        <select name="agama_siswa" class="form-control @error('agama_siswa') is-invalid @enderror">
                            <option value="">-- PILIH --</option>
                            <option value="islam"
                                @if ($data->agama_siswa != null) {{ $data->agama_siswa == 'islam' ? 'selected' : '' }} @else
                                {{ old('agama_siswa') == 'islam' ? 'selected' : '' }} @endif>
                                Islam
                            </option>
                            <option value="kristen"
                                @if ($data->agama_siswa != null) {{ $data->agama_siswa == 'kristen' ? 'selected' : '' }} @else
                                {{ old('agama_siswa') == 'kristen' ? 'selected' : '' }} @endif>
                                Kristen
                            </option>
                            <option value="katolik"
                                @if ($data->agama_siswa != null) {{ $data->agama_siswa == 'katolik' ? 'selected' : '' }} @else
                                {{ old('agama_siswa') == 'katolik' ? 'selected' : '' }} @endif>
                                Katolik
                            </option>
                            <option value="hindu"
                                @if ($data->agama_siswa != null) {{ $data->agama_siswa == 'hindu' ? 'selected' : '' }} @else
                                {{ old('agama_siswa') == 'hindu' ? 'selected' : '' }} @endif>
                                Hindu
                            </option>
                            <option value="buddha"
                                @if ($data->agama_siswa != null) {{ $data->agama_siswa == 'buddha' ? 'selected' : '' }} @else
                                {{ old('agama_siswa') == 'buddha' ? 'selected' : '' }} @endif>
                                Buddha
                            </option>
                            <option value="konghucu"
                                @if ($data->agama_siswa != null) {{ $data->agama_siswa == 'konghucu' ? 'selected' : '' }} @else
                                {{ old('agama_siswa') == 'konghucu' ? 'selected' : '' }} @endif>
                                Konghucu
                            </option>
                        </select>
                        @error('agama_siswa')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="alamat" class="col-sm-2 col-form-label">Jalan</label>
                    <div class="col-sm-10">
                        <textarea class="form-control @error('alamat_siswa') is-invalid @enderror" rows="3" name="alamat_siswa"
                            placeholder="Alamat">{{ $data->alamat_siswa != null ? $data->alamat_siswa : old('alamat_siswa') }}</textarea>
                        @error('alamat_siswa')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputDusun" class="col-sm-2 col-form-label">Dusun</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control  @error('dusun_siswa') is-invalid @enderror"
                            id="inputDusun" name="dusun_siswa" placeholder="Dusun"
                            value="{{ $data->dusun_siswa != null ? $data->dusun_siswa : old('dusun_siswa') }}">
                        @error('dusun_siswa')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputRT/RW" class="col-sm-2 col-form-label">RT/RW</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('rtrw_siswa') is-invalid @enderror"
                            id="inputRT/RW" name="rtrw_siswa" placeholder="RT/RW"
                            value="{{ $data->rtrw_siswa != null ? $data->rtrw_siswa : old('rtrw_siswa') }}">
                        @error('rtrw_siswa')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputDesa" class="col-sm-2 col-form-label">Desa<strong
                            style="color: red">*</strong></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('desa_siswa') is-invalid @enderror"
                            id="inputDesa" name="desa_siswa" placeholder="Desa"
                            value="{{ $data->desa_siswa != null ? $data->desa_siswa : old('desa_siswa') }}">
                        @error('desa_siswa')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputKecamatan" class="col-sm-2 col-form-label">Kecamatan<strong
                            style="color: red">*</strong></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('kec_siswa') is-invalid @enderror"
                            id="inputKecamatan" name="kec_siswa" placeholder="Kecamatan"
                            value="{{ $data->kec_siswa != null ? $data->kec_siswa : old('kec_siswa') }}">
                        @error('kec_siswa')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputKabupaten" class="col-sm-2 col-form-label">Kabupaten<strong
                            style="color: red">*</strong></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('kab_siswa') is-invalid @enderror"
                            id="inputKabupaten" name="kab_siswa" placeholder="Kabupaten"
                            value="{{ $data->kab_siswa != null ? $data->kab_siswa : old('kab_siswa') }}">
                        @error('kab_siswa')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputKodePos" class="col-sm-2 col-form-label">Kode Pos<strong
                            style="color: red">*</strong></label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control @error('pos_siswa') is-invalid @enderror"
                            id="inputKodePos" name="pos_siswa" placeholder="Kode Pos"
                            value="{{ $data->pos_siswa != null ? $data->pos_siswa : old('pos_siswa') }}">
                        @error('pos_siswa')
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
                        <input type="number" class="form-control @error('hp_siswa') is-invalid @enderror"
                            id="inputNOHP" name="hp_siswa" placeholder="8xxxxxxxxxx"
                            value="{{ $data->hp_siswa != null ? $data->hp_siswa : old('hp_siswa') }}">
                        @error('hp_siswa')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label for="lainnya" class="col-sm-4 col-form-label">Jenis Tinggal</label>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <select name="jenis_tiggal_siswa"
                                        class="form-control @error('jenis_tiggal_siswa') is-invalid @enderror">
                                        <option value="">-- Pilih Jenis Tinggal --</option>
                                        <option
                                            value="ortu"{{ old('jenis_tiggal_siswa', $data->jenis_tiggal_siswa) == 'ortu' ? 'selected' : '' }}>
                                            Bersama orang tua</option>
                                        <option
                                            value="kontrakan"{{ old('jenis_tiggal_siswa', $data->jenis_tiggal_siswa) == 'kontrakan' ? 'selected' : '' }}>
                                            Kontrakan/Kost</option>
                                        <option
                                            value="rumah sendiri"{{ old('jenis_tiggal_siswa', $data->jenis_tiggal_siswa) == 'rumah sendiri' ? 'selected' : '' }}>
                                            Rumah Keluarga</option>
                                        <option
                                            value="asrama"{{ old('jenis_tiggal_siswa', $data->jenis_tiggal_siswa) == 'asrama' ? 'selected' : '' }}>
                                            Asrama</option>
                                        <option
                                            value="panti asuhan"{{ old('jenis_tiggal_siswa', $data->jenis_tiggal_siswa) == 'panti asuhan' ? 'selected' : '' }}>
                                            Panti Asuhan</option>
                                        <option
                                            value="wali"{{ old('jenis_tiggal_siswa', $data->jenis_tiggal_siswa) == 'wali' ? 'selected' : '' }}>
                                            Wali</option>
                                        <option
                                            value="lainnya"{{ old('jenis_tiggal_siswa', $data->jenis_tiggal_siswa) == 'lainnya' ? 'selected' : '' }}>
                                            Lainnya</option>
                                    </select>
                                    @error('jenis_tiggal_siswa')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label for="transpot" class="col-sm-4 col-form-label">Transportasi</label>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <div class="form-check">
                                        <select name="transpot_siswa"
                                            class="form-control @error('transpot_siswa') is-invalid @enderror">
                                            <option value="">-- Pilih Jenis Transfortasi --</option>
                                            <option
                                                value="jalan kaki"{{ old('transpot_siswa', $data->transpot_siswa) == 'jalan kaki' ? 'selected' : '' }}>
                                                Jalan Kaki</option>
                                            <option
                                                value="sepeda motor"{{ old('transpot_siswa', $data->transpot_siswa) == 'sepeda motor' ? 'selected' : '' }}>
                                                Sepeda Motor</option>
                                            <option
                                                value="angkutan umum"{{ old('transpot_siswa', $data->transpot_siswa) == 'angkutan umum' ? 'selected' : '' }}>
                                                Angkutan Umum</option>
                                            <option
                                                value="lainnya"{{ old('transpot_siswa', $data->transpot_siswa) == 'lainnya' ? 'selected' : '' }}>
                                                Lainnya</option>
                                        </select>
                                        @error('transpot_siswa')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="kps" class="col-sm-2 col-form-label">Nomor KPS</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('kps_siswa') is-invalid @enderror"
                            id="inputKPS" name="kps_siswa" placeholder="Nomor Kartu Perlindungan Sosial"
                            value="{{ $data->kps_siswa != null ? $data->kps_siswa : old('kps_siswa') }}">
                        @error('kps_siswa')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
        </div>

        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary float-right">Simpan dan Lanjutkan</button>
        </div>
        <!-- /.card-footer -->
        </form>
    </div>
@endsection
