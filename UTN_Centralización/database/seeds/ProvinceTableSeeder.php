<?php

use Illuminate\Database\Seeder;

class ProvinceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Province::class)->create([
        'name' => 'San José'
        ]);
        factory(App\Province::class)->create([
        'name' => 'Alajuela'
        ]);
        factory(App\Province::class)->create([
        'name' => 'Cartago'
        ]);
        factory(App\Province::class)->create([
        'name' => 'Heredia'
        ]);
        factory(App\Province::class)->create([
        'name' => 'Guanacaste'
        ]);
        factory(App\Province::class)->create([
        'name' => 'Puntarenas'
        ]);
        factory(App\Province::class)->create([
        'name' => 'Limón'
        ]);

    }
}
