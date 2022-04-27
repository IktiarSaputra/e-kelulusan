<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Surat Keterangan Kelulusan - {{ $siswa->name }}</title>
    <style>
        body {
            margin-top: -20px
        }
        .header{
           
            align-items: center;
        }
    </style>
</head>

<body>
    <table style="width: 100%">
        <thead class="header">
            <tr>
                <th rowspan="5" style="width: 70px"><img
                        src="https://sman48-jkt.sch.id/wp-content/uploads/2021/07/cropped-cropped-cropped-cropped-EXpbXvsS_400x400-removebg-preview-2-1.png"
                        width="100px" height="100px" style="margin-top: -30px" alt=""></th>
                
            </tr>
            <tr>
                <th colspan="3" class="text-center" style="font-size: 21px; line-height: 25px">SEKOLAH MENENGAH ATAS
                    <br>{{ DB::table('settings')->latest()->first()->name_school }}</th>
                <th rowspan="4" style="width: 70px"><img
                        src="https://sman48-jkt.sch.id/wp-content/uploads/2021/07/cropped-cropped-cropped-cropped-EXpbXvsS_400x400-removebg-preview-2-1.png"
                        width="100px" height="100px" style="margin-top: -50px" alt=""></th>
            </tr>
            <tr>
                <td class="text-center" colspan="3">
                    <p style="font-size: 13px;line-height: 16px;margin-top: 0px">JL. Pinang Ranti 2 NO. 1, Makassar, Jakarta Timur,
                        Telp/Fax : 021-8006204 <br>
                        Email : sman_48_jkt@yahoo.com&nbsp;website: https://sman48-jkt.sch.id/</p>
                </td>
            </tr>
            <tr>
                <td colspan="3" class="text-center">
                    <p style="font-size: 12px;margin-top: -20px">Kode Pos 13560</p>
                </td>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    <hr style="border: 1px solid #000;border-radius: 1px; margin-top: -10px">
    <h5 class="text-center font-weight-bold">SURAT KETERANGAN KELULUSAN</h5>
    <p class="text-center font-weight-bold">NOMOR : /SKL-SMKBHB/V/{{ DB::table('settings')->latest()->first()->year }}</p>
    <p style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yang bertanda tangan dibawah ini Kepala Sekolah {{ DB::table('settings')->latest()->first()->name_school }}, dengan ini menerangkan bahwa :</p>
    <table style="margin-left: 100px; margin-top: -12px;">
        <tr>
            <th style="font-size: 14px;text-align: left;">NIS</th>
            <td>&nbsp;&nbsp;&nbsp;:</td>
            <td>&nbsp;&nbsp;&nbsp;{{ $siswa->nis }}</td>
        </tr>
        <tr>
            <th style="font-size: 14px;text-align: left;">Nisn Siswa</th>
            <td>&nbsp;&nbsp;&nbsp;:</td>
            <td>&nbsp;&nbsp;&nbsp;{{ $siswa->nisn }}</td>
        </tr>
        <tr>
            <th style="font-size: 14px;text-align: left;">Nama Siswa</th>
            <td>&nbsp;&nbsp;&nbsp;:</td>
            <td>&nbsp;&nbsp;&nbsp;{{ $siswa->name }}</td>
        </tr>
        <tr>
            <th style="font-size: 14px;text-align: left;">Kompetensi Keahlian</th>
            <td>&nbsp;&nbsp;&nbsp;:</td>
            <td>&nbsp;&nbsp;&nbsp;{{ $siswa->jurusan }}</td>
        </tr>
        <tr>
            <th style="font-size: 14px;text-align: left;">Kelas </th>
            <td>&nbsp;&nbsp;&nbsp;:</td>
            <td>&nbsp;&nbsp;&nbsp;{{ $siswa->kelas }}</td>
        </tr>
    </table>
    <p style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Adalah benar siswa/siswi {{ DB::table('settings')->latest()->first()->name_school }} dan telah melaksanakan Ujian Sekolah (USBN) serta dinyatakan :</p>
    <h5 class="text-center font-weight-bold" style="margin-top: -20px;">
        @if ($siswa->status == 1)
            LULUS / <del>TIDAK LULUS</del>
        @else
            <del>TIDAK LULUS</del>
        @endif
    </h5>
    <p style="font-size: 14px; ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dari {{ DB::table('settings')->latest()->first()->name_school }} pada tanggal {{ $tanggal }} Tahun Pelajaran 2021/2022 Surat Keterangan Lulus ini dibuat untuk dapat digunakan sebagimana mestinya dan berlaku sampai dengan Ijazah asli dari yang bersangkutan diterbitkan.</p>
    <table class="table-borderless" style="float: right;font-size: 13px">
        <thead>
            <tr>
                <td style="width: 70%"></td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="width: 70%"></td>
                <td scope="row" class="text-center">Jakarta, {{ $tanggal }} </td>
            </tr>
            <tr>
                <td style="width: 70%"></td>
                <td scope="row" class="text-center"><b>Kepala Sekolah {{ DB::table('settings')->latest()->first()->name_school }}</b></td>
            </tr>
        </tbody>
    </table>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>
</body>

</html>