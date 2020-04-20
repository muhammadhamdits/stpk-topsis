<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    protected $fillable = ['nama', 'bobot'];

    public function alternatifKriteria(){
        return $this->hasMany('App\AlternatifKriteria');
    }

    public function kategori(){
        return $this->hasMany('App\Kategori');
    }
}
