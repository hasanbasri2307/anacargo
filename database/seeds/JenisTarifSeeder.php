<?php

use Illuminate\Database\Seeder;
use App\JenisTarif;

class JenisTarifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $tarif = [
        	['1','PROSENTASE (ADVALORUM)'],
        	['2','SPESIFIK']
        ];

        foreach($tarif as $item){
        	$jt = new JenisTarif();
        	$jt->kode_tarif = $item[0];
        	$jt->nama_tarif = $item[1];
        	$jt->save();
        }
    }
}
