<?php

namespace App;

use Auth;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;
    protected $table = 'users';
    protected $fillable = ['name','last_name_1','last_name_2','ID_number','telephone_number','email', 'password','created_at','updated_at'];
    protected $hidden = ['password', 'remember_token'];

    public function getIdEntity($id)
    {
        return \DB::table('users')
            ->where('users.id', $id)
            ->join('user_entity', 'users.id', '=', 'user_entity.user_id')
            ->select('user_entity.entity_id')
            ->get(); 
    }

    public function getRolName($id)
    {
        return \DB::table('rol')
            ->where('rol.id', $id)
            ->join('entity', 'rol.id', '=', 'entity.rol_id')
            ->select('rol.name')
            ->get();    
    }

    public function getEntity($id)
    {
        return \DB::table('entity')
            ->where('entity.id', $id)
            ->select('entity.name')
            ->get();    
    }

    public function extractIdEntity($id)
    {
        $num_Entity=0;
        $consult_id=$this->getIdEntity($id);
        foreach ($consult_id as $entity ) {
            $num_Entity=$entity->entity_id; 
        }
        return $num_Entity;
    }

    public function extractRolName($id)
    {
        $name_Rol="";
        $consult_name=$this->getRolName($id);
        foreach ($consult_name as $name ) {
            $name_Rol=$name->name; 
        }
        return $name_Rol;
    }

    public function extractEntityName($id)
    {
        $name_Entity="";
        $consult_name=$this->getEntity($id);
        foreach ($consult_name as $name ) {
            $name_Entity=$name->name; 
        }
        return $name_Entity;
    }

    public function getNameEntity()
    {
        $id=Auth::user()->id;
        $id_Entity=$this->extractIdEntity($id);
        $name_Entity=$this->extractEntityName($id_Entity);
        return $name_Entity;    
    }
    public function nameEntity($id)
    {
        $id_Entity=$this->extractIdEntity($id);
        $name_Entity=$this->extractEntityName($id_Entity);
        return $name_Entity;    
    }

    public function idEntity()
    {
        $id=Auth::user()->id;
        $id_Entity=$this->extractIdEntity($id);
        return $id_Entity;    
    }

    public function getRol()
    {
        $id=Auth::user()->id;
        $id_Entity=$this->extractIdEntity($id);
        $name_Rol=$this->extractRolName($id_Entity);
        return $name_Rol;
    }

    public function getFullNameAttribute()
    {
        return $this->name.' '.$this->last_name_1.' '.$this->last_name_2;
    }

    public function setPasswordAttribute($value)
    {
        if(!empty($value)){
           return $this->attributes['password']=\Hash::make($value);
        }     
    }
   
    public function getView()
    {
        $rol=$this->getRol();
        $view="";
        if ($rol=="Administrador") {
            $view="administrator"; 
        }elseif($rol=="Institución"){
            $view="institution";
        }else{
            $view="agent";
        }
        return $view;
    }

    public function Id($email)
    {
        return \DB::table('users')
            ->where('users.email', $email)
            ->select('users.id')
            ->get();
    }

    public function extractId($email)
    {
        $id=0;
        $consult_id=$this->id($email);
        foreach ($consult_id as $id ){
            $id=$id->id; 
        }
        return $id;
    }

    public function rol($id)
    {
        return \DB::table('rol')
            ->where('rol.id', $id)
            ->select('rol.name')
            ->get(); 
    }

    public function extractRol($id)
    {
        $name="";
        $consult_name=$this->rol($id);
        foreach ($consult_name as $name ) {
            $name=$name->name; 
        }
        return $name;
    }
    
    public function checkRol($id)
    {
        $id_Entity=$this->extractIdEntity($id);
        $name_Rol=$this->extractRolName($id_Entity);
        return $name_Rol;
    }

    static public function getUsers($id)
    {
        return \DB::table('users')
            ->join('user_entity', 'users.id', '=', 'user_entity.user_id')
            ->join('entity', 'entity.id', '=', 'user_entity.entity_id')
            ->where('entity.id', $id)
            ->select('users.*')
            ->get(); 
    }

    static public function getUsersRol($id)
    {
        return \DB::table('users')
            ->join('user_entity', 'users.id', '=', 'user_entity.user_id')
            ->join('entity', 'entity.id', '=', 'user_entity.entity_id')
            ->where('entity.rol_id','<>',$id)
            ->select('users.*')
            ->get(); 
    } 
    public function getIdRol($name)
    {
        return \DB::table('rol')
            ->where('rol.name',$name)
            ->select('rol.id')
            ->get(); 
    } 
    public function extractIdRol($name){
        $id_Rol=0;
        $consult_name=$this->getIdRol($name);
        foreach ($consult_name as $id ) {
            $id_Rol=$id->id; 
        }
        return $id_Rol;
    }
    public function existEmail($email){
        return \DB::table('users')
            ->where('users.email',$email)
            ->select('users.email')
            ->get();
    }

    public function existID($ID){
        return \DB::table('users')
            ->where('users.ID_number',$ID)
            ->select('users.ID_number')
            ->get();
    }
    public function userEmail($id){
        return \DB::table('users')
            ->where('users.id',$id)
            ->select('users.email')
            ->get();
    }
    public function extractUserEmail($id){
        $name_Email="";
        $consult=$this->userEmail($id);
        foreach ($consult as $email ) {
            $name_Email=$email->email; 
        }
        return $name_Email;
    }
    public function userID($id){
        return \DB::table('users')
            ->where('users.id',$id)
            ->select('users.ID_number')
            ->get();
    }
    public function extractUserID($id){
        $num_ID=0;
        $consult=$this->userID($id);
        foreach ($consult as $id ) {
            $num_ID=$id->ID_number; 
        }
        return $num_ID;
    }

    

}
