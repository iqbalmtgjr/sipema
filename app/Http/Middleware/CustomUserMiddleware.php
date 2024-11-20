<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CustomUserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user()->where('pengenal_akun', auth()->user()->pengenal_akun);

        // Lakukan join dengan tabel lain
        // Gantilah 'nama_tabel_lain' dan 'nama_kolom_penggabung' sesuai kebutuhan
        $userWithAdditionalData = $user->leftJoin('pmb_siswa', 'pmb_akun.pengenal_akun', '=', 'pmb_siswa.akun_siswa')->leftJoin('pmb_prodi', 'pmb_akun.pengenal_akun', '=', 'pmb_prodi.prodi_id_siswa')->first();

        // Setel user yang telah di-join ke dalam objek auth
        Auth::setUser($userWithAdditionalData);

        return $next($request);
    }
}
