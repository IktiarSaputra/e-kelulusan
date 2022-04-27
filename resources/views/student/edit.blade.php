@extends('layouts.sidebar')

@section('title')
    Update Data Siswa
@endsection

@section('css')
    
@endsection

@section('content')
<h1 class="h3 mb-2 text-gray-800">Update Data Siswa</h1>

<div class="card">
    <div class="card-body">
        <form action="{{ route('student.update', $student->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="exampleInputnis" class="form-label">Nis</label>
                <input type="number" class="form-control @error('nis') is-invalid @enderror" id="exampleInputnis"
                    name="nis" value="{{ $student->nis }}" required>
                @error('nis')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputnisn" class="form-label">Nisn</label>
                <input type="number" class="form-control @error('nisn') is-invalid @enderror" id="exampleInputnisn"
                    name="nisn" value="{{ $student->nisn }}" required>
                @error('nisn')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputname" class="form-label">Nama</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputname"
                    name="name" value="{{ $student->name }}" required>
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputjurusan" class="form-label">Jurusan</label>
                <select class="form-control @error('jurusan') is-invalid @enderror" name="jurusan"
                    aria-label="Default select example">
                    <option value="IPA" {{ $student->jurusan == 'IPA' ? 'selected':'' }}>IPA</option>
                    <option value="IPS" {{ $student->jurusan == 'IPS' ? 'selected':'' }}>IPS</option>
                </select>
                @error('jurusan')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputkelas" class="form-label">Kelas</label>
                <input type="text" class="form-control @error('kelas') is-invalid @enderror" id="exampleInputkelas"
                    name="kelas" value="{{ $student->kelas }}" required>
                @error('kelas')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputstatus" class="form-label">Status</label>
                <select class="form-control @error('status') is-invalid @enderror" name="status"
                    aria-label="Default select example">
                    <option value="1" {{ $student->status == '1' ? 'selected':'' }}>Lulus</option>
                    <option value="0" {{ $student->status == '0' ? 'selected':'' }}>Tidak Lulus</option>
                </select>
                @error('status')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-success btn-block">Update</button>
        </form>
    </div>
</div>
@endsection

@section('js')
    
@endsection