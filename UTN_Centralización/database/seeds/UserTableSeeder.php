<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class)->create([
        'name' => 'Bryan Miguel',
        'last_name_1' => 'Chaves',
        'last_name_2' => 'Salas',
        'ID_number' => '206700297',
        'telephone_number' => '83285288',
        'email' => 'bryanchaves.salas19@gmail.com',
        'password' => 'fx-8150'
        ]);
        //Se comentario porque aun no es necesario durante esta etapa del proyecto
        /*factory(App\User::class)->create([
        'name' => 'Betzy Karina',
        'last_name_1' => 'Chiroldes',
        'last_name_2' => 'Leon',
        'ID_number' => '207210356',
        'telephone_number' => '88634344',
        'email' => 'beka142@hotmail.com',
        'password' => 'Bet-zy23'
        ]);*/
        factory(App\User::class)->create([
        'name' => 'Carlos Andrei',
        'last_name_1' => 'Salas',
        'last_name_2' => 'Ramírez',
        'ID_number' => '209990589',
        'telephone_number' => '88842722',
        'email' => 'carlossr@munisc.go.cr',
        'password' => 'municipalidad'
        ]);
        factory(App\User::class)->create([
        'name' => 'Alexander',
        'last_name_1' => 'Rojas',
        'last_name_2' => 'Arrieta',
        'ID_number' => '205520618',
        'telephone_number' => '83718334',
        'email' => 'asadasanvicente@gmail.com',
        'password' => 'sanvicente'
        ]);
    }
}
