<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPungutan extends Model
{
    //
    protected $table = "detail_pungutan";

    public function pungutan(){
    	return $this->belongsTo(JenisPungutan::class,"kd_pungutan");
    }

    public function jenis_tarif(){
    	return $this->belongsTo(JenisTarif::class,"kd_tarif");
    }

    public function detail_barang(){
    	return $this->belongsTo(DetailBarang::class,"detail_barang_id");
    }
}
