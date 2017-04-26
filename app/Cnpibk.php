<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cnpibk extends Model
{
    //
    use SoftDeletes;
    protected $table = "cnpibk";
    protected $dates = ['deleted_at'];

    public function aju(){
    	return $this->belongsTo(JenisAju::class,'jns_aju');
    }

    public function pibk(){
    	return $this->belongsTo(JenisPibk::class,'kd_jns_pibk');
    }

    public function jenis_angkut(){
    	return $this->belongsTo(JenisAngkutan::class,'kd_jns_angkut');
    }

    public function id_penerima(){
    	return $this->belongsTo(JenisId::class,'jns_id_penerima');
    }

    public function id_pemberitahu(){
    	return $this->belongsTo(JenisId::class,'jns_id_pemberitahu');
    }

    public function customer(){
    	return $this->belongsTo(Customer::class,'customer_id');
    }

    public function status_code(){
        return $this->belongsTo(StatusCode::class,"status_code_id");
    }

    public function status_history(){
        return $this->hasMany(StatusHistory::class,"cnpibk_id");
    }

    public function header_pungutan(){
        return $this->hasMany(HeaderPungutan::class,"cnpibk_id");
    }

    public function detail_barang(){
        return $this->hasMany(DetailBarang::class,"cnpibk_id");
    }
}
