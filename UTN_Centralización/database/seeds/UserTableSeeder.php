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
        'name' => 'Juan Alberto',
        'last_name_1' => 'Quiros',
        'last_name_2' => 'Gonzalez',
        'ID_number' => '207210332',
        'telephone_number' => '88078162',
        'email' => 'juan_quiros@gmail.com',
        'password' => 'quiros-23'
        ]);
        factory(App\User::class)->create([
        'name' => 'Jonathan',
        'last_name_1' => 'Vargas',
        'last_name_2' => 'Alvarado',
        'ID_number' => '207150305',
        'telephone_number' => '61850931',
        'email' => 'jona_vargas@gmail.com',
        'password' => 'vargas/123'
        ]);
    }
}
