<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pendaftaran PMB 2024 STKIP Persada Khatulistiwa</title>
</head>

<body>
    <center>
        <h2>Panitia PMB Persada Khatulistiwa Sintang</h2>
    </center>

    <h3>Hai {{ $akun->nama_siswa }}, terima kasih telah mendaftar sebagai mahasiswa baru di STKIP Persada Khatulistiwa
        Sintang.</h3>
    <p>
        Dibawah ini merupakan informasi pendaftaran sekaligus password yang digunakan untuk login ke website Sistem
        Informasi Pendaftaran Mahasiswa (SIPEMA).
    </p>
    <table>
        <tbody>
            <tr>
                <td>Nama</td>
                <td>: {{ $akun->nama_siswa }}</td>
            </tr>
            <tr>
                <td>Jalur</td>
                @if ($akun->jalur == 'test')
                    <td>: Tes</td>
                @elseif($akun->jalur == 'prestasi')
                    <td>: Prestasi</td>
                @else
                    <td>: Reguler 2</td>
                @endif
            </tr>
            <tr>
                <td>Gelombang</td>
                <td>: {{ $akun->gelombang }}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>: {{ $akun->email_akun_siswa }}</td>
            </tr>
            <tr>
                <td>Password</td>
                <td>: {{ $akun->kuncigudang }}</td>
            </tr>
        </tbody>
    </table>
    <p>
        Untuk Login Silahkan kunjungi website <i><a href="https://daftar.persadakhatulistiwa.ac.id/login">https://daftar.persadakhatulistiwa.ac.id/login</a></i>. <br><br>

        Terima Kasih, <br>
        Panitia PMB
    </p>
</body>

</html>
