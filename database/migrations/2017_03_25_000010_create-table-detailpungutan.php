<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDetailpungutan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_pungutan', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger("cnpibk_id");
            $table->unsignedInteger('kd_pungutan');
            $table->double("nilai",22,2);
            $table->unsignedInteger("kd_tarif");
            $table->string("kd_sat_tarif",20);
            $table->integer("jml_sat");
            $table->double("tarif",18,2);
            $table->timestamps();
        });

        Schema::table('detail_pungutan', function (Blueprint $table) {
            $table->index("kd_pungutan");
            $table->index("cnpibk_id");
            $table->index("kd_tarif");

            $table->foreign("cnpibk_id")->references("id")->on("cnpibk");
            $table->foreign("kd_pungutan")->references("id")->on("jenis_pungutan");
            $table->foreign("kd_tarif")->references("id")->on("jenis_tarif");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_pungutan');
    }
}
