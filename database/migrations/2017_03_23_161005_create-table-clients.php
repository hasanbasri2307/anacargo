<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableClients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("client_code",30)->nullable();
            $table->string("name",100);
            $table->text("address")->nullable();
            $table->string("phone_1",15)->nullable();
            $table->string("phone_2",15)->nullable();
            $table->string("fax",15)->nullable();
            $table->string("email",50)->nullable();
            $table->string("npwp",40);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
