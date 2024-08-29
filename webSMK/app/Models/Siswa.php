<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswa';

    protected $fillable = [
        'nis', 'namasiswa', 'nisn', 'alamatsiswa', 'telpsiswa', 'agamasiswa', 
        'asalsekolah', 'jksiswa', 'tempatlahirsiswa', 'tgllahirsiswa', 'statanak', 
        'anakke', 'tglditerima', 'dikelas', 'ayah', 'ibu', 'pekerjaanayah', 
        'pekerjaanibu', 'telpayah', 'telpibu', 'alamatayah', 'alamatibu', 
        'agamaayah', 'agamaibu', 'foto'
    ];
}
