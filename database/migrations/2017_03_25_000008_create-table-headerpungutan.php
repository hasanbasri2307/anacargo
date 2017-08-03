<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableHeaderpungutan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('header_pungutan', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger("cnpibk_id");
            $table->unsignedInteger('kd_pungutan');
            $table->double("nilai",22,2);
            $table->timestamps();
        });

         Schema::table('header_pungutan', function (Blueprint $table) {
            $table->index("kd_pungutan");
            $table->index("cnpibk_id");

            $table->foreign("kd_pungutan")->references("id")->on("jenis_pungutan");
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
        Schema::dropIfExists('header_pungutan');
    }
}
