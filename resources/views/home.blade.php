@extends('layouts.sidebar')

@section('title')
    Dashboard
@endsection

@section('css')
    
@endsection

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

<!-- Content Row -->
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">Selamat Datang Di Dashboard</h1>
        <p class="lead">Ini Adalah Dashboard Web Kelulusan <b>{{ DB::table('settings')->latest()->first()->name_school }}</b></p>
    </div>
</div>
@endsection

@section('js')
    
@endsection
