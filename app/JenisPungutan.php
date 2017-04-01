<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisPungutan extends Model
{
    //
    protected $table = "jenis_pungutan";

    public function header_pungutan(){
    	return $this->hasMany(HeaderPungutan::class,"kd_pungutan");
    }

    public function detail_pungutan(){
    	return $this->hasMany(DetailPungutan::class,"kd_pungutan");
    }
}
