<?php

namespace App\Http\Controllers;

use App\Models\Pmbjadwal;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $jadwal_gel1 = Pmbjadwal::find(1);
        $jadwal_gel2 = Pmbjadwal::find(2);
        $jadwal_gel3 = Pmbjadwal::find(3);
        $reguler2 = Pmbjadwal::find(4);
        return view('home', compact('jadwal_gel1', 'jadwal_gel2', 'jadwal_gel3', 'reguler2'));
    }
}
