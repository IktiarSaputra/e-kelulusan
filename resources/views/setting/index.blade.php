@extends('layouts.sidebar')

@section('title')
    Setting
@endsection

@section('css')
    
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        Featured
    </div>
    <div class="card-body">
        @foreach ($setting as $item)
        <form class="form-horizontal" action="{{ route('setting.update', $item->id) }}" method="post">
            @csrf
            <input type="hidden" name="cfgID" value="">
            <div class="mb-3">
                <label class="form-label">Nama Sekolah</label>
                <input type="text" name="name_school" class="form-control" value="{{ $item->name_school }}" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label">Tahun Ajaran</label>
                <input type="number" name="year" class="form-control" min="2019" max="2045" value="{{ $item->year }}"
                    readonly>
            </div>
            <div class="mb-3">
                <label class="form-label">Tanggal Pengumuman</label>
                <input type="date" name="tanggal" class="form-control"
                    value="{{ date('Y-m-d',strtotime($item->date_announcement)) }}" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label">Jam Pengumuman</label>
                <input type="time" name="jam" class="form-control"
                    value="{{ date('H:i',strtotime($item->date_announcement)) }}" readonly>
            </div>
            <div class="row mb-3">
                <button type="submit" name="submit" class="btn btn-success col mr-4" disabled="disabled">Simpan</button>
                <button type="button" id="btEnable" class="btn btn-info col">Edit</button>
            </div>
        </form>
        @endforeach
    </div>
</div>
@endsection

@section('js')
    <script>
        $('button[name="submit"]').prop('disabled', true);
        $('#btEnable').click(function () {
            $("input").removeAttr('readonly');
            $('button[name="submit"]').removeAttr('disabled');
        });
    </script>
@endsection
