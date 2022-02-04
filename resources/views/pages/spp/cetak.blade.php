    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak SPP</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet"> 

    <style>
        .table {
            width: 100%;
            border: 1px solid black;
            border-collapse: collapse;
        }

        .table-row {
            border: 1px solid black;
            border-collapse: collapse;
        }

        * {
            font-family: 'Poppins', sans-serif;
        }

        .center {
            margin-left: auto;
            margin-right: auto;
        }
    </style>



</head>

<body onload="print()">
    <div class="col-md-12">
        <br>
        <table style="width: 60%; display:block; margin:0px auto; border: 1px solid black">
            <h3 style="text-align: center;">Pembayaran SPP</h3>
            <tr>
                <td>NIS</td>
                <td style="padding-left: 5px; padding-right: 5px;">:</td>
                <td><?= $spp->siswa_nis ?></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td style="padding-left: 5px; padding-right: 5px;">:</td>
                <td><?= $spp->siswa_nama ?></td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td style="padding-left: 5px; padding-right: 5px;">:</td>
                <td><?= $spp->kelas_nama ?></td>
            </tr>
            <tr>
                <td>Tahun Ajar</td>
                <td style="padding-left: 5px; padding-right: 5px;">:</td>
                <td><?= $spp->tahun_ajar_nama ?></td>
            </tr>
            <tr>
                <td>Tanggal Bayar</td>
                <td style="padding-left: 5px; padding-right: 5px;">:</td>
                <td>{{ \Carbon\Carbon::parse($spp->spp_tgl_bayar)->isoFormat('D MMMM Y') }}</td>
            </tr>
            <tr>
                <td>Jumlah Bayar</td>
                <td style="padding-left: 5px; padding-right: 5px;">:</td>
                <td>Rp. <?= number_format($spp->spp_bayar) ?></td>
            </tr>
        </table>
        <br>
        <br>
    </div>

</body>

</html>
