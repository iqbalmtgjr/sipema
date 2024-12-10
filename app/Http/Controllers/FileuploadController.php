<?php

namespace App\Http\Controllers;

use App\Models\Pmbinfo;
use App\Models\Pmbortu;
use App\Models\Midtrans;
use App\Models\Pmbprodi;
use App\Models\Pmbsiswa;
use App\Models\Pmbupload;
use App\Models\Pmbsekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FileuploadController extends Controller
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
        $cek_infopmb = Pmbinfo::where('info_siswa_akun', auth()->user()->pengenal_akun)->first();
        if (!$cek_infopmb) {
            toastr()->warning('Anda belum mengisi data perolehan info pmb', 'Peringatan');
            return redirect()->back();
        }
        $cek_ortu = Pmbortu::where('ortu_pengenal_siswa', auth()->user()->pengenal_akun)->first();
        if ($cek_ortu == false) {
            toastr()->warning('Anda belum mengisi data orang tua atau wali', 'Peringatan');
            return redirect()->back();
        }

        $jalur = Pmbprodi::where('prodi_id_siswa', auth()->user()->pengenal_akun)->first();
        $gam = Pmbupload::where('upload_id_siswa', auth()->user()->pengenal_akun)->first();
        $cekvalid = Pmbsiswa::where('akun_siswa', auth()->user()->pengenal_akun)->first();
        $cek_midtrans = Midtrans::where('midtrans_akun_siswa', auth()->user()->pengenal_akun)->where('transaction_status', 'settlement')->first();
        if ($cekvalid->valid_bayar != 2 && $cek_midtrans == false) {
            toastr()->warning('Anda belum melakukan pembayaran', 'Peringatan');
            return redirect()->back();
        }
        return view('upload.index', compact('jalur', 'gam'));
    }

    public function foto(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'foto' => 'required|image|mimes:jpg,png|max:5120',
        ]);

        if ($validator->fails()) {
            toastr()->error('Ada Kesalahan Saat Upload File. Mohon Lebih Teliti Lagi', 'Gagal');
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = Pmbupload::where('upload_id_siswa', auth()->user()->pengenal_akun)->first();
        $extension = $request->foto->extension();
        $nama_file = round(microtime(true) * 1000) . '.' . $extension;
        if ($data == false) {
            $request->file('foto')->move(public_path('/../../public_html/daftar.persadakhatulistiwa.ac.id/assets/berkas/foto/'), $nama_file);
            Pmbupload::create([
                'upload_id_siswa' => auth()->user()->pengenal_akun,
                'foto_upload' => $nama_file
            ]);

            toastr()->success('Bukti berhasil diupload!', 'Selamat');
            return redirect()->back();
        } else {
            if (!empty($data->foto_upload)) {
                // Hapus yang lama dulu foto filenya
                $path = public_path('/../../public_html/daftar.persadakhatulistiwa.ac.id/assets/berkas/foto/' . $data->foto_upload);
                if (file_exists($path)) {
                    @unlink($path);
                }
            }

            $request->file('foto')->move(public_path('/../../public_html/daftar.persadakhatulistiwa.ac.id/assets/berkas/foto/'), $nama_file);
            $data->update([
                'foto_upload' => $nama_file
            ]);

            toastr()->success('Foto berhasil diupload!', 'Selamat');
            return redirect()->back();
        }
    }

    public function bukti(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'bukti' => 'required|mimes:jpg,png,pdf|max:5120',
        ]);

        if ($validator->fails()) {
            toastr()->error('Ada Kesalahan Saat Upload File. Mohon Lebih Teliti Lagi', 'Gagal');
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = Pmbupload::where('upload_id_siswa', auth()->user()->pengenal_akun)->first();
        $extension = $request->bukti->extension();
        $nama_file = round(microtime(true) * 1000) . '.' . $extension;
        if ($data == false) {
            $request->file('bukti')->move(public_path('/../../public_html/daftar.persadakhatulistiwa.ac.id/assets/berkas/bukti/'), $nama_file);
            Pmbupload::create([
                'upload_id_siswa' => auth()->user()->pengenal_akun,
                'pembayaran_upload' => $nama_file
            ]);

            toastr()->success('Bukti berhasil diupload!', 'Selamat');
            return redirect()->back();
        } else {
            if (!empty($data->pembayaran_upload)) {
                // Hapus yang lama dulu foto filenya
                $path = public_path('/../../public_html/daftar.persadakhatulistiwa.ac.id/assets/berkas/bukti/' . $data->pembayaran_upload);
                if (file_exists($path)) {
                    @unlink($path);
                }
            }

            $request->file('bukti')->move(public_path('/../../public_html/daftar.persadakhatulistiwa.ac.id/assets/berkas/bukti/'), $nama_file);
            $data->update([
                'pembayaran_upload' => $nama_file
            ]);

            toastr()->success('Bukti berhasil diupload!', 'Selamat');
            return redirect()->back();
        }
    }

    public function ijazah(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ijazah' => 'required|mimes:jpg,png,pdf|max:5120',
        ]);

        if ($validator->fails()) {
            toastr()->error('Ada Kesalahan Saat Upload File. Mohon Lebih Teliti Lagi', 'Gagal');
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = Pmbupload::where('upload_id_siswa', auth()->user()->pengenal_akun)->first();
        $extension = $request->ijazah->extension();
        $nama_file = round(microtime(true) * 1000) . '.' . $extension;
        if ($data == false) {
            $request->file('ijazah')->move(public_path('/../../public_html/daftar.persadakhatulistiwa.ac.id/assets/berkas/file_berkas/'), $nama_file);
            Pmbupload::create([
                'upload_id_siswa' => auth()->user()->pengenal_akun,
                'ijasah_upload' => $nama_file
            ]);

            toastr()->success('Ijazah berhasil diupload!', 'Selamat');
            return redirect()->back();
        } else {
            if (!empty($data->ijasah_upload)) {
                // Hapus yang lama dulu foto filenya
                $path = public_path('/../../public_html/daftar.persadakhatulistiwa.ac.id/assets/berkas/file_berkas/' . $data->ijasah_upload);
                if (file_exists($path)) {
                    @unlink($path);
                }
            }

            $request->file('ijazah')->move(public_path('/../../public_html/daftar.persadakhatulistiwa.ac.id/assets/berkas/file_berkas/'), $nama_file);
            $data->update([
                'ijasah_upload' => $nama_file
            ]);

            toastr()->success('Ijazah berhasil diupload!', 'Selamat');
            return redirect()->back();
        }
    }

    public function skck(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'skck' => 'required|mimes:jpg,png,pdf|max:5120',
        ]);

        if ($validator->fails()) {
            toastr()->error('Ada Kesalahan Saat Upload File. Mohon Lebih Teliti Lagi', 'Gagal');
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = Pmbupload::where('upload_id_siswa', auth()->user()->pengenal_akun)->first();
        $extension = $request->skck->extension();
        $nama_file = round(microtime(true) * 1000) . '.' . $extension;
        if ($data == false) {
            $request->file('skck')->move(public_path('/../../public_html/daftar.persadakhatulistiwa.ac.id/assets/berkas/file_berkas/'), $nama_file);
            Pmbupload::create([
                'upload_id_siswa' => auth()->user()->pengenal_akun,
                'skck_upload' => $nama_file
            ]);

            toastr()->success('SKCK berhasil diupload!', 'Selamat');
            return redirect()->back();
        } else {
            if (!empty($data->skck_upload)) {
                // Hapus yang lama dulu foto filenya
                $path = public_path('/../../public_html/daftar.persadakhatulistiwa.ac.id/assets/berkas/file_berkas/' . $data->skck_upload);
                if (file_exists($path)) {
                    @unlink($path);
                }
            }

            $request->file('skck')->move(public_path('/../../public_html/daftar.persadakhatulistiwa.ac.id/assets/berkas/file_berkas/'), $nama_file);
            $data->update([
                'skck_upload' => $nama_file
            ]);

            toastr()->success('SKCK berhasil diupload!', 'Selamat');
            return redirect()->back();
        }
    }

    public function kk(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kk' => 'required|mimes:jpg,png,pdf|max:5120',
        ]);

        if ($validator->fails()) {
            toastr()->error('Ada Kesalahan Saat Upload File. Mohon Lebih Teliti Lagi', 'Gagal');
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = Pmbupload::where('upload_id_siswa', auth()->user()->pengenal_akun)->first();
        $extension = $request->kk->extension();
        $nama_file = round(microtime(true) * 1000) . '.' . $extension;
        if ($data == false) {
            $request->file('kk')->move(public_path('/../../public_html/daftar.persadakhatulistiwa.ac.id/assets/berkas/file_berkas/'), $nama_file);
            Pmbupload::create([
                'upload_id_siswa' => auth()->user()->pengenal_akun,
                'kk_upload' => $nama_file
            ]);

            toastr()->success('Kartu Keluarga berhasil diupload!', 'Selamat');
            return redirect()->back();
        } else {
            if (!empty($data->kk_upload)) {
                // Hapus yang lama dulu foto filenya
                $path = public_path('/../../public_html/daftar.persadakhatulistiwa.ac.id/assets/berkas/file_berkas/' . $data->kk_upload);
                if (file_exists($path)) {
                    @unlink($path);
                }
            }

            $request->file('kk')->move(public_path('/../../public_html/daftar.persadakhatulistiwa.ac.id/assets/berkas/file_berkas/'), $nama_file);
            $data->update([
                'kk_upload' => $nama_file
            ]);

            toastr()->success('Kartu Keluarga berhasil diupload!', 'Selamat');
            return redirect()->back();
        }
    }

    public function akta(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'akta_lahir' => 'required|mimes:jpg,png,pdf|max:5120',
        ]);

        if ($validator->fails()) {
            toastr()->error('Ada Kesalahan Saat Upload File. Mohon Lebih Teliti Lagi', 'Gagal');
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = Pmbupload::where('upload_id_siswa', auth()->user()->pengenal_akun)->first();
        $extension = $request->akta_lahir->extension();
        $nama_file = round(microtime(true) * 1000) . '.' . $extension;
        if ($data == false) {
            $request->file('akta_lahir')->move(public_path('/../../public_html/daftar.persadakhatulistiwa.ac.id/assets/berkas/file_berkas/'), $nama_file);
            Pmbupload::create([
                'upload_id_siswa' => auth()->user()->pengenal_akun,
                'akta_lahir_upload' => $nama_file
            ]);

            toastr()->success('Akta Lahir berhasil diupload!', 'Selamat');
            return redirect()->back();
        } else {
            if (!empty($data->akta_lahir_upload)) {
                // Hapus yang lama dulu foto filenya
                $path = public_path('/../../public_html/daftar.persadakhatulistiwa.ac.id/assets/berkas/file_berkas/' . $data->akta_lahir_upload);
                if (file_exists($path)) {
                    @unlink($path);
                }
            }

            $request->file('akta_lahir')->move(public_path('/../../public_html/daftar.persadakhatulistiwa.ac.id/assets/berkas/file_berkas/'), $nama_file);
            $data->update([
                'akta_lahir_upload' => $nama_file
            ]);

            toastr()->success('Akta Lahir berhasil diupload!', 'Selamat');
            return redirect()->back();
        }
    }

    public function ktp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ktp' => 'required|mimes:jpg,png,pdf|max:5120',
        ]);

        if ($validator->fails()) {
            toastr()->error('Ada Kesalahan Saat Upload File. Mohon Lebih Teliti Lagi', 'Gagal');
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = Pmbupload::where('upload_id_siswa', auth()->user()->pengenal_akun)->first();
        $extension = $request->ktp->extension();
        $nama_file = round(microtime(true) * 1000) . '.' . $extension;
        if ($data == false) {
            $request->file('ktp')->move(public_path('/../../public_html/daftar.persadakhatulistiwa.ac.id/assets/berkas/file_berkas/'), $nama_file);
            Pmbupload::create([
                'upload_id_siswa' => auth()->user()->pengenal_akun,
                'ktp_upload' => $nama_file
            ]);

            toastr()->success('KTP berhasil diupload!', 'Selamat');
            return redirect()->back();
        } else {
            if (!empty($data->ktp_upload)) {
                // Hapus yang lama dulu foto filenya
                $path = public_path('/../../public_html/daftar.persadakhatulistiwa.ac.id/assets/berkas/file_berkas/' . $data->ktp_upload);
                if (file_exists($path)) {
                    @unlink($path);
                }
            }

            $request->file('ktp')->move(public_path('/../../public_html/daftar.persadakhatulistiwa.ac.id/assets/berkas/file_berkas/'), $nama_file);
            $data->update([
                'ktp_upload' => $nama_file
            ]);

            toastr()->success('KTP berhasil diupload!', 'Selamat');
            return redirect()->back();
        }
    }

    public function skkb(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'skkb' => 'required|mimes:jpg,png,pdf|max:5120',
        ]);

        if ($validator->fails()) {
            toastr()->error('Ada Kesalahan Saat Upload File. Mohon Lebih Teliti Lagi', 'Gagal');
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = Pmbupload::where('upload_id_siswa', auth()->user()->pengenal_akun)->first();
        $extension = $request->skkb->extension();
        $nama_file = round(microtime(true) * 1000) . '.' . $extension;
        if ($data == false) {
            $request->file('skkb')->move(public_path('/../../public_html/daftar.persadakhatulistiwa.ac.id/assets/berkas/file_berkas/'), $nama_file);
            Pmbupload::create([
                'upload_id_siswa' => auth()->user()->pengenal_akun,
                'skkb_upload' => $nama_file
            ]);

            toastr()->success('SKKB berhasil diupload!', 'Selamat');
            return redirect()->back();
        } else {
            if (!empty($data->skkb_upload)) {
                // Hapus yang lama dulu foto filenya
                $path = public_path('/../../public_html/daftar.persadakhatulistiwa.ac.id/assets/berkas/file_berkas/' . $data->skkb_upload);
                if (file_exists($path)) {
                    @unlink($path);
                }
            }

            $request->file('skkb')->move(public_path('/../../public_html/daftar.persadakhatulistiwa.ac.id/assets/berkas/file_berkas/'), $nama_file);
            $data->update([
                'skkb_upload' => $nama_file
            ]);

            toastr()->success('SKKB berhasil diupload!', 'Selamat');
            return redirect()->back();
        }
    }

    public function skl(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'skl' => 'required|mimes:jpg,png,pdf|max:5120',
        ]);

        if ($validator->fails()) {
            toastr()->error('Ada Kesalahan Saat Upload File. Mohon Lebih Teliti Lagi', 'Gagal');
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = Pmbupload::where('upload_id_siswa', auth()->user()->pengenal_akun)->first();
        $extension = $request->skl->extension();
        $nama_file = round(microtime(true) * 1000) . '.' . $extension;
        if ($data == false) {
            $request->file('skl')->move(public_path('/../../public_html/daftar.persadakhatulistiwa.ac.id/assets/berkas/file_berkas/'), $nama_file);
            Pmbupload::create([
                'upload_id_siswa' => auth()->user()->pengenal_akun,
                'ket_lulus_upload' => $nama_file
            ]);

            toastr()->success('Surat keterangan lulus berhasil diupload!', 'Selamat');
            return redirect()->back();
        } else {
            if (!empty($data->ket_lulus_upload)) {
                // Hapus yang lama dulu foto filenya
                $path = public_path('/../../public_html/daftar.persadakhatulistiwa.ac.id/assets/berkas/file_berkas/' . $data->ket_lulus_upload);
                if (file_exists($path)) {
                    @unlink($path);
                }
            }

            $request->file('skl')->move(public_path('/../../public_html/daftar.persadakhatulistiwa.ac.id/assets/berkas/file_berkas/'), $nama_file);
            $data->update([
                'ket_lulus_upload' => $nama_file
            ]);

            toastr()->success('Surat keterangan lulus berhasil diupload!', 'Selamat');
            return redirect()->back();
        }
    }

    public function piagam(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'piagam' => 'required|mimes:jpg,png,pdf|max:5120',
        ]);

        if ($validator->fails()) {
            toastr()->error('Ada Kesalahan Saat Upload File. Mohon Lebih Teliti Lagi', 'Gagal');
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = Pmbupload::where('upload_id_siswa', auth()->user()->pengenal_akun)->first();
        $extension = $request->piagam->extension();
        $nama_file = round(microtime(true) * 1000) . '.' . $extension;
        if ($data == false) {
            $request->file('piagam')->move(public_path('/../../public_html/daftar.persadakhatulistiwa.ac.id/assets/berkas/file_berkas/'), $nama_file);
            Pmbupload::updateOrCreate([
                'upload_id_siswa' => auth()->user()->pengenal_akun,
                'piagam' => $nama_file
            ]);

            toastr()->success('Piagam berhasil diupload!', 'Selamat');
            return redirect()->back();
        } else {
            if (!empty($data->piagam)) {
                // Hapus yang lama dulu foto filenya
                $path = public_path('/../../public_html/daftar.persadakhatulistiwa.ac.id/assets/berkas/file_berkas/' . $data->piagam);
                if (file_exists($path)) {
                    @unlink($path);
                }
            }

            $request->file('piagam')->move(public_path('/../../public_html/daftar.persadakhatulistiwa.ac.id/assets/berkas/file_berkas/'), $nama_file);
            $data->update([
                'piagam' => $nama_file
            ]);

            toastr()->success('Piagam berhasil diupload!', 'Selamat');
            return redirect()->back();
        }
    }
}
