<?php

use Illuminate\Database\Seeder;

class Concession_WatersourceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Concession_Watersource::class)->create([
        'concession_id' => '1',
        'watersource_id' => '1'
        ]); 
        factory(App\Concession_Watersource::class)->create([
        'concession_id' => '2',
        'watersource_id' => '2'
        ]);
    }
}
