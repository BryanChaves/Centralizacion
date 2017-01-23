<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/
use Carbon\Carbon;

$factory->define(App\User::class, function (Faker\Generator $faker) {
    $date = Carbon::now();
    //$date->format('m-d-Y');
    return [
        'name' => 'Bryan Miguel',
        'last_name_1' => 'Chaves',
        'last_name_2' => 'Salas',
        'ID_number' => '206700297',
        'telephone_number' => '83285288',
        'email' => 'bryanchaves.salas19@gmail.com',
        'password' => '123456',
        'created_at' => $date,
        'updated_at' => $date

    ];
});
$factory->define(App\Rol::class, function (Faker\Generator $faker) {
    $date = Carbon::now();
    //$date=date_format($date, 'm-d-Y');
    return [
        'name' => 'administrator',
        'rol_value' => 'administrator',
        'created_at' => $date,
        'updated_at' => $date
    ];
});
$factory->define(App\Entity::class, function (Faker\Generator $faker) {
    $date = Carbon::now();
    //$date=date_format($date, 'm-d-Y');
    return [
        'name' => 'Universidad Técnica Nacional',
        'address' => '400 Sur del parque de Ciudad Quesada',
        'email' => 'utn_sancarlos@utn.ac.cr',
        'telephone_number' => '24605102',
        'description' => 'Univerdiad pública',
        'rol_id' => '1',
        'created_at' => $date,
        'updated_at' => $date
    ];
});

