<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| The following language lines contain the default error messages used by
	| the validator class. Some of these rules have multiple versions such
	| as the size rules. Feel free to tweak each of these messages here.
	|
	*/

	"accepted"             => "El campo :attribute debe ser aceptado.",
	"active_url"           => "El campo :attribute no es una URL válida.",
	"after"                => "El campo :attribute debe ser una fecha después de :date.",
	"alpha"                => "El campo :attribute sólo puede contener letras.",
	"alpha_dash"           => "El campo :attribute sólo puede contener letras, números y guiones.",
	"alpha_num"            => "El campo :attribute sólo puede contener letras y números.",
	"array"                => "El campo :attribute debe ser un arreglo.",
	"before"               => "El campo :attribute debe ser una fecha antes :date.",
	"between"              => [
		"numeric" => "El campo :attribute debe estar entre :min - :max.",
		"file"    => "El campo :attribute debe estar entre :min - :max kilobytes.",
		"string"  => "El campo :attribute debe estar entre :min - :max caracteres.",
		"array"   => "El campo :attribute debe tener entre :min y :max elementos.",
	],
	"boolean"              => "El campo :attribute debe ser verdadero o falso.",
	"confirmed"            => "El campo de confirmación y de :attribute no coinciden.",
	"date"                 => "El campo :attribute no es una fecha válida.",
	"date_format"          => "El campo :attribute no corresponde con el formato :format.",
	"different"            => "Los campos :attribute y :other deben ser diferentes.",
	"digits"               => "El campo :attribute debe ser de :digits dígitos.",
	"digits_between"       => "El campo :attribute debe tener entre :min y :max dígitos.",
	"email"                => "El formato del :attribute es inválido.",
	"filled"               => "El campo :attribute es requerido.",
	"exists"               => "El campo :attribute seleccionado es inválido.",
	"image"                => "El campo :attribute debe ser una imagen.",
	"in"                   => "El campo :attribute seleccionado es inválido.",
	"integer"              => "El campo :attribute debe ser un entero.",
	"ip"                   => "El campo :attribute debe ser una dirección IP válida.",
	"match"          	   => "El formato :attribute es inválido.",
	"max"                  => [
		"numeric" => "El campo :attribute debe ser menor que :max.",
		"file"    => "El campo :attribute debe ser menor que :max kilobytes.",
		"string"  => "El campo :attribute debe ser menor que :max caracteres.",
		"array"   => "El campo :attribute debe tener al menos :min elementos.",
	],
	"mimes"                => "El campo :attribute debe ser un archivo de tipo :values.",
	"min"                  => [
		"numeric" => "El campo :attribute debe tener al menos :min.",
		"file"    => "El campo :attribute debe tener al menos :min kilobytes.",
		"string"  => "El campo :attribute debe tener al menos :min caracteres.",
		"array"   => "El campo :attribute debe tener al menos :min elementos.",
	],
	"not_in"               => "El campo :attribute seleccionado es invalido.",
	"numeric"              => "El campo :attribute debe ser un número.",
	"regex"                => "El formato del campo :attribute es inválido.",
	"required"             => "El campo :attribute es requerido.",
	"required_if"          => "El campo :attribute es requerido cuando el campo :other es :value.",
	"required_with"        => "El campo :attribute es requerido cuando :values está presente.",
	"required_with_all"    => "El campo :attribute es requerido cuando :values está presente.",
	"required_without"     => "El campo :attribute es requerido cuando :values no está presente.",
	"required_without_all" => "El campo :attribute es requerido cuando ningún :values está presente.",
	"same"                 => "El campo :attribute y :other debe coincidir.",
	"size"                 => [
		"numeric" => "El campo :attribute debe ser :size.",
		"file"    => "El campo :attribute debe tener :size kilobytes.",
		"string"  => "El campo :attribute debe tener :size caracteres.",
		"array"   => "El campo :attribute debe contener :size elementos.",
	],
	"unique"               => "El campo :attribute ya ha sido tomado.",
	"url"                  => "El formato de :attribute es inválido.",
	"timezone"             => "El campo :attribute debe ser una zona válida.",

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| Here you may specify custom validation messages for attributes using the
	| convention "attribute.rule" to name the lines. This makes it quick to
	| specify a specific custom language line for a given attribute rule.
	|
	*/

	'custom' => [
		'attribute-name' => [
			'rule-name' => 'custom-message',
		],
	],

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Attributes
	|--------------------------------------------------------------------------
	|
	| The following language lines are used to swap attribute place-holders
	| with something more reader friendly such as E-Mail Address instead
	| of "email". This simply helps us make messages a little cleaner.
	|
	*/

	'attributes' => [
		'username'  		=> 'Usuario',
		'password'  		=> 'Contraseña',
		'first_name'		=>'Nombre',
		'last_name' 		=> 'Apellido',
		'email'     		=>'Correo electrónico',
		'type'      		=>'Tipo usuario',
		'name'				=>'Nombre',
		'last_name_1'		=>'Primer apellido',
		'last_name_2'		=>'Segundo apellido',
		'ID_number'			=>'Cédula',
		'telephone_number'	=>'Número de teléfono',
		'sampling_site_name'=>'Nombre de naciente',
		'address'           =>'Dirección',
		'coordinate_CRTM05'  =>'Coordenada CRTM05',
		'concession_number' =>'Número de concesión',
		'viability_number'  =>'Número de viabilidad',
		'responsible_legally'=>'Responsable legal',
		'observations'		 =>'Observaciones',
		'path'		 =>'Archivo', 
		'laboratory_name'=>'Nombre laboratorio',
		'date'=>'Fecha',
		'report_number'=>'Número de reporte',
		'agent'=>'Gestor',
		'laboratory'=>'Laboratorio',
		'report_number'=>'Número de reporte',
		'actions'=>'Acciones',
		'edit'=>'Editar',
		'remove'=>'Eliminar',
		'new_analysis'=>'Nuevo análisis',
		'add'=>'Agregar',
		'back'=>'Retroceder',
		'update_analysis'=>'Actualizar análisis',
		'update'=>'Actualizar',
		'search'=>'Buscar',
		'list_analysis'=>'Lista de análisis',
		'agent_number'=>'Identificación del gestor',
		'resolution_id'=>'Número de resolución',
		'file_id'=>'Número de expediente',
		'conferment_date'=>'Fecha de otorgamiento',
		'due_date'=>'Fecha de vencimiento',
		'fileType_id'=>'Tipo de expediente',
		'owner'=>'Propietario',
		'property_number'=>'Número de finca',
		'water_tapping_point'=>'Punto de toma',
		'authorized_use'=>'Uso autorizado',
		'assigned_flow'=>'Caudal asignado',
		'capacity_flow'=>'Caudal aforado',
		'viability_id'=>'Viabilidad',
		'upload_file'=>'Subir archivo',
		'show'=>'Ver',
		'new_concession'=>'Nueva Concesión',
		'update_concession'=>'Actualizar Concesión',
		'list_concessions'=>'Lista de Concesiones',
		'concession'=>'Concesión',
		'description'=>'Descripción',
		'rol_id'=>'Rol',
		'telephone'=>'Teléfono',
		'new_entity'=>'Nueva Entidad',
		'update_entity'=>'Actualizar Entidad',
		'list_entities'=>'Lista de entidades',
		'problem'=>'Hubo algun problema.',
		'expression'=>'Whoops!',
		'new_file_type'=>'Nuevo tipo expediente',
		'update_file_type'=>'Actualizar tipo expediente',
		'list_file_types'=>'Lista de tipos de expedientes',
		'num_file'=>'Número de expediente',
		'new_file'=>'Nuevo expediente',
		'update_file'=>'Actualizar Expediente',
		'list_files'=>'Lista de expedientes',
		'level'=>'Nivel',
		'parameter_id'=>'Parámetro',
		'parameter'=>'Parámetro',
		'new_parameter_level'=>'Nuevo nivel parámetro',
		'update_parameter_level'=>'Actualizar nivel parámetro',
		'list_parameter_level'=>'Lista de niveles por parámetro',
		'unit'=>'Unidad',
		'recommended_value'=>'Valor recomendado',
		'maximum_allowable'=>'Máximo admisible',
		'new_parameter'=>'Nuevo Parámetro',
		'update_parameter'=>'Actualizar Parámetro',
		'list_parameters'=>'Lista de parametros',
		'value'=>'Valor',
		'sampling_id'=>'Muestra',
		'sampling'=>'Muestra',
		'new_record'=>'Nuevo registro',
		'update_record'=>'Actualizar registro',
		'list_records'=>'Lista de registros',
		'num_resolution'=>'Número de resolución',
		'new_resolution'=>'Nueva resolución',
		'update_resolution'=>'Actualizar resolución',
		'list_resolutions'=>'Lista de resoluciones',
		'rol_value'=>'Valor',
		'new_rol'=>'Nuevo rol',
		'update_rol'=>'Actualizar Rol',
		'list_roles'=>'Lista de roles',
		'new_sampling_site'=>'Nuevo sitio de muestreo',
		'update_sampling_site'=>'Actualizar Sitio de muestreo',
		'list_sampling_sites'=>'Lista de sitios de muestreo',
		'label'=>'Etiqueta',
		'sampling_site_id'=>'Sitio muestreo',
		'num_sampling'=>'Número muestra',
		'site'=>'Sitio',
		'new_sampling'=>'Nueva muestra',
		'update_sampling'=>'Actualizar muestra',
		'list_samplings'=>'Lista de muestras',
		'new_user'=>'Nuevo Usuario',
		'update_user'=>'Actualizar Usuario',
		'list_users'=>'Lista de usuarios',
		'user'=>'Usuario',
		'user_id'=>'Usuario',
		'entity'=>'Entidad',
		'entity_id'=>'Entidad',
		'new_user_entity'=>'Nuevo Usuario Entidad',
		'update_user_entity'=>'Actualizar Usuario Entidad',
		'list_users_entities'=>'Lista de usuarios por entidades',
		'province'=>'Provincia',
		'canton'=>'Cantón',
		'district'=>'Distrito',
		'project_name'=>'Nombre de Proyecto',
		'setena_administrative_record'=>'Expediente administrativo SETENA',
		'cadrastal_plane_number'=>'Número de Plano Catastrado',
		'coordinate'=>'Coordenadas',
		'new_viability'=>'Nueva Viabilidad',
		'update_viability'=>'Actualizar Viabilidad',
		'list_viabilities'=>'Lista de viabilidades',
		'viability'=>'Viabilidad',
		'watersource_name'=>'Nombre de Naciente',
		'new_watersource'=>'Nueva Naciente',
		'update_watersource'=>'Actualizar Naciente',
		'list_watersources'=>'Lista de Nacientes',
		'watersource'=>'Naciente',
		'users'=>'Usuarios',
		'entities'=>'Entidades',
		'roles'=>'Roles',
		'users_entities'=>'Usuarios por Entidad',
		'watersources'=>'Nacientes',
		'resolutions'=>'Resoluciones',
		'files'=>'Expedientes',
		'files_types'=>'Tipos de expediente',
		'viabilities'=>'Viabilidades',
		'concessions'=>'Concesiones',
		'analysis'=>'Análisis',
		'analysis_id'=>'Análisis',
		'parameters'=>'Parametros',
		'parameter_level'=>'Nivel Parámetro',
		'sampling_sites'=>'Sitios muestreo',
		'samplings'=>'Muestras',
		'records'=>'Registros',
		'task_panel'=>'Panel de tareas',
		'logout'=>'Cerrar sesión',
		'UTN'=>'Universidad Técnica Nacional',
		'maintenances'=>'Mantenimientos',
		'new_concession_watersource'=>'Nueva concesión naciente',
		'concession_id'=>'Concesión',
		'watersource_id'=>'Naciente',
		'new_flow_measurement'=>'Nueva medición caudal',
		'capacity'=>'Aforo',
		'method'=>'Método',
		'weather'=>'Clima',
		'concession_watersource'=>'Concesión-Naciente',
		'flow_measurement'=>'Medición caudal',
		'measurements'=>'Mediciones',
		'files_view'=>'Archivos',
		'reports'=>'Reportes',
		'capabilities'=>'Aforos',
		'quality'=>'Calidad',
		'check_points'=>'Puntos de control',
		'startDate'=>'Fecha inicial',
		'endDate'=>'Fecha final',
		'check_point'=>'Punto de control',
		'agent_id'=>'Gestor',
		'viability_number'=>'Número de viabilidad',
		'analysis_type'=>'Tipo de análisis',

	],

];
