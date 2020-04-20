<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    protected $fillable = ['nama'];

    public function alternatifKriteria(){
        return $this->hasMany('App\AlternatifKriteria');
    }

    public function status(){
        return $this->hasMany('App\AlternatifKriteria')->where('kategori_id', null);
    }
}
