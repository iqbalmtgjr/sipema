@extends('layouts.master')
@section('content')
    <form action="{{ url('postOrtu') }}" method="post">
        @csrf
        <div class="card">
            <div class="card-header">
                <h6 class="text-primary">Identitas Ayah</h6>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="form-group row">
                    <label for="inputNIK" class="col-sm-2 col-form-label">NIK<strong style="color: red">*</strong></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('nik_ayah') is-invalid @enderror" id="inputNIK"
                            name="nik_ayah" placeholder="Nomor Induk Kependudukan"
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
                        <input type="text" class="form-control @error('nama_ayah') is-invalid @enderror" id="inputKPS"
                            name="nama_ayah" placeholder="Nama Ayah"
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
                            <option value="karyawan swasta"
                                @if ($data == true && $data->pekerjaan_ayah != null) {{ $data->pekerjaan_ayah == 'karyawan swasta' ? 'selected' : '' }} @else {{ old('pekerjaan_ayah') == 'karyawan swasta' ? 'selected' : '' }} @endif>
                                Karyawan Swasta</option>
                            <option value="pegawai negeri"
                                @if ($data == true && $data->pekerjaan_ayah != null) {{ $data->pekerjaan_ayah == 'pegawai negeri' ? 'selected' : '' }} @else {{ old('pekerjaan_ayah') == 'pegawai negeri' ? 'selected' : '' }} @endif>
                                Pegawai Negeri</option>
                            <option value="wiraswasta"
                                @if ($data == true && $data->pekerjaan_ayah != null) {{ $data->pekerjaan_ayah == 'wiraswasta' ? 'selected' : '' }} @else {{ old('pekerjaan_ayah') == 'wiraswasta' ? 'selected' : '' }} @endif>
                                Wiraswasta</option>
                            <option value="pensiunan"
                                @if ($data == true && $data->pekerjaan_ayah != null) {{ $data->pekerjaan_ayah == 'pensiunan' ? 'selected' : '' }} @else {{ old('pekerjaan_ayah') == 'pensiunan' ? 'selected' : '' }} @endif>
                                Pensiunan</option>
                            <option value="ibu rumah tangga"
                                @if ($data == true && $data->pekerjaan_ayah != null) {{ $data->pekerjaan_ayah == 'ibu rumah tangga' ? 'selected' : '' }} @else {{ old('pekerjaan_ayah') == 'ibu rumah tangga' ? 'selected' : '' }} @endif>
                                Ibu Rumah Tangga</option>
                            <option value="lainnya"
                                @if ($data == true && $data->pekerjaan_ayah != null) {{ $data->pekerjaan_ayah == 'lainnya' ? 'selected' : '' }} @else {{ old('pekerjaan_ayah') == 'lainnya' ? 'selected' : '' }} @endif>
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
                        <select class="form-control @error('pendidikan_ayah') is-invalid @enderror" name="pendidikan_ayah"
                            id="">
                            <option value="">-- Pilih Pendidikan Terakhir Ayah --</option>
                            <option value="SD"
                                @if ($data == true && $data->pendidikan_ayah != null) {{ $data->pendidikan_ayah == 'SD' ? 'selected' : '' }} @else {{ old('pendidikan_ayah') == 'SD' ? 'selected' : '' }} @endif>
                                SD</option>
                            <option value="SMP/Mts"
                                @if ($data == true && $data->pendidikan_ayah != null) {{ $data->pendidikan_ayah == 'SMP/Mts' ? 'selected' : '' }} @else {{ old('pendidikan_ayah') == 'SMP/Mts' ? 'selected' : '' }} @endif>
                                SMP/Mts</option>
                            <option value="SMA/SMK"
                                @if ($data == true && $data->pendidikan_ayah != null) {{ $data->pendidikan_ayah == 'SMA/SMK' ? 'selected' : '' }} @else {{ old('pendidikan_ayah') == 'SMA/SMK' ? 'selected' : '' }} @endif>
                                SMA/SMK</option>
                            <option value="Diploma"
                                @if ($data == true && $data->pendidikan_ayah != null) {{ $data->pendidikan_ayah == 'Diploma' ? 'selected' : '' }} @else {{ old('pendidikan_ayah') == 'Diploma' ? 'selected' : '' }} @endif>
                                Diploma</option>
                            <option value="Sarjana"
                                @if ($data == true && $data->pendidikan_ayah != null) {{ $data->pendidikan_ayah == 'Sarjana' ? 'selected' : '' }} @else {{ old('pendidikan_ayah') == 'Sarjana' ? 'selected' : '' }} @endif>
                                Sarjana</option>
                            <option value="Pasca Sarjana"
                                @if ($data == true && $data->pendidikan_ayah != null) {{ $data->pendidikan_ayah == 'Pasca Sarjana' ? 'selected' : '' }} @else {{ old('pendidikan_ayah') == 'Pasca Sarjana' ? 'selected' : '' }} @endif>
                                Pasca Sarjana</option>
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
                        <input type="number" class="form-control @error('hp_ayah') is-invalid @enderror" id="inputNOHP"
                            name="hp_ayah" placeholder="8xxxxxxxxxx"
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
                            <option value="<1juta"
                                @if ($data == true && $data->penghasilan_ayah != null) {{ $data->penghasilan_ayah == '<1juta' ? 'selected' : '' }} @else {{ old('penghasilan_ayah') == '<1juta' ? 'selected' : '' }} @endif>
                                < 1 Juta</option>
                            <option value="2 - 4juta"
                                @if ($data == true && $data->penghasilan_ayah != null) {{ $data->penghasilan_ayah == '2 - 4juta' ? 'selected' : '' }} @else {{ old('penghasilan_ayah') == '2 - 4juta' ? 'selected' : '' }} @endif>
                                2 - 4 Juta</option>
                            <option value=">5juta" @if ($data == true && $data->penghasilan_ayah != null)
                                {{ $data->penghasilan_ayah == '>5juta' ? 'selected' : '' }}
                            @else
                                {{ old('penghasilan_ayah') == '>5juta' ? 'selected' : '' }}
                                @endif> > 5 Juta</option>
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
                        <input type="text" class="form-control @error('nik_ibu') is-invalid @enderror" id="inputNIK"
                            name="nik_ibu" placeholder="Nomor Induk Kependudukan"
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
                                <input type="text" class="form-control @error('tmp_lahir_ibu') is-invalid @enderror"
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
                        <select class="form-control @error('pekerjaan_ibu') is-invalid @enderror" name="pekerjaan_ibu"
                            id="">
                            <option value="">-- Pilih Pekerjaan Ibu --</option>
                            <option value="karyawan swasta"
                                @if ($data == true && $data->pekerjaan_ibu != null) {{ $data->pekerjaan_ibu == 'karyawan swasta' ? 'selected' : '' }} @else {{ old('pekerjaan_ibu') == 'karyawan swasta' ? 'selected' : '' }} @endif>
                                Karyawan Swasta</option>
                            <option value="pegawai negeri"
                                @if ($data == true && $data->pekerjaan_ibu != null) {{ $data->pekerjaan_ibu == 'pegawai negeri' ? 'selected' : '' }} @else {{ old('pekerjaan_ibu') == 'pegawai negeri' ? 'selected' : '' }} @endif>
                                Pegawai Negeri</option>
                            <option value="wiraswasta"
                                @if ($data == true && $data->pekerjaan_ibu != null) {{ $data->pekerjaan_ibu == 'wiraswasta' ? 'selected' : '' }} @else {{ old('pekerjaan_ibu') == 'wiraswasta' ? 'selected' : '' }} @endif>
                                Wiraswasta</option>
                            <option value="pensiunan"
                                @if ($data == true && $data->pekerjaan_ibu != null) {{ $data->pekerjaan_ibu == 'pensiunan' ? 'selected' : '' }} @else {{ old('pekerjaan_ibu') == 'pensiunan' ? 'selected' : '' }} @endif>
                                Pensiunan</option>
                            <option value="ibu rumah tangga"
                                @if ($data == true && $data->pekerjaan_ibu != null) {{ $data->pekerjaan_ibu == 'ibu rumah tangga' ? 'selected' : '' }} @else {{ old('pekerjaan_ibu') == 'ibu rumah tangga' ? 'selected' : '' }} @endif>
                                Ibu Rumah Tangga</option>
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
                        <select class="form-control @error('pendidikan_ibu') is-invalid @enderror" name="pendidikan_ibu"
                            id="">
                            <option value="">-- Pilih Pendidikan Terakhir Ibu --</option>
                            <option value="SD"
                                @if ($data == true && $data->pendidikan_ibu != null) {{ $data->pendidikan_ibu == 'SD' ? 'selected' : '' }} @else {{ old('pendidikan_ibu') == 'SD' ? 'selected' : '' }} @endif>
                                SD</option>
                            <option value="SMP/Mts"
                                @if ($data == true && $data->pendidikan_ibu != null) {{ $data->pendidikan_ibu == 'SMP/Mts' ? 'selected' : '' }} @else {{ old('pendidikan_ibu') == 'SMP/Mts' ? 'selected' : '' }} @endif>
                                SMP/Mts</option>
                            <option value="SMA/SMK"
                                @if ($data == true && $data->pendidikan_ibu != null) {{ $data->pendidikan_ibu == 'SMA/SMK' ? 'selected' : '' }} @else {{ old('pendidikan_ibu') == 'SMA/SMK' ? 'selected' : '' }} @endif>
                                SMA/SMK</option>
                            <option value="Diploma"
                                @if ($data == true && $data->pendidikan_ibu != null) {{ $data->pendidikan_ibu == 'Diploma' ? 'selected' : '' }} @else {{ old('pendidikan_ibu') == 'Diploma' ? 'selected' : '' }} @endif>
                                Diploma</option>
                            <option value="Sarjana"
                                @if ($data == true && $data->pendidikan_ibu != null) {{ $data->pendidikan_ibu == 'Sarjana' ? 'selected' : '' }} @else {{ old('pendidikan_ibu') == 'Sarjana' ? 'selected' : '' }} @endif>
                                Sarjana</option>
                            <option value="Pasca Sarjana"
                                @if ($data == true && $data->pendidikan_ibu != null) {{ $data->pendidikan_ibu == 'Pasca Sarjana' ? 'selected' : '' }} @else {{ old('pendidikan_ibu') == 'Pasca Sarjana' ? 'selected' : '' }} @endif>
                                Pasca Sarjana</option>
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
                        <input type="number" class="form-control @error('hp_ibu') is-invalid @enderror" id="inputNOHP"
                            name="hp_ibu" placeholder="8xxxxxxxxxx"
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
                            <option value="<1juta"
                                @if ($data == true && $data->penghasilan_ibu != null) {{ $data->penghasilan_ibu == '<1juta' ? 'selected' : '' }} @else {{ old('penghasilan_ibu') == '<1juta' ? 'selected' : '' }} @endif>
                                < 1 Juta</option>
                            <option value="2 - 4juta"
                                @if ($data == true && $data->penghasilan_ibu != null) {{ $data->penghasilan_ibu == '2 - 4juta' ? 'selected' : '' }} @else {{ old('penghasilan_ibu') == '2 - 4juta' ? 'selected' : '' }} @endif>
                                2 - 4 Juta</option>
                            <option value=">5juta" @if ($data == true && $data->penghasilan_ibu != null)
                                {{ $data->penghasilan_ibu == '>5juta' ? 'selected' : '' }}
                            @else
                                {{ old('penghasilan_ibu') == '>5juta' ? 'selected' : '' }}
                                @endif> > 5 Juta</option>
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

            <!-- /.card-body -->
            {{-- <div class="card-footer"> --}}
            {{-- </div> --}}
            <!-- /.card-footer -->
        </div>
        <button type="submit" class="btn btn-primary float-right mt-3 mb-3">Simpan dan Lanjutkan</button>
    </form>
@endsection
