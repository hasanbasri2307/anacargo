<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDetailbarang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_barang', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger("cnpibk_id");
            $table->string("seri_brg",6);
            $table->string("hs_code",12);
            $table->string("ur_brg",140);
            $table->string("kd_neg_asal",2);
            $table->string("jml_kms",6);
            $table->string("jns_kms",2);
            $table->double("cif",18,2);
            $table->string("kd_sat_hrg",3);
            $table->double("jml_sat_hrg",8,2);
            $table->string("fl_bebas",1);
            $table->string("no_skep",30);
            $table->date("tgl_skep");

            $table->timestamps();
        });

        Schema::table('detail_barang', function (Blueprint $table) {
            $table->index("cnpibk_id");

            $table->foreign("cnpibk_id")->references("id")->on("cnpibk");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_barang');
    }
}
