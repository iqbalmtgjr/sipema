<?php

namespace App\Http\Controllers;

use App\Models\Gelombang;
use App\Models\Pmbjadwal;
use Illuminate\Http\Request;
use App\Models\Biayakuliahpmb;

class HomeController extends Controller
{
    public function index()
    {
        $jadwal_gel1 = Pmbjadwal::find(1);
        $jadwal_gel2 = Pmbjadwal::find(2);
        $jadwal_gel3 = Pmbjadwal::find(3);
        $reguler2 = Pmbjadwal::find(4);
        $gelombang = Gelombang::find(1)->gel;
        $biaya_regis = Biayakuliahpmb::find(1);
        $biaya_pengembangan = Biayakuliahpmb::find(2);
        $biaya_spp = Biayakuliahpmb::find(3);
        $biaya_sks = Biayakuliahpmb::find(4);
        $pendaftaran = Biayakuliahpmb::find(5);
        return view('home', compact('jadwal_gel1', 'jadwal_gel2', 'jadwal_gel3', 'reguler2', 'gelombang', 'biaya_regis', 'biaya_pengembangan', 'biaya_spp', 'biaya_sks', 'pendaftaran'));
    }
}
