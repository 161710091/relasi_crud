<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\siswas;
use App\walis;

class WaliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $walis = walis::with('siswa')->get();
        return view('wali.index', compact('walis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $siswas = siswas::all();
        return view('wali.create', compact('siswas'));
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
            'id_siswa'=>'required|unique:walis|max:255'
        ]);

        $walis = new walis;
        $walis->nama = $request->nama;
        $walis->id_siswa = $request->id_siswa;
        $walis->save();
        return redirect()->route('walis.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $walis = walis::findOrFail($id);
        return view('wali.show', compact('walis'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $walis = walis::findOrFail($id);
        $siswas = siswas::all();
        $selected = walis::findOrFail($id)->id_siswa;
        return view('wali.edit', compact('walis', 'siswas', 'selected'));
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
            'id_siswa'=>'required|max:255'
        ]);

        $walis = walis::findOrFail($id);
        $walis->nama = $request->nama;
        $walis->id_siswa = $request->id_siswa;
        $walis->save();
        return redirect()->route('walis.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $walis = walis::findOrFail($id);
        $walis->delete();
        return redirect()->route('walis.index');
    }
}
