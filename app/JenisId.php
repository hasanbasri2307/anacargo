<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisId extends Model
{
    //
    protected $table = "jenis_id";

    public function pibk(){
    	return $this->hasMany(Cnpibk::class,'jns_id_penerima');
    }

    public function pemberitahu_pibk(){
    	return $this->hasMany(Cnpibk::class,'jns_id_pemberitahu');
    }
}
