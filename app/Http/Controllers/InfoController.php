<?php

namespace App\Http\Controllers;

use Midtrans\Snap;
use Midtrans\Config;
use App\Models\Pmbakun;
use App\Models\Midtrans;
use App\Models\Pmbprodi;
use App\Models\Pmbsiswa;
use App\Models\Pmbjadwal;
use App\Models\Pmbupload;
use App\Models\Buktibayar;
use Midtrans\Notification;
use Illuminate\Http\Request;
use App\Models\Pmbpenerimaan;
use App\Models\Biayakuliahpmb;
use App\Models\Pembayaranrinci;
use Illuminate\Support\Facades\Validator;
use Midtrans\Transaction;

class InfoController extends Controller
{
    public function __construct()
    {
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.is_sanitized');
        Config::$is3ds = config('midtrans.is_3ds');
    }

    public function index()
    {
        $biaya = Biayakuliahpmb::all();
        $cekjalur = Pmbprodi::where('prodi_id_siswa', auth()->user()->pengenal_akun)->first();
        $jadwal = Pmbjadwal::all();
        $data = Pmbsiswa::where('akun_siswa', auth()->user()->pengenal_akun)->first();
        $regis = Buktibayar::where('akunb_msiswa', auth()->user()->pengenal_akun)->where('validasi_bukti', 2)->first();
        // dd($regis);
        return view('info.infopmb', compact('biaya', 'cekjalur', 'data', 'regis'));
    }

    public function infoMhs()
    {
        $data = Pmbakun::leftJoin('pmb_siswa', 'pmb_akun.pengenal_akun', '=', 'pmb_siswa.akun_siswa')
            ->leftJoin('pmb_prodi', 'pmb_akun.pengenal_akun', '=', 'pmb_prodi.prodi_id_siswa')
            ->where('pmb_akun.pengenal_akun', auth()->user()->pengenal_akun)
            ->first();
        $cekputus = Pmbpenerimaan::where('siswa_penerimaan', auth()->user()->pengenal_akun)->where('umumkan', 1)->first();
        // if ($cekputus == true && $cekputus->status_penerimaan == 1) {
        //     return redirect('pembayaran');
        // } else {
        return view('info.index', compact('data', 'cekputus'));
        // }
    }

    public function pembayaran(Request $request)
    {
        $cekputus = Pmbpenerimaan::where('siswa_penerimaan', auth()->user()->pengenal_akun)->where('umumkan', 1)->first();
        $data = Pmbsiswa::where('akun_siswa', auth()->user()->pengenal_akun)->first();
        $data_akun = Pmbakun::where('pengenal_akun', auth()->user()->pengenal_akun)->first();
        $biaya = Biayakuliahpmb::all();
        $cekbukti = Pmbupload::where('upload_id_siswa', auth()->user()->pengenal_akun)->first();
        $cekjalur = Pmbprodi::where('prodi_id_siswa', auth()->user()->pengenal_akun)->first();

        // dd($cek_midtrans);

        $order_id = rand();
        $params = array(
            'transaction_details' => array(
                'order_id' => $order_id,
                'gross_amount' => 300000,
            ),
            'customer_details' => array(
                'first_name' => $data->nama_siswa,
                'email' => $data_akun->email_akun_siswa,
                'phone' => $data->hp_siswa,
            ),
            'enabled_payments' => array(
                'bca_va',
                'permata_va',
                'bni_va',
                'bri_epay',
                'bri_va',
                'echannel',
                'cimb_va',
                'other_va',
                'gopay',
                'shopeepay',
                'other_qris',
                'indomaret',
                'alfamart',
            ),
        );

        $midtrans = Midtrans::where('midtrans_akun_siswa', auth()->user()->pengenal_akun)->orderBy('id', 'desc')->get();
        $cek_midtrans = Midtrans::where('midtrans_akun_siswa', auth()->user()->pengenal_akun)->where('transaction_status', 'settlement')->first();

        if ($cek_midtrans != null) {
            $snapToken = null;
        } else {
            $snapToken = Snap::getSnapToken($params);
        }
        // dd($snapToken);
        return view('info.pembayaran', compact('cekputus', 'data', 'biaya', 'cekbukti', 'cekjalur', 'snapToken', 'midtrans'));
    }

