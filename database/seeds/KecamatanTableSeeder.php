<?php

use App\Models\Kecamatan;
use Illuminate\Database\Seeder;

/**
 * Class KecamatanTableSeeder.
 */
class KecamatanTableSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seed.
     */
    public function run()
    {
        $this->disableForeignKeys();

        $data = [
            ['Ngrayun', '-8.080940', '111.448780',  14,  2,  0,  0,  0,  0,  0 ],
            ['Slahung', '-8.075220', '111.417530',  63,  0,  1,  0,  0,  0,  0 ],
            ['Bungkal', '-8.026250', '111.454740',  35,  1,  0,  0,  0,  0,  0 ],
            ['Sambit', '-7.975360', '111.520490',  29,  2,  0,  0,  0,  0,  0 ],
            ['Sawoo', '-8.003630', '111.576591',  27,  0,  0,  0,  0,  0,  0 ],
            ['Sooko', '-7.91000', '111.64000',  22,  0,  0,  0,  0,  0,  0 ],
            ['Pudak', '-7.8609016', '111.7003748',  8,  0,  0,  0,  0,  0,  0 ],
            ['Pulung', '-7.876488', '111.611801',  51,  4,  0,  0,  0,  0,  0 ],
            ['Mlarak', '-7.9176761', '111.4881623',  5,  5,  1,  0,  0,  0,  0 ],
            ['Siman', '-7.891918', '111.4698224',  45,  5,  1,  0,  0,  0,  0 ],
            ['Jetis', '-7.938859', '111.4812472',  32,  4,  0,  0,  0,  0,  0 ],
            ['Balong', '-7.9475166', '111.3671248',  46,  4,  1,  0,  0,  0,  0 ],
            ['Kauman', '-7.8680776', '111.4556577',  88,  2,  0,  0,  0,  0,  0 ],
            ['Jambon', '-7,9189342', '111,3679689',  51,  3,  0,  0,  0,  0,  0 ],
            ['Badegan', '-7.8976131', '111.2889688',  17,  0,  1,  0,  0,  0,  0 ],
            ['Sampung', '-7.8275405', '111.3099699',  27,  1,  0,  0,  0,  0,  0 ],
            ['Sukorejo', '-7.8373522', '111.3476802',  75,  1,  1,  0,  0,  0,  0 ],
            ['Ponorogo', '-7.8680776', '111.4556577',  47,  11,  0,  0,  0,  0,  0 ],
            ['Babadan', '-7.8168035', '111.4456383',  73,  4,  0,  0,  0,  0,  0 ],
            ['Jenangan', '-7.8337236', '111.5147154',  87,  7,  0,  0,  0,  0,  0 ],
            ['Ngebel', '-7.8021935', '111.6541483',  22,  1,  0,  0,  0,  0,  0 ],
        ];

        foreach ($data as $d) {
            Kecamatan::create([
                'nama' => $d[0],
                'latitude' => $d[1],
                'longitude' => $d[2],
                'odr' => $d[3],
                'odp' => $d[4],
                'pdp' => $d[5],
                'probable' => $d[6],
                'positif' => $d[7],
                'meninggal' => $d[8],
                'sembuh' => $d[9],
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);
        }
        

        $this->enableForeignKeys();
    }
}
