<?php

use Illuminate\Database\Seeder;

class FiletypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Filetype::class)->create([
        'name' => 'A' 
        ]);
        factory(App\Filetype::class)->create([
        'name' => 'R' 
        ]);
    }
}
