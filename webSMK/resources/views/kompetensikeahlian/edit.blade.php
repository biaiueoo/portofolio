@extends('adminlte::page')
@section('title', 'Edit Kompetensi Keahlian')
@section('content_header')
    <h1 class="m-0 text-dark">Edit Kompetensi Keahlian</h1>
@stop
@section('content')
    <form action="{{ route('kompetensi.update', $kompetensi->id) }}" method="post">
        @csrf
        @method('put')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="kompetensikeahlian">Kompetensi Keahlian</label>
                            <input type="text" class="form-control @error('kompetensikeahlian') is-invalid @enderror"
                                id="kompetensikeahlian" name="kompetensikeahlian" placeholder="Kompetensi Keahlian"
                                value="{{ old('kompetensikeahlian', $kompetensi->kompetensikeahlian) }}">
                            @error('kompetensikeahlian')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="kdstandkomp">Standar Kompetensi</label>
                            <select class="form-control @error('kdstandkomp') is-invalid @enderror" id="kdstandkomp" name="kdstandkomp">
                                <option value="">Pilih Standar Kompetensi</option>
                                @foreach ($standarKompetensi as $sk)
                                    <option value="{{ $sk->id }}" {{ $kompetensi->kdstandkomp == $sk->id ? 'selected' : '' }}>
                                        {{ $sk->standarkompetensi }}
                                    </option>
                                @endforeach
                            </select>
                            @error('kdstandkomp')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('kompetensi.index') }}" class="btn btn-default">Batal</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop
