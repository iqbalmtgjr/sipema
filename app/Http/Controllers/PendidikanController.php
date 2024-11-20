<?php

namespace App\Http\Controllers;

use App\Models\Sekolah;
use App\Models\Pmbprodi;
use App\Models\Pmbsiswa;
use App\Models\Pmbupload;
use App\Models\Pmbsekolah;
use App\Models\Datasekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class PendidikanController extends Controller
{
    public function index()
    {
        $cekjalur = Pmbprodi::where('prodi_id_siswa', auth()->user()->pengenal_akun)->first();
        $data = Pmbsekolah::where('sekolah_id_siswa', auth()->user()->pengenal_akun)->first();
        $upload = Pmbupload::where('upload_id_siswa', auth()->user()->pengenal_akun)->first();
        $cekvalid = Pmbsiswa::where('akun_siswa', auth()->user()->pengenal_akun)->first();
        $datasekolah = Datasekolah::all();
        if ($cekvalid->valid_bayar != 2) {
            toastr()->warning('Anda belum tervalidasi', 'Peringatan');
            return redirect()->back();
        }
        return view('pendidikan.index', compact('data', 'cekjalur', 'upload', 'datasekolah'));
    }

    public function postPendidikan(Request $request)
    {
        $cekjalur = Pmbprodi::where('prodi_id_siswa', auth()->user()->pengenal_akun)->first();
        if ($cekjalur->jalur == 'test') {
            $validator = Validator::make($request->all(), [
                'jenis_sekolah' => 'required',
                'nama_sekolah' => 'required',
                'jurusan_sekolah' => 'required|max:100',
                'tahun_lulus_sekolah' => 'required|max:4',
                'ijasah_sekolah' => 'nullable|max:100',
            ]);
        } else {
            $validator = Validator::make($request->all(), [
                'jenis_sekolah' => 'required',
                'nama_sekolah' => 'required',
                'jurusan_sekolah' => 'required|max:100',
                'tahun_lulus_sekolah' => 'required|max:4',
                'ijasah_sekolah' => 'nullable|max:100',
                'nilai_satu' => 'required|max:10',
                'nilai_dua' => 'required|max:10',
                'nilai_tiga' => 'required|max:10',
                'nilai_empat' => 'required|max:10',
            ]);
        }

        if ($validator->fails()) {
            toastr()->error('Ada Kesalahan Saat Penginputan!', 'Gagal');
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $sklh = Pmbsekolah::where('sekolah_id_siswa', auth()->user()->pengenal_akun)->first();
        if ($cekjalur->jalur == 'test') {
            if ($sklh == false) {
                Pmbsekolah::create([
                    'sekolah_id_siswa' => auth()->user()->pengenal_akun,
                    'jenis_sekolah' => $request->jenis_sekolah,
                    'data_sekolah_id' => $request->nama_sekolah,
                    'jurusan_sekolah' => $request->jurusan_sekolah,
                    'tahun_lulus_sekolah' => $request->tahun_lulus_sekolah,
                    'ijasah_sekolah' => $request->ijasah_sekolah
                ]);
            } else {
                $sklh->update([
                    'sekolah_id_siswa' => auth()->user()->pengenal_akun,
                    'jenis_sekolah' => $request->jenis_sekolah,
                    'data_sekolah_id' => $request->nama_sekolah,
                    'jurusan_sekolah' => $request->jurusan_sekolah,
                    'tahun_lulus_sekolah' => $request->tahun_lulus_sekolah,
                    'ijasah_sekolah' => $request->ijasah_sekolah,
                ]);
            }
        } else {
            if ($sklh == false) {
                Pmbsekolah::create([
                    'sekolah_id_siswa' => auth()->user()->pengenal_akun,
                    'jenis_sekolah' => $request->jenis_sekolah,
                    'data_sekolah_id' => $request->nama_sekolah,
                    'jurusan_sekolah' => $request->jurusan_sekolah,
                    'tahun_lulus_sekolah' => $request->tahun_lulus_sekolah,
                    'ijasah_sekolah' => $request->ijasah_sekolah,
                    'nilai_satu' => $request->nilai_satu,
                    'nilai_dua' => $request->nilai_dua,
                    'nilai_tiga' => $request->nilai_tiga,
                    'nilai_empat' => $request->nilai_empat,
                ]);
            } else {
                $sklh->update([
                    'sekolah_id_siswa' => auth()->user()->pengenal_akun,
                    'jenis_sekolah' => $request->jenis_sekolah,
                    'data_sekolah_id' => $request->nama_sekolah,
                    'jurusan_sekolah' => $request->jurusan_sekolah,
                    'tahun_lulus_sekolah' => $request->tahun_lulus_sekolah,
                    'ijasah_sekolah' => $request->ijasah_sekolah,
                    'nilai_satu' => $request->nilai_satu,
                    'nilai_dua' => $request->nilai_dua,
                    'nilai_tiga' => $request->nilai_tiga,
                    'nilai_empat' => $request->nilai_empat,
                ]);
            }
        }

        toastr()->success('Data berhasil diinput! Silahkan isi data informasi dibawah ini', 'Selamat');
        return redirect('info-pmb');
    }

    public function postSmt1(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file_semester1' => 'required|mimes:jpg,png,pdf|max:5120',
        ]);

        if ($validator->fails()) {
            toastr()->error('Ada Kesalahan Saat Upload File. Mohon Lebih Teliti Lagi', 'Gagal');
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = Pmbupload::where('upload_id_siswa', auth()->user()->pengenal_akun)->first();
        $extension = $request->file_semester1->extension();
        $nama_file = round(microtime(true) * 1000) . '.' . $extension;
        if ($data == false) {
            $request->file('file_semester1')->move(public_path('/../../public_html/daftar.persadakhatulistiwa.ac.id/assets/berkas/rapor/'), $nama_file);
            Pmbupload::create([
                'upload_id_siswa' => auth()->user()->pengenal_akun,
                'semes_satu' => $nama_file
            ]);

            toastr()->success('Bukti berhasil diupload!', 'Selamat');
            return redirect()->back();
        } else {
            if (!empty($data->semes_satu)) {
                // Hapus yang lama dulu foto filenya
                $path = public_path('/../../public_html/daftar.persadakhatulistiwa.ac.id/assets/berkas/rapor/' . $data->semes_satu);
                if (file_exists($path)) {
                    @unlink($path);
                }
            }

            $request->file('file_semester1')->move(public_path('/../../public_html/daftar.persadakhatulistiwa.ac.id/assets/berkas/rapor/'), $nama_file);
            $data->update([
                'semes_satu' => $nama_file
            ]);

            toastr()->success('Nilai berhasil diupload!', 'Selamat');
            return redirect()->back();
        }
    }

    public function postSmt2(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file_semester2' => 'required|mimes:jpg,png,pdf|max:5120',
        ]);

        if ($validator->fails()) {
            toastr()->error('Ada Kesalahan Saat Upload File. Mohon Lebih Teliti Lagi', 'Gagal');
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = Pmbupload::where('upload_id_siswa', auth()->user()->pengenal_akun)->first();
        $extension = $request->file_semester2->extension();
        $nama_file = round(microtime(true) * 1000) . '.' . $extension;
        if ($data == false) {
            $request->file('file_semester2')->move(public_path('/../../public_html/daftar.persadakhatulistiwa.ac.id/assets/berkas/rapor/'), $nama_file);
            Pmbupload::create([
                'upload_id_siswa' => auth()->user()->pengenal_akun,
                'semes_dua' => $nama_file
            ]);

            toastr()->success('Bukti berhasil diupload!', 'Selamat');
            return redirect()->back();
        } else {
            if (!empty($data->semes_dua)) {
                // Hapus yang lama dulu foto filenya
                $path = public_path('/../../public_html/daftar.persadakhatulistiwa.ac.id/assets/berkas/rapor/' . $data->semes_dua);
                if (file_exists($path)) {
                    @unlink($path);
                }
            }

            $request->file('file_semester2')->move(public_path('/../../public_html/daftar.persadakhatulistiwa.ac.id/assets/berkas/rapor/'), $nama_file);
            $data->update([
                'semes_dua' => $nama_file
            ]);

            toastr()->success('Nilai berhasil diupload!', 'Selamat');
            return redirect()->back();
        }
    }

    public function postSmt3(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file_semester3' => 'required|mimes:jpg,png,pdf|max:5120',
        ]);

        if ($validator->fails()) {
            toastr()->error('Ada Kesalahan Saat Upload File. Mohon Lebih Teliti Lagi', 'Gagal');
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = Pmbupload::where('upload_id_siswa', auth()->user()->pengenal_akun)->first();
        $extension = $request->file_semester3->extension();
        $nama_file = round(microtime(true) * 1000) . '.' . $extension;
        if ($data == false) {
            $request->file('file_semester3')->move(public_path('/../../public_html/daftar.persadakhatulistiwa.ac.id/assets/berkas/rapor/'), $nama_file);
            Pmbupload::create([
                'upload_id_siswa' => auth()->user()->pengenal_akun,
                'semes_tiga' => $nama_file
            ]);

            toastr()->success('Bukti berhasil diupload!', 'Selamat');
            return redirect()->back();
        } else {
            if (!empty($data->semes_tiga)) {
                // Hapus yang lama dulu foto filenya
                $path = public_path('/../../public_html/daftar.persadakhatulistiwa.ac.id/assets/berkas/rapor/' . $data->semes_tiga);
                if (file_exists($path)) {
                    @unlink($path);
                }
            }

            $request->file('file_semester3')->move(public_path('/../../public_html/daftar.persadakhatulistiwa.ac.id/assets/berkas/rapor/'), $nama_file);
            $data->update([
                'semes_tiga' => $nama_file
            ]);

            toastr()->success('Nilai berhasil diupload!', 'Selamat');
            return redirect()->back();
        }
    }

    public function postSmt4(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file_semester4' => 'required|mimes:jpg,png,pdf|max:5120',
        ]);

        if ($validator->fails()) {
            toastr()->error('Ada Kesalahan Saat Upload File. Mohon Lebih Teliti Lagi', 'Gagal');
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = Pmbupload::where('upload_id_siswa', auth()->user()->pengenal_akun)->first();
        $extension = $request->file_semester4->extension();
        $nama_file = round(microtime(true) * 1000) . '.' . $extension;
        if ($data == false) {
            $request->file('file_semester4')->move(public_path('/../../public_html/daftar.persadakhatulistiwa.ac.id/assets/berkas/rapor/'), $nama_file);
            Pmbupload::create([
                'upload_id_siswa' => auth()->user()->pengenal_akun,
                'semes_empat' => $nama_file
            ]);

            toastr()->success('Bukti berhasil diupload!', 'Selamat');
            return redirect()->back();
        } else {
            if (!empty($data->semes_empat)) {
                // Hapus yang lama dulu foto filenya
                $path = public_path('/../../public_html/daftar.persadakhatulistiwa.ac.id/assets/berkas/rapor/' . $data->semes_empat);
                if (file_exists($path)) {
                    @unlink($path);
                }
            }

            $request->file('file_semester4')->move(public_path('/../../public_html/daftar.persadakhatulistiwa.ac.id/assets/berkas/rapor/'), $nama_file);
            $data->update([
                'semes_empat' => $nama_file
            ]);

            toastr()->success('Nilai berhasil diupload!', 'Selamat');
            return redirect()->back();
        }
    }
}
