<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusHistory extends Model
{
    //
    protected $table = "status_history";
    public $timestamps = false;

    public function cnpibk(){
    	return $this->belongsTo(Cnpibk::class,"cnpibk_id");
    }

    public function status_code(){
    	return $this->belongsTo(StatusCode::class,"status_code_id");
    }

}
