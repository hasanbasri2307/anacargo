<?php

use Illuminate\Database\Seeder;
use App\JenisPungutan;

class JenisPungutanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $pungutan = [
        	['1','BM','Bea Masuk Bayar'],
        	['2','PPH','Pajak Penghasilan Bayar'],
        	['3','PPN','Pajak Pertambahan Nilai Bayar'],
        	['4','PPNBM','Pajak Pertambahan Nilai Bea Masuk Bayar']
        ];

        foreach($pungutan as $item){
        	$jp = new JenisPungutan();
        	$jp->kode_pungutan = $item[0];
        	$jp->nama_pungutan = $item[1];
        	$jp->keterangan = $item[2];
        	$jp->save();
        }
    }
}
