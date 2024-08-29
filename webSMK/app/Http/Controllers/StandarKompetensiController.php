<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StandarKompetensi;
use App\Models\BidangStudi;

class StandarKompetensiController extends Controller
{
    public function index()
    {
        $stankom = StandarKompetensi::all();
        return view('standarkompetensi.index', [
            'stankom' => $stankom
        ]);
    }

    public function create()
    {
        //Menampilkan Form Tambah Standar Kompetensi
        return view(
            'standarkompetensi.create',
            [
                'bstudi' => BidangStudi::all()
            ]
        );
    }

    public function store(Request $request)
    {
        //Menyimpan Data Standar Kompetensi
        $request->validate([
            'standarkompetensi' =>
            'required|unique:standarkompetensi,standarkompetensi',
            'kdbidstudi' => 'required'
        ]);
        $array = $request->only([
            'standarkompetensi', 'kdbidstudi'
        ]);
        StandarKompetensi::create($array);
        return redirect()->route('standkomp.index')
            ->with('success_message', 'Berhasil menambah standar 
kompetensi baru');
    }

    public function edit($id)
    {
        //Menampilkan Form Edit
        $stankom = StandarKompetensi::find($id);
        if (!$stankom) return redirect()->route('standkomp.index')
            ->with('error_message', 'Standar Kompetensi dengan id = ' . $id . '
tidak ditemukan');
        return view('standarkompetensi.edit', [
            'stankom' => $stankom,
            'bstudi' => BidangStudi::all()
        ]);
    }

    public function update(Request $request, $id)
    {
        //Mengedit Data Standar Kompetensi
        $request->validate([
            'standarkompetensi' =>
            'required|unique:standarkompetensi,standarkompetensi,' . $id
        ]);
        $stankom = StandarKompetensi::find($id);
        $stankom->standarkompetensi = $request->standarkompetensi;
        $stankom->kdbidstudi = $request->kdbidstudi;
        $stankom->save();
        return redirect()->route('standkomp.index')
            ->with('success_message', 'Berhasil mengubah Standar 
Kompetensi');
    }

    public function destroy($id)
{
    //Menghapus Standar Kompetensi
    $stankom = StandarKompetensi::find($id);
    if ($stankom) {
        $stankom->delete();
        return redirect()->route('standkomp.index')
            ->with('success_message', 'Berhasil menghapus standar kompetensi "' . $stankom->standarkompetensi . '"!');
    } else {
        return redirect()->route('standkomp.index')
            ->with('error_message', 'Standar Kompetensi dengan id = ' . $id . ' tidak ditemukan');
    }
}

}
