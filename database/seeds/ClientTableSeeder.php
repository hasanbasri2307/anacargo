<?php

use Illuminate\Database\Seeder;
use App\Customer;

class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $clients = [
        	["125000555","PT Maju Terus","0700151255"],
        	["125000666","PT Cipta Terus","0800112875"]
        ];

        foreach($clients as $client){
        	$new_client = new Customer();
        	$new_client->client_code = $client[0];
        	$new_client->name = $client[1];
        	$new_client->npwp = $client[2];
        	$new_client->save();
        }
    }
}
