<?php

use Illuminate\Database\Seeder;

class FlowmeasurementTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Flow_Measurement::class)->create([
        'capacity' => '80',
        'method' => 'Volumétrico',
        'observations' => 'Aforo normal',
        'date' => '2015/9/8',
        'weather' => 'Lluvioso',
        'sampling_site_id' => Null,
        'watersource_id' => '1'
        ]);
        factory(App\Flow_Measurement::class)->create([
        'capacity' => '85',
        'method' => 'Volumétrico',
        'observations' => 'Aforo normal',
        'date' => '2015/10/8',
        'weather' => 'Soleado',
        'sampling_site_id' => Null,
        'watersource_id' => '1'
        ]);
        factory(App\Flow_Measurement::class)->create([
        'capacity' => '86',
        'method' => 'Volumétrico',
        'observations' => 'Aforo normal',
        'date' => '2015/11/9',
        'weather' => 'Nublado',
        'sampling_site_id' => Null ,
        'watersource_id' => '1'
        ]);
        factory(App\Flow_Measurement::class)->create([
        'capacity' => '5',
        'method' => 'Volumétrico',
        'observations' => 'Aforo normal',
        'date' => '2015/9/1',
        'weather' => 'Soleado',
        'sampling_site_id' => Null,
        'watersource_id' => '2'
        ]);
        factory(App\Flow_Measurement::class)->create([
        'capacity' => '5,55',
        'method' => 'Volumétrico',
        'observations' => 'Aforo normal',
        'date' => '2015/10/1',
        'weather' => 'Nublado',
        'sampling_site_id' => Null,
        'watersource_id' => '2'
        ]);
        factory(App\Flow_Measurement::class)->create([
        'capacity' => '5,6',
        'method' => 'Volumétrico',
        'observations' => 'Aforo normal',
        'date' => '2015/11/1',
        'weather' => 'Lluvioso',
        'sampling_site_id' => Null,
        'watersource_id' => '2'
        ]);
    }
}
