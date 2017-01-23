<?php

use Illuminate\Database\Seeder;

class RolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
    	factory(App\Rol::class)->create([
        'name' => 'Administrador',
        'rol_value' => 'Administrador'
        ]);
        //Se cometario ya que este rol no es requerido en esta estapa del proyecto 
        /*factory(App\Rol::class)->create([
        'name' => 'Institución',
        'rol_value' => 'Institución'
        ]); */
        factory(App\Rol::class)->create([
        'name' => 'Gestor',
        'rol_value' => 'Gestor'
        ]);
    }
}
