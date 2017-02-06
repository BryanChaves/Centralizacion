<?php

Route::get('/', 'HomeController@index');
Route::get('home',[

	'uses'=>'HomeController@index',
	'as'=>'/home'

	]); 
Route::post('home',[

	'uses'=>'HomeController@index',
	'as'=>'/home'

	]); 


	
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


Route::resource('usuarios','UserController');
Route::resource('roles','RolController');
Route::resource('entidades','EntityController');
Route::resource('usuarios-entidades','UserEntityController');
Route::resource('nacientes','WatersourceController');
Route::resource('resoluciones','ResolutionController');
Route::resource('expedientes','FileController');
Route::resource('tipos-expediente','FiletypeController');
Route::resource('viabilidades','ViabilityController');
Route::resource('concesiones','ConcessionController');
Route::get('/canton/{value}', 'ViabilityController@canton');
Route::get('/district/{value}', 'ViabilityController@district');
Route::resource('analisis','AnalysisController');
Route::resource('parametros','ParameterController');
Route::resource('nivel-parametros','ParameterlevelController');
Route::resource('sitios-muestreo','SamplingsiteController');
Route::resource('muestras','SamplingController');
Route::resource('registros','RecordController');
Route::resource('concesion-naciente','Concession_WatersourceController');
Route::resource('medicion-caudal','Flow_MeasurementController');
Route::resource('aforos','ReportcapacityController');
Route::resource('calidades','ReportqualityController');

Route::get('/combo/{value}', 'ReportcapacityController@combo');
Route::get('/cargarTabla/{value}', 'AnalysisController@cargarTabla');
Route::get('/legales', 'FileController@legal');


