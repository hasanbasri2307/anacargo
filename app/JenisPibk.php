<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisPibk extends Model
{
    //
    protected $table = "jenis_pibk";

    public function cnpibk(){
    	return $this->hasMany(Cnpibk::class,'kd_jns_pibk');
    }
}