    public function valid(Request $request)
    {
        // $serverKey = config('midtrans.server_key');
        // $hashed = hash('sha512', $request->order_id . $request->status_code . $request->gross_amount . $serverKey);
        // if ($hashed == $request->signature_key) {
        if ($request->transaction_status == "settlement") {
            $data = Pmbsiswa::where('akun_siswa', $request->pengenal_akun)->first();
            $data->update(['valid_bayar' => 2]);
        }
        // }

        $midtrans = Midtrans::updateOrCreate(
            ['order_id' => $request->order_id],
            [
                'midtrans_akun_siswa' => $request->pengenal_akun,
                'email' => $request->email_siswa,
                'jmlh_pembayaran' => $request->gross_amount,
                'transaction_status' => $request->transaction_status,
                'tgl_transaksi' => now(),
            ]
        );
    }

    public function cekTransaksi()
    {
        $data_siswa = Midtrans::where('midtrans_akun_siswa', auth()->user()->pengenal_akun)->get();
        foreach ($data_siswa as $midtrans) {
            $status = Transaction::status($midtrans->order_id);
            if ($status) {
                $data = Midtrans::where('order_id', $midtrans->order_id)->first();
                $data->update(['transaction_status' => $status->transaction_status]);

                if ($status->transaction_status == "settlement") {
                    $data = Pmbsiswa::where('akun_siswa', auth()->user()->pengenal_akun)->first();
                    $data->update(['valid_bayar' => 2]);
                }
            }
        }
        return redirect()->back();
    }

