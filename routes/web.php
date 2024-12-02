<?php

use App\Mail\SendAkun;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\OrtuController;
use App\Http\Controllers\CalonController;
use App\Http\Controllers\InfopmbController;
use App\Http\Controllers\FileuploadController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PendidikanController;
use App\Http\Controllers\PkkmbController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index']);

Route::group(['middleware' => 'isTamu'], function () {
    // pmb tutup
    // Route::get('/', function() {
    //    return view('tutup'); 
    // });

    // Route::get('/uncin', [AuthController::class, 'registertes']);
    Route::get('/register', [AuthController::class, 'register']);
    Route::post('register', [AuthController::class, 'registerPost']);
    Route::get('/login', [AuthController::class, 'login']);
    Route::post('login', [AuthController::class, 'loginPost']);
});

Route::group(['middleware' => ['isLogin', 'custom.user']], function () {
    // Informasi
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('infoPmb', [InfoController::class, 'index']);
    Route::get('info', [InfoController::class, 'infoMhs']);
    Route::get('pembayaran', [InfoController::class, 'pembayaran']);
    Route::post('postMetodeBayar', [InfoController::class, 'postMetodeBayar']);
    Route::post('uploadBukti', [InfoController::class, 'uploadBukti']);
    Route::post('uploadBuktibayar', [InfoController::class, 'uploadBuktibayar']);
    Route::get('infoTes', [InfoController::class, 'infoTes']);

    //pembayaran
    Route::get('/after-payment', [InfoController::class, 'valid']);

    // Konfirmasi Bayar AKhir
    Route::get('pembayaran/konfirmasi', [InfoController::class, 'konfirmasi']);
    Route::post('postKonfirmasi', [InfoController::class, 'postKonfirmasi']);
    Route::get('getdata/{id}', [InfoController::class, 'getdata']);

    // Data Calon Mahasiswa
    Route::get('calon', [CalonController::class, 'index']);
    Route::post('postCalon', [CalonController::class, 'store']);

    // Data Pendidikan Terakhir
    Route::get('pendidikan', [PendidikanController::class, 'index']);
    Route::post('postPendidikan', [PendidikanController::class, 'postPendidikan']);
    Route::post('postSmt1', [PendidikanController::class, 'postSmt1']);
    Route::post('postSmt2', [PendidikanController::class, 'postSmt2']);
    Route::post('postSmt3', [PendidikanController::class, 'postSmt3']);
    Route::post('postSmt4', [PendidikanController::class, 'postSmt4']);

    // Data Info PMB
    Route::get('info-pmb', [InfopmbController::class, 'index']);
    Route::post('postInfopmb', [InfopmbController::class, 'store']);

    // Data Orang Tua Siswa
    Route::get('ortu', [OrtuController::class, 'index']);
    Route::post('postOrtu', [OrtuController::class, 'store']);

    // Data Upload Berkas
    Route::get('upload', [FileuploadController::class, 'index']);
    Route::post('postBukti', [FileuploadController::class, 'bukti']);
    Route::post('postFoto', [FileuploadController::class, 'foto']);
    Route::post('postAkta', [FileuploadController::class, 'akta']);
    Route::post('postIjazah', [FileuploadController::class, 'ijazah']);
    Route::post('postKk', [FileuploadController::class, 'kk']);
    Route::post('postKtp', [FileuploadController::class, 'ktp']);
    Route::post('postSkck', [FileuploadController::class, 'skck']);
    Route::post('postSkkb', [FileuploadController::class, 'skkb']);
    Route::post('postSkl', [FileuploadController::class, 'skl']);
    Route::post('postPiagam', [FileuploadController::class, 'piagam']);

    // Download Kartu Pendaftaran
    Route::get('download-kartu-pendaftaran', [CalonController::class, 'downloadkartu']);

    // PKKMB
    Route::post('postPkkmb', [PkkmbController::class, 'postPkkmb']);
});
