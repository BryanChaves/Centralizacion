<?php

use Illuminate\Database\Seeder;

class WatersourceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Watersource::class)->create([
        'watersource_name' => 'Heliodoro A',
        'address' => 'Cuenca Platanar',
        'coordinate_CRTM05' => 'Latitud 254.10 , Longitud 490.50',
        'observations' => 'En uso,expediente 4334 A'
        ]);
        factory(App\Watersource::class)->create([
        'watersource_name' => 'La Catarata',
        'address' => '2.3 km este de San Vicente,Ciudad Quesada,San Carlos',
        'coordinate_CRTM05' => 'Latitud 494.017 , Longitud 250.914',
        'observations' => 'En uso,expediente 923 R'
        ]);
       
    }
}
