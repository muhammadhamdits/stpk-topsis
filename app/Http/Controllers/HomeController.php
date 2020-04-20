<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kriteria;
use App\Alternatif;
use App\AlternatifKriteria;

class HomeController extends Controller
{
    public function index(){
        $kriteria = Kriteria::all();
        $alternatif = Alternatif::all();
        $best = "-";
        $status = true;
        $v = [];

        if(count(Kriteria::all()) == 0 || count(Alternatif::all()) == 0){
            $status = false;
        }
        foreach(Kriteria::all() as $k){
            foreach($k->alternatifKriteria as $ak){
                if($ak->kategori_id == null){
                    $status = false;
                }
            }
        }

        if($status == true){
            $x = [];
            foreach(Kriteria::all() as $krit){
                $xi = 0;
                foreach(Alternatif::all() as $alt){
                    $tmp = AlternatifKriteria::where('alternatif_id', $alt->id)
                                        ->where('kriteria_id', $krit->id)
                                        ->first()->kategori->nilai;
                    $xi += $tmp*$tmp;
                }
                $x[] = sqrt($xi);
            }

            $r = [];
            $ap = [];
            $an = [];
            foreach(Kriteria::all() as $key => $krit){
                $ri = [];
                $max = 0;
                $min = 1000;
                foreach(Alternatif::all() as $alt){
                    $tmp = AlternatifKriteria::where('alternatif_id', $alt->id)
                                        ->where('kriteria_id', $krit->id)
                                        ->first()->kategori->nilai;
                    $ri[] = ($tmp / $x[$key]) * $krit->bobot;
                    if(($tmp / $x[$key]) * $krit->bobot > $max){
                        $max = ($tmp / $x[$key]) * $krit->bobot;
                    }
                    if(($tmp / $x[$key]) * $krit->bobot < $min){
                        $min = ($tmp / $x[$key]) * $krit->bobot;
                    }
                }
                if($krit->jenis == 0){
                    $tmp = $max;
                    $max = $min;
                    $min = $tmp;
                }
                $ap[] = $max;
                $an[] = $min;
                $r[] = $ri;
            }
            
            $dp = [];
            $dn = [];
            $max = 0;
            foreach(Alternatif::all() as $key => $alt){
                $dpi = 0;
                $dni = 0;
                foreach(Kriteria::all() as $key2 => $krit){
                    $tmp = $r[$key2][$key];
                    $dpi += ($tmp - $ap[$key2]) * ($tmp - $ap[$key2]);
                    $dni += ($tmp - $an[$key2]) * ($tmp - $an[$key2]);
                }
                $dp[] = sqrt($dpi);
                $dn[] = sqrt($dni);
                $v[] = sqrt($dni) / (sqrt($dni)+sqrt($dpi));
                if(sqrt($dni) / (sqrt($dni)+sqrt($dpi)) > $max){
                    $max = sqrt($dni) / (sqrt($dni)+sqrt($dpi));
                    $best = $alt->nama;
                }
            }
            
        }
        return view('home.index', compact('kriteria', 'alternatif', 'best', 'status', 'v'));
    }
}
