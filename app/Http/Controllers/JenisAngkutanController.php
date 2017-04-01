<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JenisAngkutan;

class JenisAngkutanController extends Controller
{
    //
    public function getById($id){
        $jenis_angkutan = JenisAngkutan::find($id);
        return response()->json(['status'=>true,'data'=>$jenis_angkutan]);
    }
}
