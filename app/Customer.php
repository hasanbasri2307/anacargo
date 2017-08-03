<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    //
    use SoftDeletes;
    
    protected $table = "customers";

    protected $fillable = [
        'no_api', 'email', 'name','address','phone_1','fax','npwp',
    ];

     protected $dates = ['deleted_at'];

    public function cnpibk(){
    	return $this->hasMany(Cnpibk::class,'customer_id');
    }
}
