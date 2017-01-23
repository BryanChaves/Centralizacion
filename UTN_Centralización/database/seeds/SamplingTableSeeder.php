<?php

use Illuminate\Database\Seeder;

class SamplingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Sampling::class)->create([
        'consecutive' => '1',
        'label' => 'AG-300-2013',
        'level'=>'1',
        'sampling_site_id'=>Null,
        'analysis_id'=>'1',
        'watersource_id'=>'1'
        ]); 
        factory(App\Sampling::class)->create([
        'consecutive' => '2',
        'label' => 'AG-300-2013',
        'level'=>'2',
        'sampling_site_id'=>Null,
        'analysis_id'=>'1',
        'watersource_id'=>'1'
        ]); 
        factory(App\Sampling::class)->create([
        'consecutive' => '1',
        'label' => 'AG-881-2014',
        'level'=>'1',
        'sampling_site_id'=>Null,
        'analysis_id'=>'2',
        'watersource_id'=>'1'
        ]);
        factory(App\Sampling::class)->create([
        'consecutive' => '2',
        'label' => 'AG-881-2014',
        'level'=>'2',
        'sampling_site_id'=>Null,
        'analysis_id'=>'2',
        'watersource_id'=>'1'
        ]);
        factory(App\Sampling::class)->create([
        'consecutive' => '1',
        'label' => 'AG-1500-2015',
        'level'=>'1',
        'sampling_site_id'=>Null,
        'analysis_id'=>'3',
        'watersource_id'=>'1'
        ]);
        factory(App\Sampling::class)->create([
        'consecutive' => '2',
        'label' => 'AG-1500-2015',
        'level'=>'2',
        'sampling_site_id'=>Null,
        'analysis_id'=>'3',
        'watersource_id'=>'1'
        ]);
        factory(App\Sampling::class)->create([
        'consecutive' => '1',
        'label' => 'AYA-ID-3941-2013',
        'level'=>'1',
        'sampling_site_id'=>Null,
        'analysis_id'=>'4',
        'watersource_id'=>'2'
        ]);
        factory(App\Sampling::class)->create([
        'consecutive' => '2',
        'label' => 'AYA-ID-3941-2013',
        'level'=>'2',
        'sampling_site_id'=>Null,
        'analysis_id'=>'4',
        'watersource_id'=>'2'
        ]);
        factory(App\Sampling::class)->create([
        'consecutive' => '1',
        'label' => 'AYA-ID-5001-2014',
        'level'=>'1',
        'sampling_site_id'=>Null,
        'analysis_id'=>'5',
        'watersource_id'=>'2'
        ]);
        factory(App\Sampling::class)->create([
        'consecutive' => '2',
        'label' => 'AYA-ID-5001-2014',
        'level'=>'2',
        'sampling_site_id'=>Null,
        'analysis_id'=>'5',
        'watersource_id'=>'2'
        ]);
        factory(App\Sampling::class)->create([
        'consecutive' => '1',
        'label' => 'AYA-ID-6200-2015',
        'level'=>'1',
        'sampling_site_id'=>Null,
        'analysis_id'=>'6',
        'watersource_id'=>'2'
        ]);
        factory(App\Sampling::class)->create([
        'consecutive' => '2',
        'label' => 'AYA-ID-6200-2015',
        'level'=>'2',
        'sampling_site_id'=>Null,
        'analysis_id'=>'6',
        'watersource_id'=>'2'
        ]);
    }
}
