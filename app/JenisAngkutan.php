<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisAngkutan extends Model
{
    //
    protected $table = "jenis_angkutan";

    public function cnpibk(){
    	return $this->hasMany(Cnpibk::class,'kd_jns_angkut');
    }
}
