<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cnpibk;
use App\HeaderPungutan;
use App\DetailBarang;
use App\DetailPungutan;
use App\JenisId;
use App\JenisAju;
use App\JenisPibk;
use App\Customer;
use App\JenisAngkutan;
use App\JenisPungutan;
use App\JenisTarif;
use App\StatusCode;
use App\StatusHistory;
use App\Http\Requests\CnRequest;
use Validator;
use DB;
use Config;

class CnpibkController extends Controller
{
    //
    public function index(){
    	$data['title'] = "CN";
    	$data['cn'] = Cnpibk::where("tipe_dokumen","cn")->paginate(10);

    	return view("pages.cnpibk.index",$data);
    }

    public function create(){
    	
    	$jenisId = JenisId::all();
    	$jenisAju = JenisAju::all();
    	$jenisPibk = JenisPibk::all();
    	$customer = Customer::all();
    	$jenisAngkutan = JenisAngkutan::all();
    	$jenisPungutan = JenisPungutan::all();
    	$jenisTarif = JenisTarif::all();

        $data['title'] = "Create CN";
    	$data['jenis_aju'] = array_pluck($jenisAju,'nama_aju','id');
    	$data['jenis_pibk'] = array_pluck($jenisPibk,'nama_pibk','id');
    	$data['customer'] = array_pluck($customer,'name','id');
    	$data['jenis_id'] = $jenisId;
    	$data['jenis_angkutan'] = array_pluck($jenisAngkutan,'kode_angkutan','id');
    	$data['jenis_pungutan'] = array_pluck($jenisPungutan,'nama_pungutan','id');
    	$data['jenis_tarif'] = array_pluck($jenisTarif,'nama_tarif','id');

    	return view("pages.cnpibk.create",$data);
    }

