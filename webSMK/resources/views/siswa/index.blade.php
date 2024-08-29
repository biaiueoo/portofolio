@extends('adminlte::page')

@section('title', 'Data Siswa')

@section('content_header')
    <h1 class="m-0 text-dark">Data Siswa</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card overflow-scroll">
                <div class="card-body pe-3">
                    <a href="{{ route('siswa.create') }}" class="btn btn-primary mb-3">Tambah Siswa</a>
                    <table class="table table-hover table-bordered 
table-stripped" id="example2">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>NIS</th>
                                <th>Nama Siswa</th>
                                <th>NISN</th>
                                <th>Alamat Siswa</th>
                                <th>Telp Siswa</th>
                                <th>Agama Siswa</th>
                                <th>Asal Sekolah</th>
                                <th>Jenis Kelamin Siswa</th>
                                <th>Tempat Lahir Siswa</th>
                                <th>Tanggal Lahir Siswa</th>
                                <th>Status Anak</th>
                                <th>Anak Ke-</th>
                                <th>Tanggal Diterima</th>
                                <th>Dikelas</th>
                                <th>Ayah</th>
                                <th>Ibu</th>
                                <th>Pekerjaan Ayah</th>
                                <th>Pekerjaan Ibu</th>
                                <th>Telp Ayah</th>
                                <th>Telp Ibu</th>
                                <th>Alamat Ayah</th>
                                <th>Alamat Ibu</th>
                                <th>Agama Ayah</th>
                                <th>Agama Ibu</th>
                                <th>Foto</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($siswa as $key => $s)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $s->nis }}</td>
                                    <td>{{ $s->namasiswa }}</td>
                                    <td>{{ $s->nisn }}</td>
                                    <td>{{ $s->alamatsiswa }}</td>
                                    <td>{{ $s->telpsiswa }}</td>
                                    <td>{{ $s->agamasiswa }}</td>
                                    <td>{{ $s->asalsekolah }}</td>
                                    <td>{{ $s->jksiswa }}</td>
                                    <td>{{ $s->tempatlahirsiswa }}</td>
                                    <td>{{ $s->tgllahirsiswa }}</td>
                                    <td>{{ $s->statanak }}</td>
                                    <td>{{ $s->anakke }}</td>
                                    <td>{{ $s->tglditerima }}</td>
                                    <td>{{ $s->dikelas }}</td>
                                    <td>{{ $s->ayah }}</td>
                                    <td>{{ $s->ibu }}</td>
                                    <td>{{ $s->pekerjaanayah }}</td>
                                    <td>{{ $s->pekerjaanibu }}</td>
                                    <td>{{ $s->telpayah }}</td>
                                    <td>{{ $s->telpibu }}</td>
                                    <td>{{ $s->alamatayah }}</td>
                                    <td>{{ $s->alamatibu }}</td>
                                    <td>{{ $s->agamaayah }}</td>
                                    <td>{{ $s->agamaibu }}</td>
                                    <td>
                                        @if ($s->foto)
                                            <img src="{{ asset('storage/' . $s->foto) }}" alt="Foto Siswa" width="50" height="50">
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('siswa.edit', $s->id) }}" class="btn btn-primary btn-xs">Edit</a>
                                        <form action="{{ route('siswa.destroy', $s->id) }}" method="post" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-xs">Hapus</button>
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