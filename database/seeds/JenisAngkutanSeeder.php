<?php

use Illuminate\Database\Seeder;
use App\JenisAngkutan;

class JenisAngkutanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $angkutan = [
            ['1','Laut'],
            ['2','Kereta Api'],
            ['3','Darat'],
            ['4','Udara'],
            ['5','Pos'],
            ['6','Multi Moda'],
            ['7','Instalasi'],
            ['8','Perairan'],
            ['9','Lainnya']
        ];

        foreach($angkutan as $item){
            $ja = new JenisAngkutan();
            $ja->kode_angkutan = $item[0];
            $ja->nama_angkutan = $item[1];
            $ja->save();
        }

    }
}