    public function store(Request $request){
        if($request->ajax()){
            $rules = [
                'no_barang'=>"required",
                'kd_kantor' => 'required',
                'nm_pengangkut' => 'required',
                'no_flight' => 'required',
                'kd_pel_muat' => 'required',
                'kd_pel_bongkar' => 'required',
                'kd_gudang' => 'required',
                'kd_negara_asal' => 'required',
                'jml_barang' => 'required',
                "kd_negara_pengirim" => "required",
                "nm_pengirim" => "required",
                "al_pengirim" => "required",
                "nm_penerima" => "required",
                "al_penerima" => "required",
                "jns_id_pemberitahu" => "required",
                "kd_valas" => "required",
                "cif" => "required",
                "netto" => "required",
                "bruto" => "required",
                "npwp_billing" => "required"
            ];

            $messages = [
                "no_barang.required" => "No Barang harus diisi",
                "kd_kantor.required" => "No Kantor harus diisi",
                "kd_gudang.required" => "Kode Gudang harus diisi",
                "nm_pengangkut.required" => "Nama Pengangkut harus diisi",
                "no_flight.required" => "No Flight harus diisi",
                "kd_pel_muat.required" => "Kode Pelabuhan Muat harus diisi",
                "kd_pel_bongkar.required" => "Kode Pelabuhan Bongkar harus diisi",
                "kd_negara_asal.required" => "Kode Negara Asal harus diisi",
                "jml_barang.required" => "Jumlah Barang harus diisi",
                "kd_negara_pengirim.required" => "Kode Negara Pengirim harus diisi",
                "nm_pengirim.required" => "Nama Pengirim harus diisi",
                "al_pengirim.required" => "Alamat Pengirim harus diisi",
                "nm_penerima.required" => "Nama Penerima harus diisi",
                "al_penerima.required" => "Alamat Penerima harus diisi",
                "jns_id_pemberitahu.required" => "Jenis ID Pemberitahu harus diisi",
                "kd_valas.required" => "Kode Valas harus diisi",
                "cif.required" => "CIF harus diisi",
                "netto.required" => "Netto harus diisi",
                "bruto.required" => "Bruto harus diisi",
                "npwp_billing.required" =>" NPWP Billing harus diisi"

            ];

            $validator = Validator::make($request->except('_token'),$rules,$messages);
            if($validator->fails()){
                return response()->json(['status'=>false,'error'=>$validator->errors()]);
            }

            DB::transaction(function () use($request) {
            	$jenis_angutan_model = JenisAngkutan::where("kode_angkutan",$request->input("kd_jns_angkut"))->first();
            	$jns_id_pemberitahu_model = JenisId::where("jns_id",$request->input("jns_id_pemberitahu"))->first();

                $cnpibk = new Cnpibk();
                $cnpibk->jns_aju = $request->input("jns_aju");
                $cnpibk->kd_jns_pibk = $request->input("kd_jns_pibk");
                $cnpibk->no_barang = $request->input("no_barang");
                $cnpibk->kd_kantor = $request->input("kd_kantor");
                $cnpibk->kd_jns_angkut = $jenis_angutan_model->id;
                $cnpibk->nm_pengangkut = $request->input("nm_pengangkut");
                $cnpibk->no_flight = $request->input("no_flight");
                $cnpibk->kd_pel_muat = $request->input("kd_pel_muat");
                $cnpibk->kd_pel_bongkar = $request->input("kd_pel_bongkar");
                $cnpibk->kd_gudang = $request->input("kd_gudang");
                $cnpibk->no_invoice = $request->input("no_invoice");
                $cnpibk->tgl_invoice = $request->has('tgl_invoice') ? date("Y-m-d",strtotime($request->input("tgl_invoice"))) : NULL;
                $cnpibk->kd_negara_asal = $request->input("kd_negara_asal");
                $cnpibk->jml_barang = $request->input("jml_barang");
                $cnpibk->no_bc11 = $request->input("no_bc11");
                $cnpibk->tgl_bc11 = $request->has("tgl_bc11") ? date("Y-m-d",strtotime($request->input("tgl_bc11"))) : NULL;
                $cnpibk->no_pos_bc11 = $request->input("no_pos_bc11");
                $cnpibk->no_subpos_bc11 = $request->input("no_subpos_bc11");
                $cnpibk->no_subsubpos_bc11 = $request->input("no_subsubpos_bc11");
                $cnpibk->no_master_blawb = $request->input("no_master_blawb");
                $cnpibk->tgl_master_blawb = date("Y-m-d",strtotime($request->input("tgl_master_blawb")));
                $cnpibk->no_house_blawb = $request->input("no_house_blawb");
                $cnpibk->tgl_house_blawb = $request->has('tgl_house_blawb') ? date("Y-m-d",strtotime($request->input("tgl_house_blawb"))) : NULL;
                $cnpibk->kd_negara_pengirim = $request->input("kd_negara_pengirim");
                $cnpibk->nm_pengirim = $request->input("nm_pengirim");
                $cnpibk->al_pengirim = $request->input("al_pengirim");
                $cnpibk->jns_id_penerima =  $request->has('jns_id_penerima') ? $request->input("jns_id_penerima") : 17 ;
                $cnpibk->customer_id = $request->input("customer_id");
                $cnpibk->jns_id_pemberitahu = $jns_id_pemberitahu_model->id;
                $cnpibk->no_id_pemberitahu = $request->input("no_id_pemberitahu");
                $cnpibk->nm_pemberitahu = $request->input("nm_pemberitahu");
                $cnpibk->al_pemberitahu = $request->input("al_pemberitahu");
                $cnpibk->no_izin_pemberitahu = $request->input("no_izin_pemberitahu");
                $cnpibk->tgl_izin_pemberitahu = date("Y-m-d",strtotime($request->input("tgl_izin_pemberitahu")));
                $cnpibk->kd_valas = $request->input("kd_valas");
                $cnpibk->ndpbm = $request->input("ndpbm");
                $cnpibk->fob = $request->input("fob");
                $cnpibk->asuransi = $request->input("asuransi");
                $cnpibk->freight = $request->input("freight");
                $cnpibk->cif = $request->input("cif");
                $cnpibk->netto = $request->input("netto");
                $cnpibk->bruto = $request->input("bruto");
                $cnpibk->tot_dibayar = $request->input("tot_dibayar");
                $cnpibk->npwp_billing = $request->input("npwp_billing");
                $cnpibk->nama_billing = $request->input("nama_billing");
                $cnpibk->status =0;
                $cnpibk->tipe_dokumen = "cn";
                $cnpibk->status_code_id = 37;
                $cnpibk->save();


                if($request->has("kd_pungutan")){
                    foreach($request->input("kd_pungutan") as $key => $value){
                        $hp = new HeaderPungutan();
                        $hp->cnpibk_id = $cnpibk->id;
                        $hp->kd_pungutan = $value;
                        $hp->nilai = $request->input("nilai")[$key];
                        $hp->save();
                    }
                }

                if($request->has("seri_brg")){
                    foreach($request->input("seri_brg") as $key => $value){
                        $db = new DetailBarang();
                        $db->cnpibk_id = $cnpibk->id;
                        $db->seri_brg = $value;
                        $db->hs_code = $request->input("hs_code")[$key];
                        $db->ur_brg = $request->input("ur_brg")[$key];
                        $db->kd_neg_asal = $request->input("kd_neg_asal")[$key];
                        $db->jml_kms = $request->input("jml_kms")[$key];
                        $db->jns_kms = $request->input("jns_kms")[$key];
                        $db->cif = $request->input("cif_detail")[$key];
                        $db->kd_sat_hrg = $request->input("kd_sat_hrg")[$key];
                        $db->jml_sat_hrg = $request->input("jml_sat_hrg")[$key];
                        $db->fl_bebas = $request->input("fl_bebas")[$key];
                        $db->no_skep = $request->input("no_skep")[$key];
                        if($request->has("tgl_skep")[$key]){
                        	$db->tgl_skep = date("Y-m-d",strtotime($request->input("tgl_skep")[$key]));
                        }
                        
                        $db->save();

                        if($request->has("kd_pungutan_detail")){
		                    foreach($request->input("kd_pungutan_detail") as $k => $val){
		                    	if($request->input("seri-brg-detail")[$k] == $value && $request->input("hs-code-detail")[$k] == $request->input("hs_code")[$key]){
		                    		$dp = new DetailPungutan();
			                        $dp->detail_barang_id = $db->id;
			                        $dp->kd_pungutan= $val;
			                        $dp->nilai = $request->input("nilai_detail")[$k];
			                        $dp->jns_tarif = $request->input("jenis_tarif_detail")[$k];
			                        $dp->kd_tarif = $request->input("kd_tarif_detail")[$k];
			                        $dp->kd_sat_tarif = $request->input("kd_sat_tarif_detail")[$k];
			                        $dp->jml_sat = $request->input("jml_sat_detail")[$k];
			                        $dp->tarif = $request->input("tarif_detail")[$k];
			                        $dp->save();
		                    	}
		                        
		                    }
		                }
                    }
                }

            }, 2);


            return response()->json(['status'=>true]);

        }

        return response()->json(['status'=>false]);
    }

    public function edit($id){

    	$jenisId = JenisId::all();
    	$jenisAju = JenisAju::all();
    	$jenisPibk = JenisPibk::all();
    	$customer = Customer::all();
    	$jenisAngkutan = JenisAngkutan::all();
    	$jenisPungutan = JenisPungutan::all();
    	$jenisTarif = JenisTarif::all();

    	$data['id'] =$id;
    	$data['cnpibk_header_pungutan'] = HeaderPungutan::where("cnpibk_id",$id)->get();
    	$data['cnpibk_detail_barang'] = DetailBarang::where("cnpibk_id",$id)->get();
    	$detail_pungutan = DB::select("select *, detail_pungutan.id as idnya from detail_pungutan inner join detail_barang on detail_barang.id = detail_pungutan.detail_barang_id where detail_barang.cnpibk_id = ?",[$id]);
    	$data['cnpibk_detail_pungutan'] = $detail_pungutan;

    	$data['cnpibk'] = Cnpibk::find($id);
        $data['title'] = "Edit CN";
    	$data['jenis_aju'] = array_pluck($jenisAju,'nama_aju','id');
    	$data['jenis_pibk'] = array_pluck($jenisPibk,'nama_pibk','id');
    	$data['customer'] = array_pluck($customer,'name','id');
    	$data['jenis_id'] = $jenisId;
    	$data['jenis_angkutan'] = array_pluck($jenisAngkutan,'kode_angkutan','id');
    	$data['jenis_pungutan'] = array_pluck($jenisPungutan,'nama_pungutan','id');
    	$data['jenis_tarif'] = array_pluck($jenisTarif,'nama_tarif','id');

    	return view("pages.cnpibk.edit",$data);
    }

