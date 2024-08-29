<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KompetensiKeahlian;
use App\Models\StandarKompetensi;

class KompetensiKeahlianController extends Controller
{
    public function index()
{
    $kompetensiKeahlian = KompetensiKeahlian::with('standarkompetensi.fbidstudi')->get();
    return view('kompetensikeahlian.index', [
        'kompetensiKeahlian' => $kompetensiKeahlian
    ]);
}


public function create()
{
    $standarkompetensi = StandarKompetensi::with('fbidstudi')->get();
    return view('kompetensikeahlian.create', compact('standarkompetensi'));
}



    public function store(Request $request)
    {
        $request->validate([
            'kompetensikeahlian' => 'required|string|max:100|unique:kompetensikeahlian',
            'kdstandkomp' => 'required|exists:standarkompetensi,id'
        ]);

        KompetensiKeahlian::create($request->all());
        return redirect()->route('kompetensikeahlian.index')
            ->with('success_message', 'Berhasil menambah Kompetensi Keahlian baru');
    }

    public function edit($id)
    {
        $kompetensiKeahlian = KompetensiKeahlian::find($id);
        if (!$kompetensiKeahlian) {
            return redirect()->route('kompetensikeahlian.index')
                ->with('error_message', 'Kompetensi Keahlian dengan id = ' . $id . ' tidak ditemukan');
        }

        return view('kompetensikeahlian.edit', [
            'kompetensiKeahlian' => $kompetensiKeahlian,
            'standarkompetensi' => StandarKompetensi::all()
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kompetensikeahlian' => 'required|string|max:100|unique:kompetensikeahlian,kompetensikeahlian,' . $id,
            'kdstandkomp' => 'required|exists:standarkompetensi,id'
        ]);

        $kompetensiKeahlian = KompetensiKeahlian::find($id);
        if ($kompetensiKeahlian) {
            $kompetensiKeahlian->update($request->all());
            return redirect()->route('kompetensikeahlian.index')
                ->with('success_message', 'Berhasil mengubah Kompetensi Keahlian');
        }

        return redirect()->route('kompetensikeahlian.index')
            ->with('error_message', 'Kompetensi Keahlian dengan id = ' . $id . ' tidak ditemukan');
    }

    public function destroy($id)
    {
        $kompetensiKeahlian = KompetensiKeahlian::find($id);
        if ($kompetensiKeahlian) {
            $kompetensiKeahlian->delete();
            return redirect()->route('kompetensikeahlian.index')
                ->with('success_message', 'Berhasil menghapus Kompetensi Keahlian "' . $kompetensiKeahlian->kompetensikeahlian . '"!');
        }

        return redirect()->route('kompetensikeahlian.index')
            ->with('error_message', 'Kompetensi Keahlian dengan id = ' . $id . ' tidak ditemukan');
    }
}
