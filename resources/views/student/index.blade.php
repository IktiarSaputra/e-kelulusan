@extends('layouts.sidebar')

@section('title')
Data Siswa
@endsection

@section('css')
<link href="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data Siswa</h1>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary mt-2 mb-4" data-toggle="modal" data-target="#exampleModal">
    <i class="fas fa-file-excel"></i> &nbsp; Import Excel
</button>

<a href="{{ route('download.format') }}" class="btn btn-info mt-2 mb-4"><i class="fas fa-file-excel"></i> &nbsp; Format Excel</a>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload Data Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="fileupload" class="form-label">File CSV/Excel</label>
                        <input type="file" name="file" class="form-control" id="fileupload" autofocus required>
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-success btn-block" type="submit">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nis</th>
                        <th>Nisn</th>
                        <th>Nama</th>
                        <th>Jurusan</th>
                        <th>Kelas</th>
                        <th>Status</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($siswa as $item)
                    <tr>
                        <td>{{ $item->nis }}</td>
                        <td>{{ $item->nisn }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->jurusan }}</td>
                        <td>{{ $item->kelas }}</td>
                        <td>
                            @if ($item->status == 1)
                            <span class="badge badge-success">LuLus</span>
                            @else
                            <span class="badge badge-danger">Tidak Lulus</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('student.edit', $item->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-pen"></i></a>
                            <a href="{{ route('student.delete', $item->id) }}" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- <div class="container">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Launch demo modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Upload Data Siswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
@csrf
<div class="mb-3">
    <label for="fileupload" class="form-label">File CSV/Excel</label>
    <input type="file" name="file" class="form-control" id="fileupload" autofocus required>
</div>
<div class="d-grid gap-2">
    <button class="btn btn-success" type="submit">Upload</button>
</div>
</form>
</div>
</div>
</div>
</div>

<div class="table-responsive">
    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Nis</th>
                <th>Nisn</th>
                <th>Nama</th>
                <th>Jurusan</th>
                <th>Kelas</th>
                <th>Status</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($siswa as $item)
            <tr>
                <td>{{ $item->nis }}</td>
                <td>{{ $item->nisn }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->jurusan }}</td>
                <td>{{ $item->kelas }}</td>
                <td>
                    @if ($item->status == 1)
                    <span class="badge bg-success">LuLus</span>
                    @else
                    <span class="badge bg-danger">Tidak Lulus</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('student.edit', $item->id) }}" class="btn btn-warning btn-sm"><i
                            class="fa-solid fa-pen"></i></a>
                    <a href="{{ route('student.delete', $item->id) }}" class="btn btn-danger btn-sm"><i
                            class="fa-solid fa-trash"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js">
</script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js">
</script>

<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });

</script> --}}

@endsection

@section('js')
<!-- Page level plugins -->
<script src="{{ asset('assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('assets/js/demo/datatables-demo.js') }}"></script>
@endsection
