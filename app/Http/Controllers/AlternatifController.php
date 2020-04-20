<?php

namespace App\Http\Controllers;

use App\Alternatif;
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
