<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $fillable = ['nama', 'nilai', 'kriteria_id'];

    public function kriteria(){
        return $this->belongsTo('App\Kriteria');
    }
}
