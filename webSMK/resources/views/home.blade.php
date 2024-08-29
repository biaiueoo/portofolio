@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h4>Selamat Datang, {{ auth()->user()->name }}!</h4>

                    <div class="mt-4">
                        <h5>Menu Utama</h5>
                        <div class="row">
                            @can('admin-only')
                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title"><i class="fas fa-users"></i> Pengguna</h5>
                                            <p class="card-text">Kelola dan administrasi pengguna sistem.</p>
                                            <a href="/users" class="btn btn-primary">Lihat Pengguna</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title"><i class="fas fa-book"></i> Bidang Studi</h5>
                                            <p class="card-text">Kelola bidang studi dan kurikulum.</p>
                                            <a href="/bidstudi" class="btn btn-primary">Lihat Bidang Studi</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title"><i class="fas fa-list-alt"></i> Standar Kompetensi</h5>
                                            <p class="card-text">Kelola standar kompetensi yang berlaku.</p>
                                            <a href="/standkomp" class="btn btn-primary">Lihat Standar Kompetensi</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title"><i class="fas fa-cogs"></i> Kompetensi Keahlian</h5>
                                            <p class="card-text">Kelola kompetensi keahlian untuk siswa dan guru.</p>
                                            <a href="/kompetensikeahlian" class="btn btn-primary">Lihat Kompetensi Keahlian</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title"><i class="fas fa-chalkboard-teacher"></i> Guru</h5>
                                            <p class="card-text">Kelola data guru dan jadwal mengajar.</p>
                                            <a href="/guru" class="btn btn-primary">Lihat Guru</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title"><i class="fas fa-user-graduate"></i> Siswa</h5>
                                            <p class="card-text">Kelola data siswa dan nilai.</p>
                                            <a href="/siswa" class="btn btn-primary">Lihat Siswa</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title"><i class="fas fa-school"></i> Kelas</h5>
                                            <p class="card-text">Kelola kelas dan alokasi siswa.</p>
                                            <a href="/kelas" class="btn btn-primary">Lihat Kelas</a>
                                        </div>
                                    </div>
                                </div>
                            @endcan

                            @can('guru-only')
                                <div class="col-md-6 mb-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title"><i class="fas fa-user"></i> Profile</h5>
                                            <p class="card-text">Lihat dan update informasi profile Anda.</p>
                                            <a href="/profil-guru" class="btn btn-primary">Lihat Profile</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title"><i class="fas fa-clipboard-list"></i> Nilai</h5>
                                            <p class="card-text">Kelola dan lihat nilai yang diberikan kepada siswa.</p>
                                            <a href="/nilai-guru" class="btn btn-primary">Lihat Nilai</a>
                                        </div>
                                    </div>
                                </div>
                            @endcan

                            @can('siswa-only')
                                <div class="col-md-6 mb-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title"><i class="fas fa-user"></i> Profile</h5>
                                            <p class="card-text">Lihat dan update informasi profile Anda.</p>
                                            <a href="/profil-siswa" class="btn btn-primary">Lihat Profile</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title"><i class="fas fa-clipboard-list"></i> Nilai</h5>
                                            <p class="card-text">Lihat nilai dan perkembangan akademis Anda.</p>
                                            <a href="/nilai-siswa" class="btn btn-primary">Lihat Nilai</a>
                                        </div>
                                    </div>
                                </div>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
