<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\siswas;
use App\dosens;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswas = siswas::with('dosen')->get();
        return view('siswa.index', compact('siswas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dosens = dosens::all();
        return view('siswa.create', compact('dosens'));
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
            'nama'=>'required|max:255',
            'nis'=>'required|unique:siswas|max:255',
            'id_dosen'=>'required|max:255'
        ]);

        $siswas = new siswas;
        $siswas->nama = $request->nama;
        $siswas->nis = $request->nis;
        $siswas->id_dosen = $request->id_dosen;
        $siswas->save();
        return redirect()->route('siswas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $siswas = siswas::findOrFail($id);
        return view('siswa.show', compact('siswas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $siswas = siswas::findOrFail($id);
        $dosens = dosens::all();
        $selected = siswas::findOrFail($id)->id_dosen;
        return view('siswa.edit', compact('siswas', 'dosens', 'selected'));
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
            'nama'=>'required|max:255',
            'nis'=>'required|max:255',
            'id_dosen'=>'required|max:255'
        ]);

        $siswas = siswas::findOrFail($id);
        $siswas->nama = $request->nama;
        $siswas->nis = $request->nis;
        $siswas->id_dosen = $request->id_dosen;
        $siswas->save();
        return redirect()->route('siswas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $siswas = siswas::findOrFail($id);
        $siswas->delete();
        return redirect()->route('siswas.index');
    }
}
