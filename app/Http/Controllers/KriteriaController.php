<?php

namespace App\Http\Controllers;

use App\Kriteria;
use App\Alternatif;
use App\AlternatifKriteria;
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

        if(count(Kriteria::all()) > 0 && count(Alternatif::all()) > 0){
            foreach(Alternatif::all() as $alternatif){
                AlternatifKriteria::create([
                    'alternatif_id' => $alternatif->id,
                    'kriteria_id' => $kriteria->id,
                    'kategori_id' => null,
                ]);
            }
        }

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
