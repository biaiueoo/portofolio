<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BidangStudi;

class BidangStudiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //menampilkan bidang studi
        $bstudi = BidangStudi::all();
        return view('bidangstudi.index', [
            'bdstudi' => $bstudi
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bidangstudi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'bidangstudi' => 'required|unique:bidangstudi,bidangstudi'
        ]);
        $array = $request->only([
            'bidangstudi'
        ]);
        $bstudi = BidangStudi::create($array);
        return redirect()->route('bidstudi.index')->with('success_message', 'Berhasil menambah bidang studi 
        baru');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bstudi = BidangStudi::find($id);
        if (!$bstudi) return redirect()->route('bidstudi.index')
            ->with('error_message', 'bidang studi dengan id = ' . $id . ' tidak 
ditemukan');
        return view('bidangstudi.edit', [
            'bdstudi' => $bstudi
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'bidangstudi' =>
            'required|unique:bidangstudi,bidangstudi,' . $id
        ]);
        $bstudi = BidangStudi::find($id);
        $bstudi->bidangstudi = $request->bidangstudi;
        $bstudi->save();
        return redirect()->route('bidstudi.index')
            ->with('success_message', 'Berhasil mengubah bidang studi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Menghapus Bidang Studi
        $bstudi = BidangStudi::find($id);
        if ($bstudi) $bstudi->delete();
        return redirect()->route('bidstudi.index')
            ->with('success_message', 'Berhasil menghapus bidang 
studi');
    }
}
