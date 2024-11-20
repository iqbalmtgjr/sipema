<?php

namespace App\Http\Controllers;

use App\Models\Pkkmb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PkkmbController extends Controller
{

    public function postPkkmb(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'provinsi' => 'required',
        ]);

        if ($validator->fails()) {
            toastr()->error('Ada Kesalahan Saat Penginputan!, lebih teliti lagi', 'Gagal');
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
        
        if (auth()->user()->kab_siswa == null){
            toastr()->error('Data anda belum lengkap!, Silahkan lengkapi data anda terlebih dahulu', 'Gagal');
            return redirect('calon');
        }
        
        $cek = Pkkmb::where('pengenal_akun_pkkmb', auth()->user()->pengenal_akun)->first();
        if($cek){
            toastr()->warning('Anda sudah terdaftar di PKKMB', 'Peringatan');
            return redirect()->back();
        }

        Pkkmb::create([
            'no_daftar' => auth()->user()->ref,
            'pengenal_akun_pkkmb' => auth()->user()->pengenal_akun,
            'prov_siswa' => $request->provinsi,
            'kab_siswa' => auth()->user()->kab_siswa,
            'ig_siswa' => $request->instagram,
            'fb_siswa' => $request->facebook,
            'tiktok_siswa' => $request->tiktok,
            'tahun_pmb' => date('Y'),
        ]);

        toastr()->success('Berhasil daftar PKKMB!', 'Selamat');
        return redirect()->back();
    }

}
