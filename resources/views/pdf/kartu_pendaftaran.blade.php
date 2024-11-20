<!DOCTYPE html>
<html>

<head>
    <title>Data Pendaftaran Calon Mahasiswa</title>

    <style>
        body {
            font-family: 'Arial Narrow';
        }

        table {
            font-size: 15px;
            font-family: 'Arial Narrow';
        }

        .header {
            width: 100%;
            height: 11%;
            font-weight: 500;
        }

        .big-title {
            font-family: 'Arial Narrow';
            font-size: x-large;
            letter-spacing: 2px;
            word-spacing: 7px;
            font-weight: bold;
        }

        .stt-title {
            font-family: 'Arial Narrow';
            font-size: 10px;
            letter-spacing: 1px;
            word-spacing: 3px;
            font-weight: bold;
        }

        .small-title {
            font-family: 'Arial';
            font-size: 9px;
            letter-spacing: normal;
            text-transform: none;
        }

        .content {
            font-size: 14px;
            font-family: 'Arial Narrow';
            margin-top: 20px;
        }

        .upper {
            text-transform: uppercase;
        }

        .underline {
            text-decoration: underline;
        }

        .bold {
            font-weight: bold;
        }

        .text-center {
            text-align: center;
        }

        .tengah [class*="icon"] {
            text-alidisplay: block;
            height: 100%;
            width: 100%;
            margin: auto;
        }

        table.mini-font {
            font-size: 10px;
        }

        table.gridtable {
            border-width: 0;
            border-color: #757572;
            border-collapse: collapse;
        }

        table.gridtable th {
            border-width: 0.1px;
            padding: 4px;
            border-style: solid;
            border-color: #757572;
            text-transform: none;
        }

        table.gridtable td {
            border-width: 0.1px;
            border-top: 0px;
            padding: 4px 3px 5px 3px;
            border-style: solid;
            border-color: #757572;
        }

        table.kop tr {
            line-height: 50%
        }

        table.kop {
            margin-top: -5px;
            margin-left: 70px;
        }

        h5 {
            margin: 10px;
        }

        .wrapper {
            /* background-image: url({{ asset('assets/images/pngwing.png') }}); */
            background-repeat: no-repeat;
            /*  background-attachment: fixed; */
            background-position: center;
            page-break-inside: avoid;
            height: 400px;
        }

        @media all {
            .watermark {
                display: none;
                /* background-image: url({{ asset('assets/img/stkip.png') }}); */
                float: right;
            }

            .pagebreak {
                display: none;
            }
        }

        @media print {
            .watermark {
                display: block;
            }

            .pagebreak {
                display: block;
                page-break-after: always;
            }
        }
    </style>
</head>

