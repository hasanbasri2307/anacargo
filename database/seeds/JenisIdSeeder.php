<?php

use Illuminate\Database\Seeder;
use App\JenisId;

class JenisIdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        
        $jenis_id = [
            ['0','NPWP 12 Digit'],
            ['1','NPWP 10 Digit'],
            ['2','Passport'],
            ['3','KTP'],
            ['4','Lainnya'],
            ['5','NPWP 15 Digit']
        ];

        foreach($jenis_id as $item){
            $ji = new JenisId();
            $ji->jns_id = $item[0];
            $ji->nama = $item[1];
            $ji->save();
        }

    }
}
