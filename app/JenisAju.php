<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisAju extends Model
{
    //
    protected $table = "jenis_aju";

    public function cnpibk(){
    	return $this->hasMany(Cnpibk::class,'jns_aju');
    }
}
