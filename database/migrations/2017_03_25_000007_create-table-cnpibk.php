<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCnpibk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cnpibk', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('jns_aju');
            $table->unsignedInteger('kd_jns_pibk');
            $table->string("no_barang",13)->nullable();
            $table->string("kd_kantor",6)->nullable();
            $table->unsignedInteger('kd_jns_angkut');
            $table->string("nm_pengangkut",100)->nullable();
            $table->string("no_flight",10)->nullable();
            $table->string("kd_pel_muat",5)->nullable();
            $table->string("kd_pel_bongkar",5)->nullable();
            $table->string("kd_gudang",4)->nullable();
            $table->string("no_invoice",20)->nullable();
            $table->string("kd_negara_asal",2)->nullable();
            $table->integer("jml_barang")->nullable();
            $table->string("no_bc11",29)->nullable();
            $table->date("tgl_bc11")->nullable();
            $table->string("no_pos_bc11",4)->nullable();
            $table->string("no_subpos_bc11",4)->nullable();
            $table->string("no_subsubpos_bc11",4)->nullable();
            $table->string("no_master_blawb",30)->nullable();
            $table->date("tgl_master_blawb")->nullable();
            $table->string("no_house_blawb",30)->nullable();
            $table->date("tgl_house_blawb")->nullable();
            $table->string("kd_negara_pengirim",2)->nullable();
            $table->string("nm_pengirim",60)->nullable();
            $table->text("al_pengirim")->nullable();
            $table->unsignedInteger('jns_id_penerima');
            $table->unsignedBigInteger("customer_id");
            $table->unsignedInteger('jns_id_pemberitahu');
            $table->string("no_id_pemberitahu",30)->nullable();
            $table->string("nm_pemberitahu",200)->nullable();
            $table->string("al_pemberitahu",200)->nullable();
            $table->string("no_izin_pemberitahu",100)->nullable();
            $table->date("tgl_izin_pemberitahu")->nullable();
            $table->string('kd_valas',3)->nullable();
            $table->double("ndpbm",9,4)->nullable();
            $table->double("fob",18,2)->nullable();
            $table->double("asuransi",14,2)->nullable();
            $table->double("freight",16,2)->nullable();
            $table->double("cif",18,2)->nullable();
            $table->double("netto",18,4)->nullable();
            $table->double("bruto",18,4)->nullable();
            $table->double("tot_dibayar",15,2)->nullable();
            $table->string("npwp_billing",15)->nullable();
            $table->string("nama_billing",50)->nullable();
            $table->string("status",1)->nullable();
            $table->enum("tipe_dokumen",["cn","pibk"]);
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('cnpibk', function (Blueprint $table) {
            $table->index("jns_aju");
            $table->index("kd_jns_pibk");
            $table->index("no_barang");
            $table->index("kd_jns_angkut");
            $table->index("no_bc11");
            $table->index("tgl_bc11");
            $table->index("no_master_blawb");
            $table->index("tgl_house_blawb");
            $table->index("tgl_izin_pemberitahu");
            $table->index("no_izin_pemberitahu");
            $table->index("customer_id");

            $table->foreign('jns_aju')->references('id')->on('jenis_aju');
            $table->foreign('kd_jns_pibk')->references('id')->on('jenis_pibk');
            $table->foreign('kd_jns_angkut')->references('id')->on('jenis_pibk');
            $table->foreign('jns_id_penerima')->references('id')->on('jenis_id');
            $table->foreign('jns_id_pemberitahu')->references('id')->on('jenis_id');
            $table->foreign('customer_id')->references('id')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cnpibk');
    }
}
