<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\SendAkun;
use App\Models\Pmbakun;
use App\Models\Pmbprodi;
use App\Models\Pmbsiswa;
use App\Models\Gelombang;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('isTamu')->except('logout');
    }

    public function register()
    {
        return view('auth.register');
        // return view('errors.error');
    }

    public function registertes()
    {
        return view('auth.register');
    }

    public function registerPost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_siswa' => 'required|string|max:255',
            'nis_siswa' => 'required',
            'hp_siswa' => 'required',
            'email_akun_siswa' => 'required|string|email|max:255|unique:pmb_akun',
            'prodi' => 'required',
            'prodi2' => 'required',
            'jalur' => 'required',
            'g-recaptcha-response' => 'required|captcha'
        ]);

        if ($validator->fails()) {
            toastr()->error('Ada Kesalahan Saat Penginputan!', 'Gagal');
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $rand_password = Str::random(6);
        $rand_password = rand(100000, 999999);

        $rand_akun = Str::random(20);

        $rand_ref = Str::random(4);
        $rand_ref = rand(100000, 999999);

        $gelombang = Gelombang::find(1)->gel;

        Pmbakun::create([
            'pengenal_akun' => $rand_akun,
            'email_akun_siswa' => $request->email_akun_siswa,
            'kunci_akun_siswa' => Hash::make($rand_password),
            'kuncigudang' => $rand_password,
            'status_akun' => 0,
            'gelombang' => $gelombang,
            'alamat_ip_daftar' => $request->ip(),
            'daftar_akun' => now()->timestamp,
        ]);

        Pmbsiswa::create([
            'akun_siswa' => $rand_akun,
            'ref' => $rand_ref,
            'nis_siswa' => $request->nis_siswa,
            'nama_siswa' => $request->nama_siswa,
            'hp_siswa' => $request->hp_siswa,
            'valid_bayar' => ""
        ]);

        Pmbprodi::create([
            'prodi_id_siswa' => $rand_akun,
            'pilihan_satu' => $request->prodi,
            'pilihan_dua' => $request->prodi2,
            'jalur' => $request->jalur,
        ]);

        $akun = Pmbakun::leftJoin('pmb_siswa', 'pmb_akun.pengenal_akun', '=', 'pmb_siswa.akun_siswa')
            ->leftJoin('pmb_prodi', 'pmb_akun.pengenal_akun', '=', 'pmb_prodi.prodi_id_siswa')
            ->where('pmb_akun.pengenal_akun', $rand_akun)
            ->first();

        \Mail::to($request->email_akun_siswa)->send(new SendAkun($akun));

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.fonnte.com/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('target' => '62.' . $request->hp_siswa . '|a', 'message' => 'Halo ' . $request->nama_siswa . ', akun anda telah dibuat. Password akun anda adalah ' . $rand_password . ' silahkan login melalui web https://daftar.persadakhatulistiwa.ac.id/login. Terima kasih'),
            CURLOPT_HTTPHEADER => array(
                'Authorization: nPoQNQMzhDVb6SHsvXcR'
            ),
        ));

        $response = curl_exec($curl);

        toastr()->success('Akun berhasil dibuat! Cek email atau whatsapp anda untuk melihat password yang digunakan.', 'Selamat');
        return redirect('/login')->with('sukses', 'Cek email anda untuk melihat password');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function loginPost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email_akun_siswa' => 'required',
            'kunci_akun_siswa' => 'required',
            'g-recaptcha-response' => 'required|captcha'
        ]);

        if ($validator->fails()) {
            toastr()->error('Ada Kesalahan Saat Penginputan!', 'Gagal');
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $credentials = [
            'email_akun_siswa' => $request->email_akun_siswa,
            'kunci_akun_siswa' => $request->kunci_akun_siswa,
        ];

        if (Auth::attempt($credentials)) {
            $data = Pmbakun::where('pengenal_akun', auth()->user()->pengenal_akun)->first();
            $data->update([
                'last_login_siswa' => now()->timestamp,
                'alamat_ip_login' => $request->ip(),
            ]);
            toastr()->success('Sistem Informasi Pendaftaran Mahasiswa', 'Selamat Datang di SIPEMA ' . auth()->user()->nama_siswa);
            // return redirect('/infoPmb');
            return redirect('/info');
        }

        toastr()->error('Email atau Password Salah!', 'Gagal');
        return redirect()->back();
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