<body style="margin: 30px;">


    <div class="table">
        <div class="header">
            <img height="70" width="70" style="float: left; padding-right: 10px;"
                src="{{ asset('assets/img/logo.png') }}" alt="">
            <div class="stt-title text-center">PERKUMPULAN BADAN PENDIDIKAN KARYA BANGSA</div>
            <div class="stt-title text-center">STKIP PERSADA KHATULISTIWA SINTANG</div>
            <div class="stt-title text-center">SINTANG - KALIMANTAN BARAT</div>
            <div class=" small-title text-center"><i>Jln. Pertamina Sengkuang Km 4, Kotak Pos 126 Telp.(0564) 2022386,
                    2022387</i></div>
            <div class=" small-title text-center" style="margin-left: 90px;">Email: persada@persadakhatulistiwa.ac.id,
                Website : https://persadakhatulistiwa.ac.id</div>
        </div>
        <hr style="width: 100%;">
    </div>
    <div>
        <div class="wrapper">
            <h4 class="upper text-center">Kartu Pendaftaran Calon Mahasiswa</h4>
            <table width="100%" style="text-align: left">
                <tr>
                    <th width="150" height="15" style="text-align:left;">No. Pendaftaran </th>
                    <td width="10" style="text-align:center;">:</td>
                    <td><?php echo $warga->ref; ?></td>
                </tr>
                <tr>
                    <th width="150" height="15" style="text-align:left;">Jalur Pendaftaran </th>
                    <td width="10" style="text-align:center;">:</td>
                    <td><?php echo ucfirst($warga->jalur); ?></td>
                </tr>
                <tr>
                    <th width="150" height="15" style="text-align:left;">Gelombang </th>
                    <td width="10" style="text-align:center;">:</td>
                    <td><?php echo ucfirst($warga->gelombang); ?></td>
                </tr>
                <tr>
                    <th width="150" height="15" style="text-align:left;">NIS </th>
                    <td width="10" style="text-align:center;">:</td>
                    <td><?php echo $warga->nis_siswa; ?></td>
                </tr>
                <tr>
                    <th width="150" height="15" style="text-align:left;">Nama </th>
                    <td width="10" style="text-align:center;">:</td>
                    <td><?php echo $warga->nama_siswa; ?></td>
                </tr>
                <tr>
                    <th width="150" height="15" style="text-align:left;">Pilihan I </th>
                    <td width="10" style="text-align:center;">:</td>
                    <td><?php echo $warga->nama_prodi; ?></td>
                </tr>
                <tr>
                    <th width="150" height="15" style="text-align:left;">Pilihan II </th>
                    <td width="10" style="text-align:center;">:</td>
                    <td><?php echo $warga->nama_prodi_baru; ?></td>
                </tr>
                <tr>
                    <th width="150" height="15" style="text-align:left;">Tanggal Pendaftaran </th>
                    <td width="10" style="text-align:center;">:</td>
                    <td><?php $wak = date('Y-m-d', $warga->daftar_akun);
                    echo tgl_indo1($wak); ?></td>
                </tr>



                <tr>
                    <th width="150" height="15" style="text-align:left;">Metode Pembayaran </th>
                    <td width="10" style="text-align:center;">:</td>
                    <td><?php if ($warga->metode_bayar == '1') {
                        echo 'Panitia PMB';
                    } elseif ($warga->metode_bayar == '2') {
                        echo 'Transfer Bank';
                    } else {
                        echo ' - ';
                    } ?></td>
                </tr>
                <?php if($warga->metode_bayar=="2") { ?>
                <tr>
                    <th width="150" height="15" style="text-align:left;">Rekening Bank KALBAR </th>
                    <td width="10" style="text-align:center;">:</td>
                    <td>4010006517</td>
                </tr>
                <tr>
                    <th width="150" height="15" style="text-align:left;">Pemilik Rekening </th>
                    <td width="10" style="text-align:center;">:</td>
                    <td>PRKMPULN BDN PEND KARYA BANGSA</td>
                </tr>
                <tr>
                    <th width="150" height="15" style="text-align:left;">Jumlah Pembayaran </th>
                    <td width="10" style="text-align:center;">:</td>
                    @if (auth()->user()->jalur == 'test' || auth()->user()->jalur == 'reguler2')
                        <td>Rp. 250.000</td>
                    @else
                        <td>Rp. 200.000</td>
                    @endif
                </tr>
                <?php } ?>
                <tr>
                    <th width="150" height="15" style="text-align:left;">Status Pembayaran </th>
                    <td width="10" style="text-align:center;">:</td>
                    <td>
                        <?php if ($warga->valid_bayar == '2') {
                            echo 'Valid';
                        } elseif ($warga->valid_bayar == '3') {
                            echo 'Tidak Valid';
                        } else {
                            echo 'Belum bayar/Belum divalidasi';
                        } ?>
                    </td>
                </tr>
            </table>

            <?php if($warga->jalur =="test" && $warga->metode_bayar=="2") { ?>
            <p style="font-size:8px;">NB: Gunakan nomor pendaftaran sebagai berita pada transaksi pembayaran melalui
                bank.</p>
            <?php } ?>
            <table style="padding-top: 10px; width: 50%; float: right; border: none;">
                <tbody>
                    <tr>
                        <td style="width: 50%; text-align: center; font-weight: normal;">Sintang, <?php $ger = date('Y-m-d');
                        echo tgl_indo1($ger); ?>
                        </td>
                    </tr>

                    <tr>
                        <td style="width: 50%; text-align: center; font-weight: bold; padding-top:20px;">Panitia PMB
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
    <div class="pagebreak"></div>
    </div>
</body>
@php
    function tgl_indo1($tanggal)
    {
        $bulan = [
            1 => 'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember',
        ];
        $pecahkan = explode('-', $tanggal);

        return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
    }
@endphp

</html>
