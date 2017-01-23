<?php

use Illuminate\Database\Seeder;

class UserEntityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\UserEntity::class)->create([
        'user_id' 	=> '1',
        'entity_id' => '1'
        ]); 
        //Se comentario porque en esta etapa del proyecto aun no es requerido
        /*factory(App\UserEntity::class)->create([
        'user_id' 	=> '2',
        'entity_id' => '2'
        ]); */
        factory(App\UserEntity::class)->create([
        'user_id' 	=> '2',
        'entity_id' => '2'
        ]);
        factory(App\UserEntity::class)->create([
        'user_id'   => '3',
        'entity_id' => '3'
        ]); 
    }
}
