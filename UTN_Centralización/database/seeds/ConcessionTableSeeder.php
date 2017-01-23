<?php

use Illuminate\Database\Seeder;

class ConcessionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Concession::class)->create([
        'agent_id' => '2',
        'agent_number' => '3-014-042074',
        'resolution_id' => '1',
        'file_id' => '1',
        'fileType_id' => '1',
        'conferment_date' => '2010/6/21',
        'due_date' => '2030/6/21',
        'owner' => 'Arrendamientos San Pascual SA',
        'property_number' => '76685',
        'water_tapping_point'=>'Tanque Heliodoro A',
        'authorized_use'=>'Consumo Humano',
        'assigned_flow'=>'80.100',
        'capacity_flow'=>'80.90',
        'viability_id'=>'1',
        'path'=>''
        ]);
        factory(App\Concession::class)->create([
        'agent_id' => '3',
        'agent_number' => '3-002-574570',
        'resolution_id' => '2',
        'file_id' => '2',
        'fileType_id' => '2',
        'conferment_date' => '2011/9/9',
        'due_date' => '2021/9/9',
        'owner' => 'Enilda Herrera',
        'property_number' => '2-125-499-000',
        'water_tapping_point'=>'Cauce río peje',
        'authorized_use'=>'Consumo Humano',
        'assigned_flow'=>'5.44',
        'capacity_flow'=>'5.98',
        'viability_id'=>'2',
        'path'=>''
        ]);
    }
}