    public function update($id,Request $request){
    	if($request->ajax()){
            $rules = [
                'no_barang'=>"required",
                'kd_kantor' => 'required',
                'nm_pengangkut' => 'required',
                'no_flight' => 'required',
                'kd_pel_muat' => 'required',
                'kd_pel_bongkar' => 'required',
                'kd_gudang' => 'required',
                'kd_negara_asal' => 'required',
                'jml_barang' => 'required',
                "kd_negara_pengirim" => "required",
                "nm_pengirim" => "required",
                "al_pengirim" => "required",
                "nm_penerima" => "required",
                "al_penerima" => "required",
                "jns_id_pemberitahu" => "required",
                "kd_valas" => "required",
                "cif" => "required",
                "netto" => "required",
                "bruto" => "required",
                "npwp_billing" => "required"
            ];

            $messages = [
                "no_barang.required" => "No Barang harus diisi",
                "kd_kantor.required" => "No Kantor harus diisi",
                "kd_gudang.required" => "Kode Gudang harus diisi",
                "nm_pengangkut.required" => "Nama Pengangkut harus diisi",
                "no_flight.required" => "No Flight harus diisi",
                "kd_pel_muat.required" => "Kode Pelabuhan Muat harus diisi",
                "kd_pel_bongkar.required" => "Kode Pelabuhan Bongkar harus diisi",
                "kd_negara_asal.required" => "Kode Negara Asal harus diisi",
                "jml_barang.required" => "Jumlah Barang harus diisi",
                "kd_negara_pengirim.required" => "Kode Negara Pengirim harus diisi",
                "nm_pengirim.required" => "Nama Pengirim harus diisi",
                "al_pengirim.required" => "Alamat Pengirim harus diisi",
                "nm_penerima.required" => "Nama Penerima harus diisi",
                "al_penerima.required" => "Alamat Penerima harus diisi",
                "jns_id_pemberitahu.required" => "Jenis ID Pemberitahu harus diisi",
                "kd_valas.required" => "Kode Valas harus diisi",
                "cif.required" => "CIF harus diisi",
                "netto.required" => "Netto harus diisi",
                "bruto.required" => "Bruto harus diisi",
                "npwp_billing.required" =>" NPWP Billing harus diisi"

            ];

            $validator = Validator::make($request->except('_token'),$rules,$messages);
            if($validator->fails()){
                return response()->json(['status'=>false,'error'=>$validator->errors()]);
            }

            DB::transaction(function () use($request,$id) {
            	$jenis_angutan_model = JenisAngkutan::where("kode_angkutan",$request->input("kd_jns_angkut"))->first();
            	$jns_id_pemberitahu_model = JenisId::where("jns_id",$request->input("jns_id_pemberitahu"))->first();

                $cnpibk = Cnpibk::find($id);
                $cnpibk->jns_aju = $request->input("jns_aju");
                $cnpibk->kd_jns_pibk = $request->input("kd_jns_pibk");
                $cnpibk->no_barang = $request->input("no_barang");
                $cnpibk->kd_kantor = $request->input("kd_kantor");
                $cnpibk->kd_jns_angkut = $jenis_angutan_model->id;
                $cnpibk->nm_pengangkut = $request->input("nm_pengangkut");
                $cnpibk->no_flight = $request->input("no_flight");
                $cnpibk->kd_pel_muat = $request->input("kd_pel_muat");
                $cnpibk->kd_pel_bongkar = $request->input("kd_pel_bongkar");
                $cnpibk->kd_gudang = $request->input("kd_gudang");
                $cnpibk->no_invoice = $request->input("no_invoice");
                $cnpibk->tgl_invoice = $request->has('tgl_invoice') ? date("Y-m-d",strtotime($request->input("tgl_invoice"))) : NULL;
                $cnpibk->kd_negara_asal = $request->input("kd_negara_asal");
                $cnpibk->jml_barang = $request->input("jml_barang");
                $cnpibk->no_bc11 = $request->input("no_bc11");
                $cnpibk->tgl_bc11 = $request->has("tgl_bc11") ? date("Y-m-d",strtotime($request->input("tgl_bc11"))) : NULL;
                $cnpibk->no_pos_bc11 = $request->input("no_pos_bc11");
                $cnpibk->no_subpos_bc11 = $request->input("no_subpos_bc11");
                $cnpibk->no_subsubpos_bc11 = $request->input("no_subsubpos_bc11");
                $cnpibk->no_master_blawb = $request->input("no_master_blawb");
                $cnpibk->tgl_master_blawb = date("Y-m-d",strtotime($request->input("tgl_master_blawb")));
                $cnpibk->no_house_blawb = $request->input("no_house_blawb");
                $cnpibk->tgl_house_blawb = $request->has('tgl_house_blawb') ? date("Y-m-d",strtotime($request->input("tgl_house_blawb"))) : NULL;
                $cnpibk->kd_negara_pengirim = $request->input("kd_negara_pengirim");
                $cnpibk->nm_pengirim = $request->input("nm_pengirim");
                $cnpibk->al_pengirim = $request->input("al_pengirim");
                $cnpibk->jns_id_penerima =  $request->has('jns_id_penerima') ? $request->input("jns_id_penerima") : 17 ;
                $cnpibk->customer_id = $request->input("customer_id");
                $cnpibk->jns_id_pemberitahu = $jns_id_pemberitahu_model->id;
                $cnpibk->no_id_pemberitahu = $request->input("no_id_pemberitahu");
                $cnpibk->nm_pemberitahu = $request->input("nm_pemberitahu");
                $cnpibk->al_pemberitahu = $request->input("al_pemberitahu");
                $cnpibk->no_izin_pemberitahu = $request->input("no_izin_pemberitahu");
                $cnpibk->tgl_izin_pemberitahu = date("Y-m-d",strtotime($request->input("tgl_izin_pemberitahu")));
                $cnpibk->kd_valas = $request->input("kd_valas");
                $cnpibk->ndpbm = $request->input("ndpbm");
                $cnpibk->fob = $request->input("fob");
                $cnpibk->asuransi = $request->input("asuransi");
                $cnpibk->freight = $request->input("freight");
                $cnpibk->cif = $request->input("cif");
                $cnpibk->netto = $request->input("netto");
                $cnpibk->bruto = $request->input("bruto");
                $cnpibk->tot_dibayar = $request->input("tot_dibayar");
                $cnpibk->npwp_billing = $request->input("npwp_billing");
                $cnpibk->nama_billing = $request->input("nama_billing");
                $cnpibk->status =0;
                $cnpibk->tipe_dokumen = "cn";
                $cnpibk->status_code_id = 37;
                $cnpibk->save();

             

                if($request->has("kd_pungutan")){

                    foreach($request->input("kd_pungutan") as $key => $value){
                    	if(!empty($request->input("header_pungutan_id")[$key])){
                    		$hp = HeaderPungutan::find($request->input("header_pungutan_id")[$key]);
                    		$hp->kd_pungutan = $value;
                    		$hp->nilai  = $request->input("nilai")[$key];
                    		$hp->save();

                    	}else{
                    		$hp = new HeaderPungutan();
	                        $hp->cnpibk_id = $cnpibk->id;
	                        $hp->kd_pungutan = $value;
	                        $hp->nilai = $request->input("nilai")[$key];
	                        $hp->save();
                    	}
                        
                    }
                }


                if($request->has("seri_brg")){
                    foreach($request->input("seri_brg") as $key => $value){
                    	
                    	if(!empty($request->input("detail_barang_id")[$key])){
                    		$detail_brgid = $request->input("detail_barang_id")[$key];

                    		$db = DetailBarang::find($request->input("detail_barang_id")[$key]);
	                        $db->seri_brg = $value;
	                        $db->hs_code = $request->input("hs_code")[$key];
	                        $db->ur_brg = $request->input("ur_brg")[$key];
	                        $db->kd_neg_asal = $request->input("kd_neg_asal")[$key];
	                        $db->jml_kms = $request->input("jml_kms")[$key];
	                        $db->jns_kms = $request->input("jns_kms")[$key];
	                        $db->cif = $request->input("cif_detail")[$key];
	                        $db->kd_sat_hrg = $request->input("kd_sat_hrg")[$key];
	                        $db->jml_sat_hrg = $request->input("jml_sat_hrg")[$key];
	                        $db->fl_bebas = $request->input("fl_bebas")[$key];
	                        $db->no_skep = $request->input("no_skep")[$key];
	                        if($request->has("tgl_skep")[$key]){
	                        	$db->tgl_skep = date("Y-m-d",strtotime($request->input("tgl_skep")[$key]));
	                        }
	                        
	                        $db->save();

                    	}else{
                    		$db = new DetailBarang();
	                        $db->cnpibk_id = $cnpibk->id;
	                        $db->seri_brg = $value;
	                        $db->hs_code = $request->input("hs_code")[$key];
	                        $db->ur_brg = $request->input("ur_brg")[$key];
	                        $db->kd_neg_asal = $request->input("kd_neg_asal")[$key];
	                        $db->jml_kms = $request->input("jml_kms")[$key];
	                        $db->jns_kms = $request->input("jns_kms")[$key];
	                        $db->cif = $request->input("cif_detail")[$key];
	                        $db->kd_sat_hrg = $request->input("kd_sat_hrg")[$key];
	                        $db->jml_sat_hrg = $request->input("jml_sat_hrg")[$key];
	                        $db->fl_bebas = $request->input("fl_bebas")[$key];
	                        $db->no_skep = $request->input("no_skep")[$key];
	                        if($request->has("tgl_skep")[$key]){
	                        	$db->tgl_skep = date("Y-m-d",strtotime($request->input("tgl_skep")[$key]));
	                        }
	                        
	                        $db->save();

	                        $detail_brgid = $db->id;
                    	}
                        
                      
                        if($request->has("kd_pungutan_detail")){
		                    foreach($request->input("kd_pungutan_detail") as $k => $val){
		                    	if($request->input("seri-brg-detail")[$k] == $value && $request->input("hs-code-detail")[$k] == $request->input("hs_code")[$key]){
		                    		if(!empty($_POST["detail_pungutan_id"][$k])){
		                    			$dp = DetailPungutan::find($request->input("detail_pungutan_id")[$k]);
				                        $dp->kd_pungutan= $val;
				                        $dp->nilai = $request->input("nilai_detail")[$k];
				                        $dp->jns_tarif = $request->input("jenis_tarif_detail")[$k];
				                        $dp->kd_tarif = $request->input("kd_tarif_detail")[$k];
				                        $dp->kd_sat_tarif = $request->input("kd_sat_tarif_detail")[$k];
				                        $dp->jml_sat = $request->input("jml_sat_detail")[$k];
				                        $dp->tarif = $request->input("tarif_detail")[$k];
				                        $dp->save();

		                    		}else{
		                    			$dp = new DetailPungutan();
				                        $dp->detail_barang_id = $detail_brgid;
				                        $dp->kd_pungutan= $val;
				                        $dp->nilai = $request->input("nilai_detail")[$k];
				                        $dp->jns_tarif = $request->input("jenis_tarif_detail")[$k];
				                        $dp->kd_tarif = $request->input("kd_tarif_detail")[$k];
				                        $dp->kd_sat_tarif = $request->input("kd_sat_tarif_detail")[$k];
				                        $dp->jml_sat = $request->input("jml_sat_detail")[$k];
				                        $dp->tarif = $request->input("tarif_detail")[$k];
				                        $dp->save();
			                    		
		                    		}
		                    	}
		                        
		                    }
		                    
		                }
                    }
                }

            }, 2);


            return response()->json(['status'=>true]);

        }

        return response()->json(['status'=>false]);
    }

