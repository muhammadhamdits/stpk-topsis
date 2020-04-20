<?php

namespace App\Http\Controllers;

use App\Alternatif;
use App\Kriteria;
use App\AlternatifKriteria;
use Illuminate\Http\Request;

class AlternatifController extends Controller
{
    public function index()
    {
        $alternatifs = Alternatif::all();
        return view('alternatif.index', compact('alternatifs'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $alternatif = Alternatif::create($request->all());

        if(count(Kriteria::all()) > 0 && count(Alternatif::all()) > 0){
            foreach(Kriteria::all() as $kriteria){
                AlternatifKriteria::create([
                    'alternatif_id' => $alternatif->id,
                    'kriteria_id' => $kriteria->id,
                    'kategori_id' => null,
                ]);
            }
        }

        return redirect(route('alternatif.index'));
    }
    
    public function show(Alternatif $alternatif)
    {
        //
    }
    
    public function edit(Alternatif $alternatif)
    {
        //
    }
    
    public function update(Request $request)
    {
        $alternatif = Alternatif::findOrFail($request->id_edit);
        $alternatif->nama = $request->nama;
        $alternatif->update();
        
        return redirect(route('alternatif.index'));
    }
    
    public function destroy(Alternatif $alternatif)
    {
        $alternatif->delete();

        return redirect(route('alternatif.index'));
    }
}
