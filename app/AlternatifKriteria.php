<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlternatifKriteria extends Model
{
    protected $fillable = ['alternatif_id', 'kriteria_id', 'kategori_id'];

    public function alternatif(){
        return $this->belongsTo('App\Alternatif');
    }

    public function kriteria(){
        return $this->belongsTo('App\Kriteria');
    }

    public function kategori(){
        return $this->belongsTo('App\Kategori');
    }
}