    public function sendPiBk(Request $request){
    	if($request->ajax()){
    		$id = $request->input("cnpibk_id");

	    	$wsdlAddress = app_path("WSBarangKirimanNew.wsdl");

			$setting = array(       
			        'stream_context'=> stream_context_create(array('ssl'=> array(
			            'verify_peer'=>false,
			            'verify_peer_name'=>false, 
			            'allow_self_signed' => true 
			                 )
			            )
			        )
			);

			$cnpibk = Cnpibk::find($id);
			$header_pungutan = HeaderPungutan::where("cnpibk_id",$id)->get();
			$detail_barang = DetailBarang::where("cnpibk_id",$id)->get();

			if(!empty($cnpibk)){
				$noidpenerima = str_replace(".","", $cnpibk->customer->npwp);
				$noidpenerima = str_replace("-","", $noidpenerima);

				$cnpibk_xml = new \SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?><CN_PIBK></CN_PIBK>');
				$header = $cnpibk_xml->addChild("HEADER");
				$header->addChild("JNS_AJU",$cnpibk->aju->kode_aju);
				$header->addChild("KD_JNS_PIBK",$cnpibk->pibk->kode_pibk);
				$header->addChild("NO_BARANG",$this->clean($cnpibk->no_barang));
				$header->addChild("KD_KANTOR",$cnpibk->kd_kantor);
				$header->addChild("KD_JNS_ANGKUT",$cnpibk->jenis_angkut->kode_angkutan);
				$header->addChild("NM_PENGANGKUT",$cnpibk->nm_pengangkut);
				$header->addChild("NO_FLIGHT",$cnpibk->no_flight);
				$header->addChild("KD_PEL_MUAT",$cnpibk->kd_pel_muat);
				$header->addChild("KD_PEL_BONGKAR",$cnpibk->kd_pel_bongkar);
				$header->addChild("KD_GUDANG",$cnpibk->kd_gudang);
				$header->addChild("NO_INVOICE",$cnpibk->no_invoice);
				$header->addChild("TGL_INVOICE",(!empty($cnpibk->no_invoice) ? date('Y/m/d',strtotime($cnpibk->tgl_invoice)) : '0000/00/00'));
				$header->addChild("KD_NEGARA_ASAL",$cnpibk->kd_negara_asal);
				$header->addChild("JML_BRG",$cnpibk->jml_barang);
				$header->addChild("NO_BC11",$cnpibk->no_bc11);
				$header->addChild("TGL_BC11",(!empty($cnpibk->tgl_bc11) ? date('Y/m/d',strtotime($cnpibk->tgl_bc11)) : '0000/00/00'));
				$header->addChild("NO_POS_BC11",(!empty($cnpibk->no_pos_bc11) ? $cnpibk->no_pos_bc11 : ''));
				$header->addChild("NO_SUBPOS_BC11",(!empty($cnpibk->no_subpos_bc11) ? $cnpibk->no_subpos_bc11 : ''));
				$header->addChild("NO_SUBSUBPOS_BC11",(!empty($cnpibk->no_subsubpos_bc11) ? $cnpibk->no_subsubpos_bc11 : ''));
				$header->addChild("NO_MASTER_BLAWB",(!empty($cnpibk->no_master_blawb) ? $this->clean($cnpibk->no_master_blawb) : ''));
				$header->addChild("TGL_MASTER_BLAWB",(!empty($cnpibk->tgl_master_blawb) ? date('Y/m/d',strtotime($cnpibk->tgl_master_blawb)) : '0000/00/00'));
				$header->addChild("NO_HOUSE_BLAWB",(!empty($cnpibk->no_house_blawb) ? $this->clean($cnpibk->no_house_blawb) : ''));
				$header->addChild("TGL_HOUSE_BLAWB",(!empty($cnpibk->tgl_house_blawb) ? date('Y/m/d',strtotime($cnpibk->tgl_house_blawb)) : '0000/00/00'));
				$header->addChild("KD_NEG_PENGIRIM",(!empty($cnpibk->kd_negara_pengirim) ? $cnpibk->kd_negara_pengirim : ''));
				$header->addChild("NM_PENGIRIM",(!empty($cnpibk->nm_pengirim) ? $cnpibk->nm_pengirim : ''));
				$header->addChild("AL_PENGIRIM",(!empty($cnpibk->al_pengirim) ? $cnpibk->al_pengirim : ''));
				$header->addChild("JNS_ID_PENERIMA",$cnpibk->id_penerima->jns_id);
				$header->addChild("NO_ID_PENERIMA",$this->clean($cnpibk->customer->npwp));
				$header->addChild("NM_PENERIMA",$cnpibk->customer->name);
				$header->addChild("AL_PENERIMA",$cnpibk->customer->address);
				$header->addChild("TELP_PENERIMA",(!empty($cnpibk->customer->phone_1) ? $cnpibk->customer->phone_1 : ''));
				$header->addChild("JNS_ID_PEMBERITAHU",$cnpibk->id_pemberitahu->jns_id);
				$header->addChild("NO_ID_PEMBERITAHU",$cnpibk->no_id_pemberitahu);
				// $header->addChild("NM_PEMBERITAHU",$cnpibk->nm_pemberitahu);
				$header->addChild("AL_PEMBERITAHU",$cnpibk->al_pemberitahu);
				$header->addChild("NO_IZIN_PEMBERITAHU",$cnpibk->no_izin_pemberitahu);
				$header->addChild("TGL_IZIN_PEMBERITAHU",(!empty($cnpibk->tgl_izin_pemberitahu) ? date('Y/m/d',strtotime($cnpibk->tgl_izin_pemberitahu)) : '0000/00/00'));
				$header->addChild("KD_VAL",$cnpibk->kd_valas);
				$header->addChild("NDPBM",(!empty($cnpibk->ndpbm) ? $cnpibk->ndpbm : '0.00'));
				$header->addChild("FOB",(!empty($cnpibk->fob) ? $cnpibk->fob : '0.00'));
				$header->addChild("ASURANSI",(!empty($cnpibk->asuransi) ? $cnpibk->asuransi : '0.00'));
				$header->addChild("FREIGHT",(!empty($cnpibk->freight) ? $cnpibk->freight : '0.00'));
				$header->addChild("CIF",(!empty($cnpibk->cif) ? $cnpibk->cif : '0.00'));
				$header->addChild("NETTO",(!empty($cnpibk->netto) ? $cnpibk->netto : '0.00'));
				$header->addChild("BRUTO",(!empty($cnpibk->bruto) ? $cnpibk->bruto : '0.00'));
				$header->addChild("TOT_DIBAYAR",(!empty($cnpibk->tot_dibayar) ? $cnpibk->tot_dibayar : '0.00'));
				$header->addChild("NPWP_BILLING",(!empty($cnpibk->npwp_billing) ? $this->clean($cnpibk->npwp_billing) : '0.00'));
				$header->addChild("NAMA_BILLING",(!empty($cnpibk->nama_billing) ? $cnpibk->nama_billing : 'NA'));

				if(count($header_pungutan) > 0){
					$header_pungutan_xml = $header->addChild("HEADER_PUNGUTAN");
					foreach($header_pungutan as $key => $item){
						$pungutan_total= $header_pungutan_xml->addChild("PUNGUTAN_TOTAL");
						$pungutan_total->addChild("KD_PUNGUTAN",$item->pungutan->kode_pungutan);
						$pungutan_total->addChild("NILAI",(!empty($item->nilai) ? $item->nilai : '0.00'));
					}
				}

				if(count($detail_barang) > 0){
					$detil = $header->addChild("DETIL");
					foreach($detail_barang as $item){
						$detail_pungutan = DetailPungutan::where("detail_barang_id",$item->id)->get();

						$barang = $detil->addChild("BARANG");
						$barang->addChild("SERI_BRG",(!empty($item->seri_brg) ? $item->seri_brg : 'NA'));
						$barang->addChild("HS_CODE",(!empty($item->hs_code) ? $item->hs_code : 'NA'));
						$barang->addChild("UR_BRG",(!empty($item->ur_brg) ? $item->ur_brg : 'NA'));
						$barang->addChild("KD_NEG_ASAL",(!empty($item->kd_neg_asal) ? $item->kd_neg_asal : 'NA'));
						$barang->addChild("JML_KMS",(!empty($item->jml_kms) ? $item->jml_kms : '0.00'));
						$barang->addChild("JNS_KMS",(!empty($item->jml_kms) ? $item->jml_kms : '0.00'));
						$barang->addChild("CIF",(!empty($item->cif) ? $item->cif : '0.00'));
						$barang->addChild("KD_SAT_HRG",(!empty($item->kd_sat_hrg) ? $item->kd_sat_hrg : ''));
						$barang->addChild("JML_SAT_HRG",(!empty($item->jml_sat_hrg) ? $item->jml_sat_hrg : '0.00'));
						$barang->addChild("FL_BEBAS",(!empty($item->fl_bebas) ? $item->fl_bebas : ''));
						$barang->addChild("NO_SKEP",(!empty($item->no_skep) ? $item->no_skep : ''));
						$barang->addChild("TGL_SKEP",(empty($item->tgl_skep) ? '0000/00/00' : date('Y/m/d',strtotime($item->tgl_skep)) ));

						if(count($detail_pungutan) > 0){
							foreach($detail_pungutan as $val){
								$detil_pungutan_xml= $barang->addChild("DETIL_PUNGUTAN");
								$detil_pungutan_xml->addChild("KD_PUNGUTAN",$val->pungutan->kode_pungutan);
								$detil_pungutan_xml->addChild("NILAI",(!empty($val->nilai) ? $val->nilai : '0.00'));
								$detil_pungutan_xml->addChild("JNS_TARIF","1");
								$detil_pungutan_xml->addChild("KD_TARIF",$val->jenis_tarif->kode_tarif);
								$detil_pungutan_xml->addChild("KD_SAT_TARIF",(!empty($val->kd_sat_tarif) ? $val->kd_sat_tarif : ''));
								$detil_pungutan_xml->addChild("JML_SAT",(!empty($val->jml_sat) ? $val->jml_sat : '0.00'));
								$detil_pungutan_xml->addChild("TARIF",(!empty($val->tarif) ? $val->tarif : '0.00'));
							}
						}
					}
				}

			}

			$webServiceClient = new \SoapClient($wsdlAddress, $setting); 

			try{
				$requestData = array(
					"data"=>$cnpibk_xml->asXml(),
					"id" => "trijoko1945"."^$"."sbejkt@1946",
					"sign" => "TURNek5EWTJNekF4TFRFMw0K"  
				);
				$response = $webServiceClient->__soapCall("kirimData", array("kirimData" => $requestData));
						$respon_string= simplexml_load_string($response->return);
                        $status_code = $respon_string->HEADER->KD_RESPON;

                        if($status_code == "ERR"){
                            return response()->json(['status'=>false,'response'=>$respon_string->HEADER->KET_RESPON]);
                        }

						DB::transaction(function () use($respon_string,$id) {
							//set latest status code
							$status_code = $respon_string->HEADER->KD_RESPON;
							$status_code_model = StatusCode::where("kode",$status_code)->first();
							$cnpibk_update = Cnpibk::find($id);
							$cnpibk_update->status_code_id = $status_code_model->id;
							$cnpibk_update->save();

							$status_history_model = StatusHistory::where(['status_code_id'=>$status_code_model->id,'cnpibk_id'=>$id])->count();
							if($status_history_model == 0){
								$new_status_history = new StatusHistory();
								$new_status_history->status_code_id = $status_code_model->id;
								$new_status_history->cnpibk_id = $id;
								$new_status_history->ket_respon = $respon_string->HEADER->KET_RESPON;
								$new_status_history->wk_rekam = date("Y-m-d H:i:s",strtotime($respon_string->HEADER->WK_REKAM));
								$new_status_history->save();
							}else{
								$update_status_history = StatusHistory::where(['cnpibk_id'=>$id,'status_code_id'=>$status_code_model->id])->first();
								$update_status_history->status_code_id = $status_code_model->id;
								$update_status_history->ket_respon = $respon_string->HEADER->KET_RESPON;
								$update_status_history->wk_rekam = date("Y-m-d H:i:s",strtotime($respon_string->HEADER->WK_REKAM));
								$update_status_history->save();
							}
						},2);

						return response()->json(['status'=>true]);
				}
				catch (SoapFault $exception) {
						return response()->json(['status'=>false,'response'=>$exception]);    
			} 
    	}
    	
    }

