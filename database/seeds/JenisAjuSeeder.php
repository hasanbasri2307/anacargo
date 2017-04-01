<?php

use Illuminate\Database\Seeder;
use App\JenisAju;

class JenisAjuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $aju = [
        	['1','CN','Consignment Note'],
        	['2','PIBK','Pemberitahuan Impor Barang Khusus'],
        	['3','BC 1.4','Pemberitahuan Pemindahan Penimbunan Barang Kiriman'],
        	['4','PIB','Pemberitahuan Impor Barang']
        ];

        foreach($aju as $item){
        	$aj = new JenisAju();
        	$aj->kode_aju = $item[0];
        	$aj->nama_aju = $item[1];
        	$aj->keterangan = $item[2];
        	$aj->save();
        }
    }
}
