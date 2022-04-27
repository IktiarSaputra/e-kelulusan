@extends('layouts.master')

@section('content')
    <!--====================================
=            Hero Section            =
=====================================-->
<section class="section gradient-banner">
    <div class="shapes-container">
        <div class="shape" data-aos="fade-down-left" data-aos-duration="1500" data-aos-delay="100"></div>
        <div class="shape" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="100"></div>
        <div class="shape" data-aos="fade-up-right" data-aos-duration="1000" data-aos-delay="200"></div>
        <div class="shape" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200"></div>
        <div class="shape" data-aos="fade-down-left" data-aos-duration="1000" data-aos-delay="100"></div>
        <div class="shape" data-aos="fade-down-left" data-aos-duration="1000" data-aos-delay="100"></div>
        <div class="shape" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="300"></div>
        <div class="shape" data-aos="fade-down-right" data-aos-duration="500" data-aos-delay="200"></div>
        <div class="shape" data-aos="fade-down-right" data-aos-duration="500" data-aos-delay="100"></div>
        <div class="shape" data-aos="zoom-out" data-aos-duration="2000" data-aos-delay="500"></div>
        <div class="shape" data-aos="fade-up-right" data-aos-duration="500" data-aos-delay="200"></div>
        <div class="shape" data-aos="fade-down-left" data-aos-duration="500" data-aos-delay="100"></div>
        <div class="shape" data-aos="fade-up" data-aos-duration="500" data-aos-delay="0"></div>
        <div class="shape" data-aos="fade-down" data-aos-duration="500" data-aos-delay="0"></div>
        <div class="shape" data-aos="fade-up-right" data-aos-duration="500" data-aos-delay="100"></div>
        <div class="shape" data-aos="fade-down-left" data-aos-duration="500" data-aos-delay="0"></div>
    </div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-12 order-2 order-md-1 text-center text-md-left">
                <h2 class="text-white font-weight-bold" style="font-size: 2.5em" >Pengumuman Hasil Kelulusan</h2>
                <h1 class="text-white font-weight-bold mb-1"> {{ DB::table('settings')->latest()->first()->name_school }}</h1>
                <h3 class="text-white font-weight-bold mb-3" >Tahun Ajaran 2021/2022</h5>
                <h3 class="text-white mb-4">Merupakan Web Yang Digunakan Untuk Mengakses Kelulusan <br> Siswa <b>{{ DB::table('settings')->latest()->first()->name_school }}</b> Dengan Cara Memasukan NISN</h5>
                <a href="#cek-card" class="btn btn-main">Cek Sekarang</a>
            </div>
        </div>
    </div>
</section>
<!--====  End of Hero Section  ====-->

@php
$setting = DB::table('settings')->get()->first();
$timestamp = strtotime($setting->date_announcement);
$tgl_pengumuman = strip_tags($setting->date_announcement);
@endphp

<section class="section pt-0 position-relative pull-top" id="cek-card">
    <div class="container">
        <div class="rounded shadow bg-white">
            <div class="row">
                <div class="col-md-12 m-auto mb-2 order-1 order-md-2 p-5" id="form" style="display: none;">
                    <form method="GET" action="{{ route('student.search') }}">
                        <div class="input-group">
                            <input type="text" class="form-control" name="nisn" placeholder="Masukan NISN Anda">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-12 mb-4 text-center order-1 order-md-2" id="countdown" style="display: none;">
                    <h3 class="text-center mt-5 text-title">Pengumuman Dapat Dilihat :</h3>
                    <div class="countdown d-flex justify-content-center" >
                        <div>
                            <h3 id="days">0</h3>
                            <h4>Hari</h4>
                        </div>
                        <div>
                            <h3 id="hours">0</h3>
                            <h4>Jam</h4>
                        </div>
                        <div>
                            <h3 id="minutes">0</h3>
                            <h4>Menit</h4>
                        </div>
                        <div>
                            <h3 id="seconds">0</h3>
                            <h4>Detik</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
<script>
    CountDownTimer('{{$setting->created_at}}', 'countdown');
    function CountDownTimer(dt, id)
    {
        var end = new Date('{{$setting->date_announcement}}');
        var _second = 1000;
        var _minute = _second * 60;
        var _hour = _minute * 60;
        var _day = _hour * 24;
        var timer;
        function showRemaining() {
            var now = new Date();
            var distance = end - now;
            if (distance < 0) {

                clearInterval(timer);
                document.getElementById("form").style.display = "block";
                document.getElementById("countdown").style.display = "none";

                return;
            } else {
                var days = Math.floor(distance / _day);
                var hours = Math.floor((distance % _day) / _hour);
                var minutes = Math.floor((distance % _hour) / _minute);
                var seconds = Math.floor((distance % _minute) / _second);

                document.getElementById('days').innerText = days;
                document.getElementById('hours').innerText = hours;
                document.getElementById('minutes').innerText = minutes;
                document.getElementById('seconds').innerText = seconds;
                document.getElementById("form").style.display = "none";
                document.getElementById("countdown").style.display = "block";
            }
            
            // document.getElementById(id).innerHTML += minutes + 'mins ';
            // document.getElementById(id).innerHTML += seconds + 'secs';
            // document.getElementById(id).innerHTML +='<h2>TUGAS BELUM BERAKHIR</h2>';
        }
        timer = setInterval(showRemaining, 0);
    }
</script>
<script>
    $('a[href^="#"]').click(function (event) {
            var id = $(this).attr("href");
            var target = $(id).offset().top;
            $('html, body').animate({
                scrollTop: target
            }, 500);
            event.preventDefault();
        });
</script>
@endsection