    public function deleteHeaderPungutan(Request $request){
    	$id = $request->input("id");

    	DB::transaction(function () use($id) {
    		$header_pungutan = HeaderPungutan::find($id);
    		$delete_detail_pungutan = DB::delete("delete detail_pungutan from detail_pungutan inner join detail_barang on detail_barang.id = detail_pungutan.detail_barang_id where detail_barang.cnpibk_id= ? and detail_pungutan.kd_pungutan = ?",[$header_pungutan->cnpibk_id,$header_pungutan->kd_pungutan]);

    	    $delete = DB::delete('delete header_pungutan from header_pungutan where id = ?', [$id]);
    	});

    	return response()->json(['status'=>true]);
    }

    public function deleteDetailBarang(Request $request){
    	$id = $request->input("id");

    	DB::transaction(function () use ($id) {
    	    $delete_detail_pungutan = DB::delete("delete detail_pungutan from detail_pungutan where detail_barang_id = ? ",[$id]);
    	    $delete_detail_barang = DB::delete("delete detail_barang from detail_barang where id = ? ",[$id]);
    	});
    	return response()->json(['status'=>true]);
    }

    public function showById($id){
    	$cnpibk = Cnpibk::find($id);
    	$detail_pungutan = DB::select("select *, detail_pungutan.id as idnya from detail_pungutan inner join detail_barang on detail_barang.id = detail_pungutan.detail_barang_id inner join jenis_pungutan on jenis_pungutan.id = detail_pungutan.kd_pungutan inner join jenis_tarif on jenis_tarif.id = detail_pungutan.kd_tarif where detail_barang.cnpibk_id = ?",[$id]);
    	$data['status'] = true;
    	$data['html'] = view('pages.cnpibk.show')->with(['cnpibk'=>$cnpibk,'detail_pungutan'=>$detail_pungutan])->render();

    	return response()->json($data);
    }

