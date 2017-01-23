<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'rol';
	protected $fillable = array('name','rol_value','created_at','updated_at');
	protected $guarded  = array('id');
	public    $timestamps = false;
    
	static public function exist($name){
		return \DB::table('rol')
            ->select('rol.name')
            ->where('rol.name', $name)
            ->get(); 
	}
	static public function roles($name){
		return \DB::table('rol')
            ->where('rol.name','<>', $name)
            ->select('rol.*')
            ->get(); 
	}

	
}
