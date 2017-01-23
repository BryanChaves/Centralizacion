<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserEntity extends Model
{
  	protected $table = 'user_entity';
	protected $fillable = array('user_id','entity_id','created_at','updated_at');
	protected $guarded  = array('id');
	public    $timestamps = false;

	
    public function getUserEntity($id)
    {
        return \DB::table('user_entity')
            
            ->join('user_entity', 'users.id', '=', 'user_entity.user_id')
            ->join('entity', 'entity.id', '=', 'user_entity.entity_id')
            ->select('users.*','entity.*')
            ->where('users.id', $id)
            ->get(); 
    }
    static public function getEntityRol($id)
    {
        return \DB::table('users')
            
            ->join('user_entity', 'users.id', '=', 'user_entity.user_id')
            ->join('entity', 'entity.id', '=', 'user_entity.entity_id')
            ->where('entity.rol_id','<>',$id)
            ->select('user_entity.*')
            ->get(); 
    }
    static public function getExist($id)
    {
        return \DB::table('user_entity')
            ->where('user_entity.user_id',$id)
            ->select('user_entity.user_id')
            ->get(); 
    }
}
