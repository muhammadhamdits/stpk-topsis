<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    protected $fillable = ['nama'];

    public function alternatifKriteria(){
        return $this->hasMany('App\AlternatifKriteria');
    }
}
