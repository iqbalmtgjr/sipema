@extends('layouts.master')
@section('content')
    {{-- <h1 class="h3 mb-4 text-gray-800">Formulir Pendidikan</h1> --}}
    <div class="card">
        <div class="card-header">
            <h6 class="text-primary">Perolehan Informasi PMB STKIP Persada Khatulistiwa Sintang</h6>
        </div>
        <div class="card-body">
            <form action="postInfopmb" method="post">
                @csrf
                <div class="form-group row">
                    <label for="namainforman" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control  @error('nama_informan') is-invalid @enderror"
                            id="namainforman" name="nama_informan" placeholder="Nama"
                            value="{{ $data == true && $data->nama_informan != null ? $data->nama_informan : old('nama_informan') }}">
                        @error('nama_informan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nohp" class="col-sm-2 col-form-label">No HP</label>
                    {{-- <div class="col-sm-10"> --}}
                    <div class="col-sm-10 input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">+62</span>
                        </div>
                        <input type="number" class="form-control @error('no_hp') is-invalid @enderror" id="inputNOHP"
                            name="no_hp" placeholder="8xxxxxxxxx"
                            value="{{ $data == true && $data->no_hp != null ? $data->no_hp : old('no_hp') }}">
                    @error('no_hp')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    {{-- </div> --}}
                </div>
                <div class="form-group row">
                    <label for="nohp" class="col-sm-2 col-form-label">Media Informasi<strong
                            style="color: red">*</strong></label>
                    <div class="col-sm-10">
                        <select name="media_info"
                            class="form-control @error('media_info') is-invalid @enderror">
                            <option value="">-- Pilih Media Informasi --</option>
                            <option value="brosur"
                                @if ($data == true && $data->media_info != null) {{ $data->media_info == 'brosur' ? 'selected' : '' }} @else {{ old('media_info') == 'brosur' ? 'selected' : '' }} @endif>
                                Brosur</option>
                            <option value="instagram"
                                @if ($data == true && $data->media_info != null) {{ $data->media_info == 'instagram' ? 'selected' : '' }} @else {{ old('media_info') == 'instagram' ? 'selected' : '' }} @endif>
                                Instagram
                            </option>
                            <option value="facebook"
                                @if ($data == true && $data->media_info != null) {{ $data->media_info == 'facebook' ? 'selected' : '' }} @else {{ old('media_info') == 'facebook' ? 'selected' : '' }} @endif>
                                Facebook
                            </option>
                            <option value="tiktok"
                                @if ($data == true && $data->media_info != null) {{ $data->media_info == 'tiktok' ? 'selected' : '' }} @else {{ old('media_info') == 'tiktok' ? 'selected' : '' }} @endif>
                                Tiktok
                            </option>
                            <option value="baliho"
                                @if ($data == true && $data->media_info != null) {{ $data->media_info == 'radio' ? 'selected' : '' }} @else {{ old('media_info') == 'radio' ? 'selected' : '' }} @endif>
                                Radio
                            </option>
                            <option value="baliho"
                                @if ($data == true && $data->media_info != null) {{ $data->media_info == 'baliho' ? 'selected' : '' }} @else {{ old('media_info') == 'baliho' ? 'selected' : '' }} @endif>
                                Baliho
                            </option>
                            <option value="website"
                                @if ($data == true && $data->media_info != null) {{ $data->media_info == 'website' ? 'selected' : '' }} @else {{ old('media_info') == 'website' ? 'selected' : '' }} @endif>
                                Website
                            </option>
                            <option value="poster"
                                @if ($data == true && $data->media_info != null) {{ $data->media_info == 'poster' ? 'selected' : '' }} @else {{ old('media_info') == 'poster' ? 'selected' : '' }} @endif>
                                Poster
                            </option>
                            <option value="whatsapp"
                                @if ($data == true && $data->media_info != null) {{ $data->media_info == 'whatsapp' ? 'selected' : '' }} @else {{ old('media_info') == 'whatsapp' ? 'selected' : '' }} @endif>
                                Whatsapp
                            </option>
                        </select>
                        @error('media_info')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary btn-md mt-2 float-right">Simpan dan Lanjutkan</button>
    </form>
@endsection
