<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Http\Requests\ClientRequest;
use App\Http\Requests\ImportRequest;
use Excel;
use Validator;

class CustomerController extends Controller
{
    //

    public function index(){
    	$data['title'] = "Clients";
    	$data['clients'] = Customer::all();
    	return view("pages.client.index",$data);
    }

    public function create(){
    	$data['title'] = "Create Client";
    	return view("pages.client.create",$data);
    }

    public function store(ClientRequest $request){
    	$client = Customer::create($request->except('_token'));

    	return redirect('customers')->with(['success'=>'Berhasil tambah klien.']);
    }

    public function edit($id){
        $data['title'] = "Edit Client";
        $data['client'] = Customer::find($id);
        return view("pages.client.edit",$data);
    }

    public function update($id,ClientRequest $request){
        $client = Customer::where("id",$id)
                   ->update($request->except('_token'));

        return redirect('customers')->with(['success'=>'Berhasil ubah klien.']);
    }

    public function delete($id){
    	$client = Customer::destroy($id);
    	return redirect('customers')->with(['success'=>'Berhasil hapus klien.']);
    }

    public function show($id){
    	$client = Customer::find($id);
    	return response()->json(['status'=>true,'client'=>$client]);
    }

    public function showImport(){
        $data['title'] = "Import Client";
        return view("pages.client.import",$data);
    }

    public function doImport(ImportRequest $request){
        $file = $request->file('file');
        $error = "";
        $available_column = ['no_api','name','npwp','email','address','phone_1','fax'];
        $data = Excel::load($file,function($reader) use(&$error,$available_column){
            $results = $reader->all();

            if(count($results->toArray()) > 0){
                $first_column = $reader->first()->keys();

                foreach($first_column as $item){
                  if(!in_array($item, $available_column)){
                      $error = "Format Kolom Excel Anda Salah.";
                  }
                }

                 $insert = Customer::insert($results->toArray());
                // foreach($results as $result){

                //     $validator = Validator::make($result->toArray(), [
                //         'name' => 'required',
                //         "npwp" => "required"

                //     ]);

                //     if($validator->fails()){
                //         $error = $validator->errors();
                //     }
                // }

                // if(!empty($error)){
                //      $error = "Field Mandatory Harus Diisi Disemua Row. (Nama, NPWP)";
                // }else{
                //     $insert = Customer::insert($results->toArray());
                // }

            }else{
                $error = "Data upload kosong. Silahkan lengkapi dahulu.";
            }
            
        });

        if(!empty($error)){
            return redirect()->back()->with(["error"=>$error]);
        }

        return redirect('customers')->with(["success"=>"Berhasil import client."]);
    }

    public function getById($id){
        $customer = Customer::find($id);
        return response()->json(['status'=>true,'data'=>$customer]);
    }
}
