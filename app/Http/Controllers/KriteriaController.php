<?php

namespace App\Http\Controllers;

use App\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    public function index()
    {
        $kriterias = Kriteria::all();
        return view('kriteria.index', compact('kriterias'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $kriteria = Kriteria::create($request->all());

        return redirect(route('kriteria.index'));
    }

    public function show(Kriteria $kriteria)
    {
        //
    }

    public function edit(Kriteria $kriteria)
    {
        //
    }

    public function update(Request $request)
    {
        $kriteria = Kriteria::findOrFail($request->id_edit);
        $kriteria->nama = $request->nama;
        $kriteria->bobot = $request->bobot;
        $kriteria->update();
        
        return redirect(route('kriteria.index'));
    }

    public function destroy(Kriteria $kriteria)
    {
        $kriteria->delete();

        return redirect(route('kriteria.index'));
    }
}
