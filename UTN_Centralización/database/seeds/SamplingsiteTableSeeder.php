<?php

use Illuminate\Database\Seeder;

class SamplingsiteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Samplingsite::class)->create([
        'name' 	=> 'Tanque Heliodoro A',
        'agent_id' => '2'
        ]);
        factory(App\Samplingsite::class)->create([
        'name' 	=> 'Tanque La Catarata',
        'agent_id' => '3'
        ]); 
    }
}
