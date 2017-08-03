<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisTarif extends Model
{
    //
    protected $table = "jenis_tarif";

    public function detail_pungutan(){
    	return $this->hasMany(DetailPungutan::class,"kd_tarif");
    }
}
