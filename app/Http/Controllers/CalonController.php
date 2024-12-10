<?php

namespace App\Http\Controllers;

use App\Models\Pmbakun;
use App\Models\Midtrans;
use App\Models\Pmbsiswa;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CalonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd(Auth::user());
        $data = Pmbsiswa::where('akun_siswa', auth()->user()->pengenal_akun)->first();
        $cek_midtrans = Midtrans::where('midtrans_akun_siswa', auth()->user()->pengenal_akun)->where('transaction_status', 'settlement')->first();
        // dd($cek_midtrans ==);
        if ($data->valid_bayar != 2 && $cek_midtrans == false) {
            toastr()->warning('Anda belum melakukan pembayaran', 'Peringatan');
            return redirect()->back();
        }

        return view('calon.index', compact('data'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'nik_siswa' => 'required|max:16',
            'tmp_lahir_siswa' => 'required|max:50',
            'tgl_lahir_siswa' => 'required',
            'jekel_siswa' => 'required',
            'agama_siswa' => 'required',
            'alamat_siswa' => 'max:100',
            'dusun_siswa' => 'max:50',
            'rtrw_siswa' => 'max:20',
            'desa_siswa' => 'required|max:50',
            'kec_siswa' => 'required|max:50',
            'kab_siswa' => 'required|max:50',
            'pos_siswa' => 'required|max:5',
            'hp_siswa' => 'required|max:13',
            'kps_siswa' => 'max:50',
        ]);

        if ($validator->fails()) {
            toastr()->error('Ada Kesalahan Saat Penginputan!, lebih teliti lagi', 'Gagal');
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = Pmbsiswa::where('akun_siswa', auth()->user()->pengenal_akun)->first();
        $data->update($request->all());

        toastr()->success('Data berhasil diinput!, Silahkan lanjutkan mengisi data sekolah', 'Selamat');
        return redirect('pendidikan');
    }

    public function downloadkartu()
    {
        $warga = Pmbakun::leftJoin('pmb_siswa', 'pmb_akun.pengenal_akun', '=', 'pmb_siswa.akun_siswa')
            ->leftJoin('pmb_prodi', 'pmb_akun.pengenal_akun', '=', 'pmb_prodi.prodi_id_siswa')
            ->leftJoin('prodi', 'pmb_prodi.pilihan_satu', '=', 'prodi.id_prodi')
            ->leftJoin('prod', 'pmb_prodi.pilihan_dua', '=', 'prod.id_prodi_baru')
            ->where('pmb_akun.pengenal_akun', auth()->user()->pengenal_akun)
            ->first();
        $pdf = Pdf::loadView('pdf.kartu_pendaftaran', compact('warga'))->setPaper('a5', 'potrait');
        return $pdf->stream('Kartu Pendaftaran.pdf');
    }
}