    public function editBc11($id){
    	 $data['title'] = "Update BC 1.1 PIBK";
    	 $data['cnpibk'] = Cnpibk::find($id);
    	 $data['id'] = $id;

    	 return view("pages.cnpibk.updatebc",$data);
    }

    public function updateBc11(Request $request,$id){
    	if($request->ajax()){
    		$rules = [
    			"no_barang" => "required",
    			"tgl_house_blawb" => "required",
    			"kd_gudang" =>"required",
    			"no_bc11" => "required",
    			"tgl_bc11" => "required",
    			"no_pos_bc11" => "required",
    			"no_subpos_bc11" => "required",
    			"no_subsubpos_bc11" => "required"
    		];

    		$messages = [
    			"kd_gudang.required" =>"Kode Gudang harus diisi",
    			"no_barang.required" => "No Barang harus diisi",
    			"tgl_house_blawb.required" => "Tgl House Blawb harus diisi",
    			"no_bc11.required" => "No BC 1.1 harus diisi",
    			"tgl_bc11.required" => "Tgl BC 1.1 harus diisi",
    			"no_pos_bc11.required" => "No Pos BC 1.1 harus diisi",
    			"no_subpos_bc11.required" => "No Sub Pos BC 1.1 harus diisi",
    			"no_subsubpos_bc11.required" => "No Sub Sub Pos BC 1.1 harus diisi"
    		];

    		$validator = Validator::make($request->except("_token"),$rules,$messages);
    		if($validator->fails()){
    			return response()->json(['status'=>false,'error'=>$validator->errors()]);
    		}

    		$wsdlAddress = app_path("WSBarangKirimanNew.wsdl");

			$setting = array(       
			        'stream_context'=> stream_context_create(array('ssl'=> array(
			            'verify_peer'=>false,
			            'verify_peer_name'=>false, 
			            'allow_self_signed' => true 
			                 )
			            )
			        )
			);

			$update_bc11_xml = new \SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?><PIBK_UPDATE></PIBK_UPDATE>');
			$header = $update_bc11_xml->addChild("HEADER");
			$header->addChild("NO_BARANG",$this->clean($request->input('no_barang')));
			$header->addChild("TGL_HOUSE_BLAWB",date('Y/m/d',strtotime($request->input('tgl_house_blawb'))));
			$header->addChild("NO_BC11",$request->input('no_bc11'));
			$header->addChild("TGL_BC11",date('Y/m/d',strtotime($request->input('tgl_bc11'))));
			$header->addChild("NO_POS_BC11",$request->input('no_pos_bc11'));
			$header->addChild("NO_SUBPOS_BC11",$request->input('no_subpos_bc11'));
			$header->addChild("NO_SUBSUBPOS_BC11",$request->input('no_subsubpos_bc11'));
			$header->addChild("KD_GUDANG",$request->input('kd_gudang'));

			$webServiceClient = new \SoapClient($wsdlAddress, $setting); 

			try{
				$requestData = array(
					"data"=>$update_bc11_xml->asXml(),
					"id" => "trijoko1945"."^$"."sbejkt@1946",
					"sign" => "TURNek5EWTJNekF4TFRFMw0K"  
				);

				$response = $webServiceClient->__soapCall("updateBc11", array("updateBc11" => $requestData));
				$respon_string= simplexml_load_string($response->return);

				DB::transaction(function () use($respon_string,$id) {
					//set latest status code
					$status_code = $respon_string->KD_RESPON;
					$status_code_model = StatusCode::where("kode",$status_code)->first();
					$cnpibk_update = Cnpibk::find($id);
					$cnpibk_update->status_code_id = $status_code_model->id;
					$cnpibk_update->save();

					$status_history_model = StatusHistory::where(['status_code_id'=>$status_code_model->id,'cnpibk_id'=>$id])->count();
					if($status_history_model == 0){
						$new_status_history = new StatusHistory();
						$new_status_history->status_code_id = $status_code_model->id;
						$new_status_history->cnpibk_id = $id;
						$new_status_history->ket_respon = $respon_string->KET_RESPON;
						$new_status_history->wk_rekam = date("Y-m-d H:i:s",strtotime($respon_string->WK_RESPON));
						$new_status_history->save();
					}else{
						$update_status_history = StatusHistory::where(['cnpibk_id'=>$id,'status_code_id'=>$status_code_model->id])->first();
						$update_status_history->status_code_id = $status_code_model->id;
						$update_status_history->ket_respon = $respon_string->KET_RESPON;
						$update_status_history->wk_rekam = date("Y-m-d H:i:s",strtotime($respon_string->WK_RESPON));
						$update_status_history->save();
					}
				},2);

				return response()->json(['status'=>true,'data'=>$respon_string]);
			}
			catch (SoapFault $exception) {
				return response()->json(['status'=>false,'response'=>$exception]);    
			} 

    	}
    	
    }

