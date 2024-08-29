@extends('adminlte::page')

@section('title', 'List Kompetensi Keahlian')

@section('content_header')
    <h1 class="m-0 text-dark">List Kompetensi Keahlian</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('kompetensikeahlian.create') }}" class="btn btn-primary mb-2">Tambah</a>
                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Kompetensi Keahlian</th>
                                <th>Standar Kompetensi</th>
                                <th>Bidang Studi</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kompetensiKeahlian as $key => $kk)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $kk->kompetensikeahlian }}</td>
                                    <td>{{ $kk->standarkompetensi->standarkompetensi }}</td>
                                    <td>{{ $kk->standarkompetensi->fbidstudi->bidangstudi ?? 'N/A' }}</td>
                                    <td>
                                        <a href="{{ route('kompetensikeahlian.edit', $kk) }}" class="btn btn-primary btn-xs">Edit</a>
                                        <form action="{{ route('kompetensikeahlian.destroy', $kk) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Apakah Anda yakin ingin menghapus?');">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@push('js')
    <script>
        $(document).ready(function() {
            $('#example2').DataTable({
                "responsive": true,
            });
        });
    </script>
@endpush
