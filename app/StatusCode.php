<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusCode extends Model
{
    //
    protected $table = "status_code";
    public $timestamps = false;

    public function cnpibk(){
    	return $this->hasMany(Cnpibk::class,"status_code_id");
    }

    public function status_history(){
    	return $this->hasMany(StatusHistory::class,"status_code_id");
    }
}
