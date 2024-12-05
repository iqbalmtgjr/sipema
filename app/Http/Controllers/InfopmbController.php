<?php

namespace App\Http\Controllers;

use App\Models\Pmbinfo;
use App\Models\Pmbsiswa;
use App\Models\Pmbsekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InfopmbController extends Controller
{
    public function index()
    {
        $cek_calon = Pmbsiswa::where('akun_siswa', auth()->user()->pengenal_akun)->first();
        if ($cek_calon->nik_siswa == null) {
            toastr()->warning('Anda belum mengisi data calon siswa', 'Peringatan');
            return redirect()->back();
        }
        $cek_pendidikan = Pmbsekolah::where('sekolah_id_siswa', auth()->user()->pengenal_akun)->first();
        if ($cek_pendidikan == false) {
            toastr()->warning('Anda belum mengisi data pendidikan', 'Peringatan');
            return redirect()->back();
        }

        $data = Pmbinfo::where('info_siswa_akun', auth()->user()->pengenal_akun)->first();
        $cekvalid = Pmbsiswa::where('akun_siswa', auth()->user()->pengenal_akun)->first();
        if ($cekvalid->valid_bayar != 2) {
            toastr()->warning('Anda belum melakukan pembayaran', 'Peringatan');
            return redirect()->back();
        }
        return view('infopmb.index', compact('data', 'cekvalid'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'media_info' => 'required',
        ]);

        if ($validator->fails()) {
            toastr()->error('Ada Kesalahan Saat Penginputan!, lebih teliti lagi', 'Gagal');
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = Pmbinfo::where('info_siswa_akun', auth()->user()->pengenal_akun)->first();
        if ($data == false) {
            Pmbinfo::create([
                'info_siswa_akun' => auth()->user()->pengenal_akun,
                'media_info' => $request->media_info,
            ]);
        } else {
            $data->update($request->all());
        }

        toastr()->success('Data berhasil diinput!', 'Selamat');
        return redirect('ortu');
    }
}
