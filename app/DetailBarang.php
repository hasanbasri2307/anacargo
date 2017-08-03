<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailBarang extends Model
{
    //
    protected $table = "detail_barang";

    public function cnpibk(){
    	return $this->belongsTo(Cnpibk::class,"cnpibk_id");
    }

    public function detail_pungutan(){
    	return $this->hasMany(DetailPungutan::class,"detail_barang_id");
    }
}
