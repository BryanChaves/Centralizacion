<?php

use Illuminate\Database\Seeder;

class ViabilityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Viability::class)->create([
        'project_name' => 'Concesión de aprovechamiento de agua',
        'viability_number'=>'1260-2013-SETENA',
        'setena_administrative_record' => 'D1-10364-2013-SETENA',
        'cadrastal_plane_number' => '2-92311952',
        'property_number' => '76695',
        'province' => '2',
        'canton' => '30',
        'district' => '193',
        'coordinate' => 'Latitud 254.10, Longitud 490.50',
        'path' => ''
        ]);
        factory(App\Viability::class)->create([
        'project_name' => 'Concesión de aprovechamiento de agua',
        'viability_number'=>'11300-2008-SETENA',
        'setena_administrative_record' => 'D1-11256-2011-SETENA',
        'cadrastal_plane_number' => '2-1385-78',
        'property_number' => '2-125-499-000',
        'province' => '2',
        'canton' => '30',
        'district' => '193',
        'coordinate' => 'Latitud 494.017, Longitud 250.914',
        'path' => ''
        ]);
        
    }
}
