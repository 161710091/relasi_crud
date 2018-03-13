<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\dosens;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dosens = dosens::all();
        return view('dosen.index', compact('dosens'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dosen.create');
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
            'nipd'=>'required|unique:dosens|max:255'
        ]);

        $dosens = new dosens;
        $dosens->nama = $request->nama;
        $dosens->nipd = $request->nipd;
        $dosens->save();
        return redirect()->route('dosens.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dosens = dosens::findOrFail($id);
        return view('dosen.show', compact('dosens'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dosens = dosens::findOrFail($id);
        return view('dosen.edit', compact('dosens'));
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
            'nipd'=>'required|max:255'
        ]);

        $dosens = dosens::findOrFail($id);
        $dosens->nama = $request->nama;
        $dosens->nipd = $request->nipd;
        $dosens->save();
        return redirect()->route('dosens.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dosens = dosens::findOrFail($id);
        $dosens->delete();
        return redirect()->route('dosens.index');
    }
}
