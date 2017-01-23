<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{
    protected $table = 'entity';
	protected $fillable = array('name', 'address','email','telephone_number','description','rol_id','created_at','updated_at');
	protected $guarded  = array('id');
	public    $timestamps = false;

	static public function getEntities($id){
		 return \DB::table('entity')
            ->where('entity.rol_id', $id)
            ->select('entity.*')
            ->get(); 
	}

	static public function getEntityRol($id){
		 return \DB::table('rol')
            ->join('entity', 'rol.id', '=', 'entity.rol_id')
            ->where('entity.rol_id','<>', $id)
            ->select('entity.*')
            ->get(); 
	}


	
}
