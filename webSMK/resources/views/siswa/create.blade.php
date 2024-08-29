@extends('adminlte::page')

@section('title', 'Tambah Siswa')

@section('content_header')
    <h1 class="m-0 text-dark">Tambah Siswa</h1>
@stop

@section('content')
    <form action="{{ route('siswa.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <!-- Include form fields similar to the create form for Guru -->
                        <!-- For example: -->
                        <div class="form-group">
                            <label for="nis">NIS</label>
                            <input type="text" class="form-control @error('nis') is-invalid @enderror" id="nis" name="nis" placeholder="NIS" value="{{ old('nis') }}">
                            @error('nis')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Continue with other form fields -->

                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto">
                            @error('foto')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('siswa.index') }}" class="btn btn-default">Batal</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop
