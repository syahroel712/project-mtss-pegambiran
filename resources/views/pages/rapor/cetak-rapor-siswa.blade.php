<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Rapor</title>
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
        <h3 style="text-align: center;">Data Rapor Siswa</h3>
        <br>
        <table style="width: 100%;">
            <tr>
                <td style="width: 50%;">
                    <table>
                        <tr>
                            <td>NIS</td>
                            <td>:</td>
                            <td>{{ $data_siswa->siswa_nis }}</td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td>{{ $data_siswa->siswa_nama }}</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                    </table>
                </td>
                <td style="width: 50%;">
                    <table>
                        <tr>
                            <td>Kelas</td>
                            <td>:</td>
                            <td>{{ $data_siswa->kelas_nama }}</td>
                        </tr>
                        <tr>
                            <td>Semester</td>
                            <td>:</td>
                            <td>{{ $data_siswa->semester_nama }}</td>
                        </tr>
                        <tr>
                            <td>Tahun Ajar</td>
                            <td>:</td>
                            <td>{{ $data_siswa->tahun_ajar_nama }}</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <br>
        <br>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th class="table-row" style="text-align: center;">No</th>
                <th class="table-row">Mata Pelajaran</th>
                <th class="table-row">Nilai Kognitif</th>
                <th class="table-row">Grade Kognitif</th>
                <th class="table-row">Nilai Keterampilan</th>
                <th class="table-row">Grade Keterampilan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($nilai_detail as $no => $nd)
            <tr>
                <td class="table-row" style="text-align: center;">{{ $no+1 }}</td>
                <td class="table-row">{{ $nd->mapel_nama }}</td>
                <td class="table-row" style="text-align: center;">{{ $nd->nilai_detail_kognitif }}</td>
                <td class="table-row" style="text-align: center;">
                    <?php 
                        if($nd->nilai_detail_kognitif >= 85){
                            echo "A";
                        }elseif ($nd->nilai_detail_kognitif >= 75) {
                            echo "B";
                        }elseif ($nd->nilai_detail_kognitif >= 60) {
                            echo "C";
                        }elseif ($nd->nilai_detail_kognitif >= 40) {
                            echo "D";
                        }elseif ($nd->nilai_detail_kognitif < 40) {
                            echo "E";
                        }
                    ?>
                </td>
                <td class="table-row" style="text-align: center;">{{ $nd->nilai_detail_keterampilan }}</td>
                <td class="table-row" style="text-align: center;">
                    <?php 
                        if($nd->nilai_detail_keterampilan >= 85){
                            echo "A";
                        }elseif ($nd->nilai_detail_keterampilan >= 75) {
                            echo "B";
                        }elseif ($nd->nilai_detail_keterampilan >= 60) {
                            echo "C";
                        }elseif ($nd->nilai_detail_keterampilan >= 40) {
                            echo "D";
                        }elseif ($nd->nilai_detail_keterampilan < 40) {
                            echo "E";
                        }
                    ?>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <br>
    <br>

    <table style="width: 100%;">
        <tr>
            <td style="width: 50%;">
                <table class="center">
                    <tr>
                        <td>
                            <p style="text-align: center">Orang Tua Siswa</p>
                            <br>
                            <br>
                            <br>
                            <p style="text-align: center">.......................</p>
                        </td>
                    </tr>
                </table>
            </td>
            <td style="width: 50%;">
                <table class="center">
                    <tr>
                        <td>
                            <p style="text-align: center">Wali Kelas</p>
                            <br>
                            <br>
                            <p style="text-align: center">
                                {{ $data_siswa->guru_nama }}
                                <br>
                                NIP : {{ $data_siswa->guru_nip }}
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        @if($data_siswa->kepsek_id != 0)
        <tr>
            <td colspan="2">
                <table class="center">
                    <tr>
                        <td>
                            <p style="text-align: center">Mengetahui,</p>
                            <p style="text-align: center">Kepala Sekolah</p>
                            <br>
                            <br>
                            <p style="text-align: center">
                                {{ $data_kepsek->guru_nama }}
                                <br>
                                NIP : {{ $data_kepsek->guru_nip }}
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        @endif
    </table>

</body>

</html>
