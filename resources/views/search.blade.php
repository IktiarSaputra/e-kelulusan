@extends('layouts.master')

@section('content')
<style>
    .alert-green {
        background-color: #2ECC71;
    }

    .alert-red {
        background-color: #E74C3C;
    }
    .btn-primary{
        text-transform: capitalize
    }
</style>
@php
$setting = DB::table('settings')->get()->first();
$timestamp = strtotime($setting->date_announcement);
$tgl_pengumuman = strip_tags($setting->date_announcement);
@endphp

<section class="buy-pro" style="padding: 100px 0;">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="pro-block"
                    style="padding: 40px 50px; background: white; box-shadow: 0px 2px 28px 0px #7777775e; border-radius: 10px;">
                    @if ($siswa->status == '1')
                    <div class="alert alert-green text-light font-weight-bold" role="alert">
                        Selamat Anda Di Nyatakan LuLus !
                    </div>
                    @else
                    <div class="alert alert-red text-light" role="alert">
                        Mohon Maaf Anda Tidak Di Nyatakan LuLus !
                    </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>Nis Siswa </th>
                                    <td>{{ $siswa->nis }}</td>
                                </tr>
                                <tr>
                                    <th>Nisn Siswa </th>
                                    <td>{{ $siswa->nisn }}</td>
                                </tr>
                                <tr>
                                    <th>Nama Siswa </th>
                                    <td>{{ $siswa->name }}</td>
                                </tr>
                                <tr>
                                    <th>Kompetensi Keahlian </th>
                                    <td>{{ $siswa->jurusan }}</td>
                                </tr>
                                <tr>
                                    <th>Kelas </th>
                                    <td>{{ $siswa->kelas }}</td>
                                </tr>
                                <tr>
                                    <th>Status Kelulusan</th>
                                    <td>
                                        @if ($siswa->status == 1)
                                        <span class="badge badge-success">LuLus</span>
                                        @else
                                        <span class="badge badge-danger">Tidak Lulus</span>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <a href="{{ route('cetak.skl', $siswa->nisn) }}" class="btn btn-primary btn-block">Cetak SKL</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
