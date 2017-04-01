<?php

use Illuminate\Database\Seeder;
use App\JenisPibk;

class JenisPibkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $pibk = [
        	['1','Barng Pindahan'],
        	['2','Barang Kiriman Melalui PJT'],
        	['3','Barang Impor Sementara Dibawa Penumpang'],
        	['4','Barang Impor Tertentu'],
        	['5','Barang Pribadi Penumpang'],
        	['9','Lainnya']
        ];

        foreach($pibk as $item){
        	$jp = new JenisPibk();
        	$jp->kode_pibk = $item[0];
        	$jp->nama_pibk = $item[1];
        	$jp->save();
        }

        
    }
}
