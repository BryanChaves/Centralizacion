<?php

use Illuminate\Database\Seeder;

class AnalysisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Analysis::class)->create([
        'agent_id' => '2',
        'laboratory_name' => 'UNIVERSIDAD NACIONAL',
        'date'=>'2013/2/18',
        'report_number'=>'AG-300-2013',
        'path'=>Null
        ]);
        factory(App\Analysis::class)->create([
        'agent_id' => '2',
        'laboratory_name' => 'UNIVERSIDAD NACIONAL',
        'date'=>'2014/2/18',
        'report_number'=>'AG-881-2014',
        'path'=>Null
        ]);
        factory(App\Analysis::class)->create([
        'agent_id' => '2',
        'laboratory_name' => 'UNIVERSIDAD NACIONAL',
        'date'=>'2015/2/18',
        'report_number'=>'AG-1500-2015',
        'path'=>Null
        ]);

        factory(App\Analysis::class)->create([
        'agent_id' => '3',
        'laboratory_name' => 'LABORATORIO NACIONAL DE AGUAS',
        'date'=>'2013/5/30',
        'report_number'=>'AYA-ID-3941-2013',
        'path'=>Null
        ]);
        factory(App\Analysis::class)->create([
        'agent_id' => '3',
        'laboratory_name' => 'LABORATORIO NACIONAL DE AGUAS',
        'date'=>'2014/5/30',
        'report_number'=>'AYA-ID-5001-2014',
        'path'=>Null
        ]);
        factory(App\Analysis::class)->create([
        'agent_id' => '3',
        'laboratory_name' => 'LABORATORIO NACIONAL DE AGUAS',
        'date'=>'2015/5/30',
        'report_number'=>'AYA-ID-6200-2015',
        'path'=>Null
        ]);
    }
}
