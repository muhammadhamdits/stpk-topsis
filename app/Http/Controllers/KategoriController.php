<?php

namespace App\Http\Controllers;

use App\Kategori;
use App\Kriteria;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index($id)
    {
        $kriteria = Kriteria::findOrFail($id);
        $content = 
        "<button class='btn btn-primary float-right mb-3' type='button' onclick='tambahKategori(this)'>Tambah Kategori</button>".
        "<table class='table' width='100%' id='tabelKategori'>";
        if(count($kriteria->kategori) > 0){
            foreach($kriteria->kategori as $kategori){
                $content .=
                "<tr>".
                    "<td width='75%'>".
                        "<input type='text' name='kategoris[]' value='$kategori->nama' class='form-control' required>".
                    "</td>".
                    "<td width='25%'>".
                        "<input type='number' name='nilais[]' value='$kategori->nilai' class='form-control' required>".
                    "</td>".
                "</tr>";
            }
        }else{
            $content .=
            "<tr class='text-center' id='none'>".
                "<td colspan='2'>".
                    "Kategori Kosong!".
                "</td>".
            "</tr>";
        }
        $content .= "</table>";
        echo($content);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Kategori $kategori)
    {
        //
    }

    public function edit(Kategori $kategori)
    {
        //
    }

    public function update(Request $request)
    {
        // dd(Kriteria::findOrFail($request->id_edit)->kategori);
        foreach(Kriteria::findOrFail($request->id_edit)->kategori as $key => $kategori){
            $kategori->nama = $request->kategoris[$key];
            $kategori->nilai = $request->nilais[$key];
            $kategori->update();
        }
        if($request->kategori){
            foreach($request->kategori as $key => $kategori){
                Kategori::create([
                    'nama' => $kategori,
                    'nilai' => $request->nilai[$key],
                    'kriteria_id' => $request->id_edit
                ]);
            }
        }
        
        return redirect(route('kriteria.index'));
    }

    public function destroy(Kategori $kategori)
    {
        //
    }
}
