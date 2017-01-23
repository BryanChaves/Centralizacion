<?php

use Illuminate\Database\Seeder;

class EntityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Entity::class)->create([
        'name' => 'Universidad Técnica Nacional',
        'address' => '400 Sur del parque de Ciudad Quesada',
        'email' => 'utnsancarlos@utn.ac.cr',
        'telephone_number' => '24605102',
        'description' => 'Universidad pública',
        'rol_id' => '1'
        ]);
        //Este se comentario con el fin de que sea aplicado cuando sea requerido y en esta estapa no lo es
        /*factory(App\Entity::class)->create([
        'name' => 'Ministerio de Salud',
        'address' => '100 norte y 50 este del hospital San Carlos',
        'email' => 'sancarlos@ministeriodesalud.go.cr',
        'telephone_number' => '24600907',
        'description' => 'Ministerio encargado de velar por la salud y bienestar de los habitantes del cantón de San Carlos',
        'rol_id' => '2'
        ]);*/
        factory(App\Entity::class)->create([
        'name' => 'Municipalidad San Carlos',
        'address' => 'Frente al parque de Ciudad Quesada',
        'email' => 'municipalidad_SanCarlos@munisc.go.cr',
        'telephone_number' => '24010900 ',
        'description' => 'Municipio encargado de velar por el bienestar del cantón de San Carlos',
        'rol_id' => '2'
        ]);
        factory(App\Entity::class)->create([
        'name' => 'ASADA San Vicente',
        'address' => 'San vicente',
        'email' => 'asadasan_vicente@gmail.com',
        'telephone_number' => '24608945',
        'description' => 'Administra los sistemas de acueducto y alcantarillado de San Vicente',
        'rol_id' => '2'
        ]);
    }
}