$factory->define(App\UserEntity::class, function (Faker\Generator $faker) {
    $date = Carbon::now();
    //$date=date_format($date, 'm-d-Y');
    return [
        'user_id'   => '1',
        'entity_id' => '1',
        'created_at'=> $date,
        'updated_at'=> $date
    ];
});
$factory->define(App\Watersource::class, function (Faker\Generator $faker) {
    $date = Carbon::now();
    //$date=date_format($date, 'm-d-Y');
    return [
        'watersource_name' => 'Casa Vieja',
        'address' => 'San Vicente centro',
        'coordinate_CRTM05' => 'latitud 98 , logintud 65',
        'observations' => 'dia lluvioso',
        'created_at'=> $date,
        'updated_at'=> $date
    ];
});
$factory->define(App\Province::class, function (Faker\Generator $faker) {
    return [
        'name' => 'San José'
    ];
});
$factory->define(App\Canton::class, function (Faker\Generator $faker) {
    return [
        'name' => 'San José',
        'province_id'=>'1'
    ];
});
$factory->define(App\District::class, function (Faker\Generator $faker) {
    return [
        'name' => 'Duacarí',
        'canton_id'=>'81'
    ];
});
$factory->define(App\Parameter::class, function (Faker\Generator $faker) {
    $date = Carbon::now();
    //$date=date_format($date, 'm-d-Y');
    return [
        'parameter' => 'Selenio',
        'unit'=>'mg/L Se',
        'recommended_value'=>'',
        'maximum_allowable'=>'0,01',
        'created_at' => $date,
        'updated_at' => $date
    ];
});
$factory->define(App\Parameterlevel::class, function (Faker\Generator $faker) {
    $date = Carbon::now();
    //$date=date_format($date, 'm-d-Y');
    return [
        'level' => '1',
        'parameter_id'=>'1',
        'created_at' => $date,
        'updated_at' => $date
    ];
});
$factory->define(App\Resolution::class, function (Faker\Generator $faker) {
    $date = Carbon::now();
    //$date=date_format($date, 'm-d-Y');
    return [
        'num_resolution' => 'R-4334A-2010-AGUAS-MINAE',
        'created_at' => $date,
        'updated_at' => $date
    ];
});
$factory->define(App\File::class, function (Faker\Generator $faker) {
    $date = Carbon::now();
    //$date=date_format($date, 'm-d-Y');
    return [
        'num_file' => '4334 A',
        'created_at' => $date,
        'updated_at' => $date
    ];
});
$factory->define(App\Filetype::class, function (Faker\Generator $faker) {
    $date = Carbon::now();
    //$date=date_format($date, 'm-d-Y');
    return [
        'name' => 'A',
        'created_at' => $date,
        'updated_at' => $date
    ];
});
$factory->define(App\Viability::class, function (Faker\Generator $faker) {
    $date = Carbon::now();
    //$date=date_format($date, 'm-d-Y');
    return [
        'project_name' => 'Concesión de aprovechamiento de agua',
        'setena_administrative_record' => 'D1-10364-2013-SETENA',
        'cadrastal_plane_number' => '2-92311952',
        'property_number' => '76695',
        'province' => '2',
        'canton' => '30',
        'district' => '122',
        'coordinate' => 'Latitud 254.10, Longitud 490.50',
        'path' => '',
        'created_at' => $date,
        'updated_at' => $date
    ];
});
$factory->define(App\Samplingsite::class, function (Faker\Generator $faker) {
    $date = Carbon::now();
    //$date=date_format($date, 'm-d-Y');
    return [
        'name'   => 'Tanque Heliodoro A',
        'agent_id' => '3',
        'created_at' => $date,
        'updated_at' => $date
    ];
});
$factory->define(App\Concession::class, function (Faker\Generator $faker) {
    $date = Carbon::now();
    //$date=date_format($date, 'm-d-Y');
    return [
        'agent_id' => '2',
        'agent_number' => '3-014-042074',
        'resolution_id' => '1',
        'file_id' => '1',
        'fileType_id' => '1',
        'conferment_date' => '2010/6/21',
        'due_date' => '2030/6/21',
        'owner' => 'Arrendamientos San Pascual SA',
        'property_number' => '76685',
        'water_tapping_point'=>'Tanque Heliodoro A',
        'authorized_use'=>'Consumo Humano',
        'assigned_flow'=>'80.100',
        'capacity_flow'=>'52',
        'viability_id'=>'1',
        'path'=>'',
        'created_at' => $date,
        'updated_at' => $date
    ];
});
$factory->define(App\Flow_Measurement::class, function (Faker\Generator $faker) {
    $date = Carbon::now();
    //$date=date_format($date, 'm-d-Y');
    return [
        'capacity' => '80',
        'method' => 'Volumétrico',
        'observations' => 'Aforo normal',
        'date' => '2015/9/8',
        'weather' => 'Lluvioso',
        'sampling_site_id' => Null,
        'watersource_id' => '1',
        'created_at' => $date,
        'updated_at' => $date
    ];
}); 
$factory->define(App\Sampling::class, function (Faker\Generator $faker) {
    $date = Carbon::now();
    //$date=date_format($date, 'm-d-Y');
    return [
        'consecutive' => '1',
        'label' => 'AG-300-2013',
        'level'=>'1',
        'sampling_site_id'=>Null,
        'analysis_id'=>'1',
        'watersource_id'=>'1',
        'created_at' => $date,
        'updated_at' => $date
    ];
});
$factory->define(App\Record::class, function (Faker\Generator $faker) {
    $date = Carbon::now();
    //$date=date_format($date, 'm-d-Y');
    return [
        'sampling_id' => '1',
        'parameter_id' => '1',
        'value'=>'<1,8',
        'created_at' => $date,
        'updated_at' => $date
    ];
});
$factory->define(App\Analysis::class, function (Faker\Generator $faker) {
    $date = Carbon::now();
    //$date=date_format($date, 'm-d-Y');
    return [
        'agent_id' => '3',
        'laboratory_name' => 'UNIVERSIDAD NACIONAL',
        'date'=>'2013/2/18',
        'report_number'=>'AG-300-2013',
        'path'=>Null,
        'created_at' => $date,
        'updated_at' => $date
    ];
});
$factory->define(App\Concession_Watersource::class, function (Faker\Generator $faker) {
    $date = Carbon::now();
    //$date=date_format($date, 'm-d-Y');
    return [
        'concession_id' => '1',
        'watersource_id' => '1',
        'created_at' => $date,
        'updated_at' => $date
    ];
});
