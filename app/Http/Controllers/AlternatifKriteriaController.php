<?php

namespace App\Http\Controllers;

use App\AlternatifKriteria;
use App\Alternatif;
use DB;
use Illuminate\Http\Request;

class AlternatifKriteriaController extends Controller
{
    public function index($id)
    {
        $content = "";
        foreach(Alternatif::findOrFail($id)->alternatifKriteria as $ak){
            $content .=
            "<div class='form-group'>".
                "<label for='$ak->kriteria_id'>".$ak->kriteria->nama."</label>".
                "<select name='kriteria[$ak->kriteria_id]' class='form-control' required>".
                    "<option value='' selected disabled>Pilih Kategori</option>";
                    foreach($ak->kriteria->kategori as $k){
                        $content .=
                        "<option value='$k->id'";
                        if($k->id == $ak->kategori_id){
                            $content .= " selected ";
                        }
                        $content .=
                        ">$k->nama</option>";
                    }
            $content .=
                "</select>".
            "</div>";
        }
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

    public function show(AlternatifKriteria $alternatifKriteria)
    {
        //
    }

    public function edit(AlternatifKriteria $alternatifKriteria)
    {
        //
    }

    public function update(Request $request)
    {
        foreach ($request->kriteria as $key => $value) {
            DB::update('update alternatif_kriterias set kategori_id = ? where alternatif_id = ? and kriteria_id = ?', [$value, $request->id_edit, $key]);
        }

        return redirect(route('alternatif.index'));
    }

    public function destroy(AlternatifKriteria $alternatifKriteria)
    {
        //
    }
}
