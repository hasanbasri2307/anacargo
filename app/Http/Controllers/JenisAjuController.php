<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JenisAju;

class JenisAjuController extends Controller
{
    //
    public function getById($id){
    	$aju = JenisAju::find($id);
    	return response()->json(['status'=>true,'data'=>$aju]);
    }
}