    public function tracking($id){
    	$data['title'] = "Tracking CN PIBK";
    	$data['cnpibk'] = Cnpibk::find($id);
    	$data['tracking'] = StatusHistory::where("cnpibk_id",$id)->get();

    	return view("pages.cnpibk.tracking",$data);
    }

    public function cekStatus(Request $request){
    	$id = $request->input("id");
    	$wsdlAddress = app_path("WSBarangKirimanNew.wsdl");
		$setting = array(       
		        'stream_context'=> stream_context_create(array('ssl'=> array(
		            'verify_peer'=>false,
		            'verify_peer_name'=>false, 
		            'allow_self_signed' => true 
		                 )
		            )
		        )
		);

		$cek_status = new \SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?><CEK_STATUS></CEK_STATUS>');
		$header = $cek_status->addChild("HEADER");
		$header->addChild("NO_BARANG",$request->input("no_barang"));
		$header->addChild("TGL_HOUSE_BLAWB",date('Y/m/d',strtotime($request->input('tgl_house_blawb'))));
		$header->addChild("NPWP",Config::get("sayapbiru.no_id_pemberitahu"));

		$webServiceClient = new \SoapClient($wsdlAddress, $setting); 

		try{
			$requestData = array(
				"data"=>$cek_status->asXml(),
				"id" => "trijoko1945"."^$"."sbejkt@1946",
				"sign" => "TURNek5EWTJNekF4TFRFMw0K"  
			);

			$response = $webServiceClient->__soapCall("getResponByAwb", array("getResponByAwb" => $requestData));
			$respon_string= simplexml_load_string($response->return);
			

			DB::transaction(function () use($respon_string,$id) {
				//set latest status code
				$status_code = $respon_string->HEADER->KD_RESPON;
				$status_code_model = StatusCode::where("kode",$status_code)->first();
				$cnpibk_update = Cnpibk::find($id);
				$cnpibk_update->status_code_id = $status_code_model->id;
				$cnpibk_update->save();

				$status_history_model = StatusHistory::where(['status_code_id'=>$status_code_model->id,'cnpibk_id'=>$id])->count();
				if($status_history_model == 0){
					$new_status_history = new StatusHistory();
					$new_status_history->status_code_id = $status_code_model->id;
					$new_status_history->cnpibk_id = $id;
					$new_status_history->ket_respon = $respon_string->HEADER->KET_RESPON;
					$new_status_history->wk_rekam = date("Y-m-d H:i:s",strtotime($respon_string->HEADER->WK_REKAM));
					$new_status_history->save();
				}else{
					$update_status_history = StatusHistory::where(['cnpibk_id'=>$id,'status_code_id'=>$status_code_model->id])->first();
					$update_status_history->status_code_id = $status_code_model->id;
					$update_status_history->ket_respon = $respon_string->HEADER->KET_RESPON;
					$update_status_history->wk_rekam = date("Y-m-d H:i:s",strtotime($respon_string->HEADER->WK_REKAM));
					$update_status_history->save();
				}
			},2);

			return response()->json(['status'=>true,'data'=>$respon_string]);
		}
		catch (SoapFault $exception) {
			return response()->json(['status'=>false,'response'=>$exception]);    
		} 
    }

