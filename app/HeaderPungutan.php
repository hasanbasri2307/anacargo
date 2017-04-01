<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HeaderPungutan extends Model
{
    //
    protected $table = "header_pungutan";

    public function pungutan(){
    	return $this->belongsTo(JenisPungutan::class,"kd_pungutan");
    }

    public function cnpibk(){
    	return $this->belongsTo(Cnpibk::class,"cnpibk_id");
    }
}