    public function postMetodeBayar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'metode_bayar' => 'required',
        ]);

        if ($validator->fails()) {
            toastr()->error('Ada Kesalahan Saat Penginputan!, lebih teliti lagi', 'Gagal');
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = Pmbsiswa::where('akun_siswa', auth()->user()->pengenal_akun)->first();
        $data->update([
            'metode_bayar' => $request->metode_bayar
        ]);

        // toastr()->success('Metode bayar berhasil diinput!', 'Selamat');
        return redirect()->back();
    }

    public function uploadBukti(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'foto' => 'required|image|mimes:png,jpg|max:5120',
        ]);

        if ($validator->fails()) {
            toastr()->error('Ada Kesalahan Saat Penginputan!, lebih teliti lagi', 'Gagal');
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = Pmbupload::where('upload_id_siswa', auth()->user()->pengenal_akun)->first();
        $extension = $request->foto->extension();
        $nama_file = round(microtime(true) * 1000) . '.' . $extension;
        if ($data == false) {
            $request->file('foto')->move(public_path('/../../public_html/daftar.persadakhatulistiwa.ac.id/assets/berkas/bukti/'), $nama_file);
            Pmbupload::create([
                'upload_id_siswa' => auth()->user()->pengenal_akun,
                'pembayaran_upload' => $nama_file
            ]);

            toastr()->success('Bukti berhasil diupload!', 'Selamat');
            return redirect()->back();
        } else {
            $request->file('foto')->move(public_path('/../../public_html/daftar.persadakhatulistiwa.ac.id/assets/berkas/bukti/'), $nama_file);
            $data->update([
                'upload_id_siswa' => auth()->user()->pengenal_akun,
                'pembayaran_upload' => $nama_file
            ]);

            toastr()->success('Bukti berhasil diupdate!', 'Selamat');
            return redirect()->back();
        }
    }

    public function infoTes()
    {
        $gelombang = Pmbakun::where('pengenal_akun', auth()->user()->pengenal_akun)->first()->gelombang;
        $data = Pmbjadwal::find($gelombang);
        $cekjalur = Pmbprodi::where('prodi_id_siswa', auth()->user()->pengenal_akun)->first();

        $cek_pembayaran = Pmbsiswa::where('akun_siswa', auth()->user()->pengenal_akun)->first();
        if ($cek_pembayaran->valid_bayar != 2) {
            toastr()->warning('Anda belum melakukan pembayaran', 'Peringatan');
            return redirect()->back();
        }
        return view('info.infotes', compact('data', 'cekjalur'));
    }

    public function konfirmasi()
    {
        $cekjalur = Pmbprodi::where('prodi_id_siswa', auth()->user()->pengenal_akun)->first();
        $biaya = Biayakuliahpmb::all();
        $bayar = Buktibayar::where('akunb_msiswa', auth()->user()->pengenal_akun)->get();
        return view('info.konfirmasi_bayar', compact('cekjalur', 'biaya', 'bayar'));
    }

    public function postKonfirmasi(Request $request)
    {
        // dd($request->tanggal_transaksi, $request->jam_transaksi);
        $validator = Validator::make($request->all(), [
            'nama_pengirim' => 'required|max:100',
            'bank_pengirim' => 'required|max:50',
            'tanggal_transaksi' => 'required',
            'jam_transaksi' => 'required',
            'no_referensi' => 'nullable|max:100',
            'jumlah_pembayaran' => 'required|max:11',
            'detail_pembayaran' => 'required',
        ]);

        if ($validator->fails()) {
            toastr()->error('Ada Kesalahan Saat Penginputan!, lebih teliti lagi', 'Gagal');
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $masuk_bukti = Buktibayar::create([
            'akunb_msiswa' => auth()->user()->pengenal_akun,
            'nama_pengirim' => $request->nama_pengirim,
            'bank_pengirim' => $request->bank_pengirim,
            'tgl_trans' => $request->tanggal_transaksi,
            'jam_trans' => $request->jam_transaksi,
            'nomor_refe' => $request->no_referensi,
            'jlh_bayar' => $request->jumlah_pembayaran,
            'validasi_bukti' => 1,
            'konfirm_bauk' => 1,
        ]);

        $cekjalur = Pmbprodi::where('prodi_id_siswa', auth()->user()->pengenal_akun)->first();
        $item = $request->detail_pembayaran;
        $query = Biayakuliahpmb::whereIn('id_biayakuliahpmb', $item)->get();

        date_default_timezone_set("Asia/Jakarta");
        $tahun_skrng = date('Y');
        $tahun_skrngtambah1 = date('Y') + 1;

        $point = array();
        if ($cekjalur->jalur == 'test') {
            foreach ($query as $rinci) {
                $point[] = array(
                    'bukti_id_bayar' => $masuk_bukti->id_bukti_bayar,
                    'akun_pembayaran' => auth()->user()->pengenal_akun,
                    'jenis_bayar_rinci' => $rinci->id_biayakuliahpmb,
                    'jumlah_rinci' => $rinci->test_biaya,
                    'user_id_rinci' => auth()->user()->id_siswa,
                    'semester_rinci' => 1,
                    'smt_nama' => 'ganjil',
                    'tahun_ajaran' => $tahun_skrng . '/' . $tahun_skrngtambah1
                );
            }
        } elseif ($cekjalur->jalur == 'prestasi') {
            foreach ($query as $rinci) {
                $point[] = array(
                    'bukti_id_bayar' => $masuk_bukti->id_bukti_bayar,
                    'akun_pembayaran' => auth()->user()->pengenal_akun,
                    'jenis_bayar_rinci' => $rinci->id_biayakuliahpmb,
                    'jumlah_rinci' => $rinci->prestasi_biaya,
                    'user_id_rinci' => auth()->user()->id_siswa,
                    'semester_rinci' => 1,
                    'smt_nama' => 'ganjil',
                    'tahun_ajaran' => $tahun_skrng . '/' . $tahun_skrngtambah1
                );
            }
        } else {
            foreach ($query as $rinci) {
                $point[] = array(
                    'bukti_id_bayar' => $masuk_bukti->id_bukti_bayar,
                    'akun_pembayaran' => auth()->user()->pengenal_akun,
                    'jenis_bayar_rinci' => $rinci->id_biayakuliahpmb,
                    'jumlah_rinci' => $rinci->reguler2_biaya,
                    'user_id_rinci' => auth()->user()->id_siswa,
                    'semester_rinci' => 1,
                    'smt_nama' => 'ganjil',
                    'tahun_ajaran' => $tahun_skrng . '/' . $tahun_skrngtambah1
                );
            }
        }
        // dd($point);
        Pembayaranrinci::insert($point);

        toastr()->success('Rincian berhasil diinput!', 'Selamat');
        return redirect()->back();
    }

    public function uploadBuktibayar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'bukti' => 'required|mimes:jpg,png|max:5120',
        ]);

        if ($validator->fails()) {
            toastr()->error('Ada kesalahan saat penginputan!, lebih teliti lagi', 'Gagal');
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = Buktibayar::find($request->id);
        $extension = $request->bukti->extension();
        $nama_file = round(microtime(true) * 1000) . '.' . $extension;
        if ($data->bukti_bayar) {
            // Hapus yang lama dulu foto filenya
            $path = public_path('/../../public_html/daftar.persadakhatulistiwa.ac.id/assets/berkas/bukti/' . $data->bukti_bayar);
            if (file_exists($path)) {
                @unlink($path);
            }
        }

        $request->file('bukti')->move(public_path('/../../public_html/daftar.persadakhatulistiwa.ac.id/assets/berkas/bukti/'), $nama_file);
        $data->update([
            'bukti_bayar' => $nama_file
        ]);

        toastr()->success('Bukti bayar berhasil diupload!', 'Selamat');
        return redirect()->back();
    }

    public function getdata($id)
    {
        $data = Buktibayar::find($id);
        return $data;
    }
}