    public function getAllResponse(){
    	$wsdlAddress = app_path("WSBarangKirimanNew.wsdl");
		$setting = array(       
		        'stream_context'=> stream_context_create(array('ssl'=> array(
		            'verify_peer'=>false,
		            'verify_peer_name'=>false, 
		            'allow_self_signed' => true 
		                 )
		            )
		        )
		);

		$webServiceClient = new \SoapClient($wsdlAddress, $setting); 

		try{
			$requestData = array(
				"npwp"=>Config::get("sayapbiru.no_id_pemberitahu"),
				"id" => "trijoko1945"."^$"."sbejkt@1946",
				"sign" => "TURNek5EWTJNekF4TFRFMw0K"  
			);

			$response = $webServiceClient->__soapCall("requestRespon", array("requestRespon" => $requestData));
			$respon_string= simplexml_load_string($response->return);
			$xmlObject ="<RESPONSE>".str_replace("</RESPONSE>","", str_replace("<RESPONSE>","",$respon_string))."</RESPONSE>";
			$arr = simplexml_load_string($xmlObject);

			if(!empty($arr)){
				DB::transaction(function () use($arr,$id) {
					//set latest status code
					foreach($arr->HEADER as $object){
						$status_code = $object->KD_RESPON;
						$status_code_model = StatusCode::where("kode",$status_code)->first();
						$cnpibk_update = Cnpibk::find($id);
						$cnpibk_update->status_code_id = $status_code_model->id;
						$cnpibk_update->save();

						$status_history_model = StatusHistory::where(['status_code_id'=>$status_code_model->id,'cnpibk_id'=>$id])->count();
						if($status_history_model == 0){
							$new_status_history = new StatusHistory();
							$new_status_history->status_code_id = $status_code_model->id;
							$new_status_history->cnpibk_id = $id;
							$new_status_history->ket_respon = $object->KET_RESPON;
							$new_status_history->wk_rekam = date("Y-m-d H:i:s",strtotime($object->WK_REKAM));
							$new_status_history->save();
						}else{
							$update_status_history = StatusHistory::where(['cnpibk_id'=>$id,'status_code_id'=>$status_code_model->id])->first();
							$update_status_history->status_code_id = $status_code_model->id;
							$update_status_history->ket_respon = $object->KET_RESPON;
							$update_status_history->wk_rekam = date("Y-m-d H:i:s",strtotime($object->WK_REKAM));
							$update_status_history->save();
						}
					}
					
				},2);
			}

			return response()->json(['status'=>true,'data'=>$arr]);
		}
		catch (SoapFault $exception) {
			return response()->json(['status'=>false,'response'=>$exception]);    
		} 
    }

    private function clean($str){
    	$str = str_replace("-","",$str);
    	$str = str_replace(".","",$str);

    	return $str;
    }
}
