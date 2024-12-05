<?php

namespace App\Http\Controllers;

use App\Models\Pmbinfo;
use App\Models\Pmbortu;
use App\Models\Pmbsiswa;
use App\Models\Pmbsekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrtuController extends Controller
{
    public function index()
    {
        $cek_calon = Pmbsiswa::where('akun_siswa', auth()->user()->pengenal_akun)->first();
        if ($cek_calon->nik_siswa == null) {
            toastr()->warning('Anda belum mengisi data calon siswa', 'Peringatan');
            return redirect()->back();
        }
        $cek_pendidikan = Pmbsekolah::where('sekolah_id_siswa', auth()->user()->pengenal_akun)->first();
        if (!$cek_pendidikan) {
            toastr()->warning('Anda belum mengisi data pendidikan', 'Peringatan');
            return redirect()->back();
        }
        $cek_infopmb = Pmbinfo::where('info_siswa_akun', auth()->user()->pengenal_akun)->first();
        if (!$cek_infopmb) {
            toastr()->warning('Anda belum mengisi data perolehan info pmb', 'Peringatan');
            return redirect()->back();
        }

        $data = Pmbortu::where('ortu_pengenal_siswa', auth()->user()->pengenal_akun)->first();
        $cekvalid = Pmbsiswa::where('akun_siswa', auth()->user()->pengenal_akun)->first();
        if ($cekvalid->valid_bayar != 2) {
            toastr()->warning('Anda belum melakukan pembayaran', 'Peringatan');
            return redirect()->back();
        }
        return view('ortu.index', compact('data'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nik_ayah' => 'required',
            'nama_ayah' => 'required',
            'tmp_lahir_ayah' => 'required',
            'tgl_lahir_ayah' => 'required',
            'alamat_ayah' => 'required',
            'pekerjaan_ayah' => 'required',
            'pendidikan_ayah' => 'nullable',
            'hp_ayah' => 'required',
            'npwp_ayah' => 'nullable',
            'penghasilan_ayah' => 'required',
            'nik_ibu' => 'required',
            'nama_ibu' => 'required',
            'tmp_lahir_ibu' => 'required',
            'tgl_lahir_ibu' => 'required',
            'alamat_ibu' => 'required',
            'pekerjaan_ibu' => 'required',
            'pendidikan_ibu' => 'nullable',
            'hp_ibu' => 'required',
            'npwp_ibu' => 'nullable',
            'penghasilan_ibu' => 'required',
        ]);

        if ($validator->fails()) {
            toastr()->error('Ada Kesalahan Saat Penginputan! Harap teliti saat pengisian data', 'Gagal');
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = Pmbortu::where('ortu_pengenal_siswa', auth()->user()->pengenal_akun)->first();

        if ($data == true) {
            $data->update($request->all());
        } else {
            Pmbortu::create([
                'ortu_pengenal_siswa' => auth()->user()->pengenal_akun,
                'nik_ayah' => $request->nik_ayah,
                'nama_ayah' => $request->nama_ayah,
                'tmp_lahir_ayah' => $request->tmp_lahir_ayah,
                'tgl_lahir_ayah' => $request->tgl_lahir_ayah,
                'alamat_ayah' => $request->alamat_ayah,
                'pekerjaan_ayah' => $request->pekerjaan_ayah,
                'pendidikan_ayah' => $request->pendidikan_ayah,
                'hp_ayah' => $request->hp_ayah,
                'npwp_ayah' => $request->npwp_ayah,
                'penghasilan_ayah' => $request->penghasilan_ayah,
                'nik_ibu' => $request->nik_ibu,
                'nama_ibu' => $request->nama_ibu,
                'tmp_lahir_ibu' => $request->tmp_lahir_ibu,
                'tgl_lahir_ibu' => $request->tgl_lahir_ibu,
                'alamat_ibu' => $request->alamat_ibu,
                'pekerjaan_ibu' => $request->pekerjaan_ibu,
                'pendidikan_ibu' => $request->pendidikan_ibu,
                'hp_ibu' => $request->hp_ibu,
                'npwp_ibu' => $request->npwp_ibu,
                'penghasilan_ibu' => $request->penghasilan_ibu,
            ]);
        }

        toastr()->success('Data berhasil diinput!, Silahkan lanjutkan mengupload berkas yang diperlukan', 'Selamat');
        return redirect('upload');
    }
}
