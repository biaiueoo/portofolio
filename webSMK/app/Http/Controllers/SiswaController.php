<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;

class SiswaController extends Controller
{
    public function index()
    {
        // Fetch all siswa records
        return view('siswa.index', ['siswa' => Siswa::all()]);
    }

    public function create()
    {
        // Show the form for creating a new siswa
        return view('siswa.create');
    }

    public function store(Request $request)
    {
        // Validate and store the new siswa
        $request->validate([
            'nis' => 'required|unique:siswa,nis',
            'namasiswa' => 'required',
            'nisn' => 'required',
            'alamatsiswa' => 'required',
            'telpsiswa' => 'required',
            'agamasiswa' => 'required',
            'asalsekolah' => 'required',
            'jksiswa' => 'required',
            'tempatlahirsiswa' => 'required',
            'tgllahirsiswa' => 'required',
            'statanak' => 'required',
            'anakke' => 'required',
            'tglditerima' => 'required',
            'dikelas' => 'required',
            'ayah' => 'required',
            'ibu' => 'required',
            'pekerjaanayah' => 'required',
            'pekerjaanibu' => 'required',
            'telpayah' => 'required',
            'telpibu' => 'required',
            'alamatayah' => 'required',
            'alamatibu' => 'required',
            'agamaayah' => 'required',
            'agamaibu' => 'required',
            'foto' => 'required|image|file|max:2048'
        ]);

        $data = $request->all();
        $data['foto'] = $request->file('foto')->store('Foto Siswa');

        Siswa::create($data);

        return redirect()->route('siswa.index')
            ->with('success_message', 'Berhasil menambah siswa baru');
    }

    public function edit($id)
    {
        // Find the siswa and show the form for editing
        $siswa = Siswa::find($id);
        if (!$siswa) {
            return redirect()->route('siswa.index')
                ->with('error_message', 'Data siswa tidak ditemukan');
        }

        return view('siswa.edit', compact('siswa'));
    }

    public function update(Request $request, $id)
    {
        // Validate and update the siswa record
        $request->validate([
            'nis' => 'required|unique:siswa,nis,' . $id,
            'namasiswa' => 'required',
            'nisn' => 'required',
            'alamatsiswa' => 'required',
            'telpsiswa' => 'required',
            'agamasiswa' => 'required',
            'asalsekolah' => 'required',
            'jksiswa' => 'required',
            'tempatlahirsiswa' => 'required',
            'tgllahirsiswa' => 'required',
            'statanak' => 'required',
            'anakke' => 'required',
            'tglditerima' => 'required',
            'dikelas' => 'required',
            'ayah' => 'required',
            'ibu' => 'required',
            'pekerjaanayah' => 'required',
            'pekerjaanibu' => 'required',
            'telpayah' => 'required',
            'telpibu' => 'required',
            'alamatayah' => 'required',
            'alamatibu' => 'required',
            'agamaayah' => 'required',
            'agamaibu' => 'required',
            'foto' => 'nullable|image|file|max:2048'
        ]);

        $siswa = Siswa::find($id);
        $data = $request->all();

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('Foto Siswa');
        }

        $siswa->update($data);

        return redirect()->route('siswa.index')
            ->with('success_message', 'Berhasil memperbarui data siswa');
    }
}
