<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\UserEntityRequest;
use App\Http\Controllers\Controller;
use App\UserEntity;
use App\Entity;
use App\User;
use Session;
use Carbon\Carbon;
use Auth;

class UserEntityController extends Controller
{ 
    public function __construct()
    {  
        $this->middleware('auth');
        if (Auth::user()->getRol()=="Administrador") {
            $this->middleware('administrator'); 
        }elseif(Auth::user()->getRol()=="Institución"){
            $this->middleware('institution'); 
        }elseif(Auth::user()->getRol()=="Gestor"){
            $this->middleware('agent');
            
        }else{
            Auth::logout();
        } 
    } 
    
    public function index()
    {   
        $view=Auth::user()->getView();
        $users=User::all();
        $entities=Entity::all();
        if (Auth::user()->getRol()=="Institución") {
           $name="Administrador";
           $usersEntities=UserEntity::getEntityRol(Auth::user()->extractIdRol($name));
        }else{
           $usersEntities=UserEntity::all();
        }
        
        return view('usersEntities.index',compact('usersEntities','users','entities','view'));
    }

    public function create()
    {   
        $name="Administrador";
        $view=Auth::user()->getView();
        if (Auth::user()->getRol()=="Institución") {
           $entities=Entity::getEntityRol(Auth::user()->extractIdRol($name));
           
        }else{
           
           //$entities=Entity::getEntityRol(Auth::user()->extractIdRol("Institución"));
           $entities=Entity::all();
        }
        
        $users=User::all();
        return view('usersEntities.create',compact('users','entities','view'));
    }

    public function store(UserEntityRequest $request)
    {   
        $entity_id = $request->input('entity_id');
        $user_id = $request->input('user_id');
        
        if (!$this->existUsers($user_id)) {
           return redirect()->to('usuarios-entidades/create')->withInput()->withErrors(array('invalid' => 'El usuario seleccionado no existe')); 
        }
        
        if (!$this->existEntity($entity_id)) {
           return redirect()->to('usuarios-entidades/create')->withInput()->withErrors(array('invalid' => 'La entidad seleccionada no existe')); 
        }

        if (Auth::user()->getRol()=="Institución") {
            if (Auth::user()->extractRolName($entity_id)=="Administrador") {
                
                return redirect()->to('usuarios-entidades/create')->withInput()->withErrors(array('invalid' => 'No posee privilegios para unir el usuario a esta entidad')); 
            }
        }
        if ($this->existUser($request->input('user_id'))) {
            return redirect()->to('usuarios-entidades/create')->withInput()->withErrors(array('invalid' => 'El usuario seleccionado ya ha sido vinculado')); 
        }
        $date = Carbon::now();       
        $user_entity= new UserEntity($request->all());
        $user_entity->created_at = $date;
        $user_entity->updated_at = $date;           
        $user_entity->save();
        return redirect()->route('usuarios-entidades.index');
    }

    public function show($id)
    {
        return redirect()->route('usuarios-entidades.index');
    }

    public function edit($id)
    {   
        return redirect()->route('usuarios-entidades.index');
        $view=Auth::user()->getView();
        $name="Administrador";
        $view=Auth::user()->getView();
        if (Auth::user()->getRol()=="Institución") {
           $entities=Entity::getEntityRol(Auth::user()->extractIdRol($name));
           $users = User::getUsersRol(Auth::user()->extractIdRol($name));
        }else{
           $users=User::all();
           $entities=Entity::all();
        }
        $userEntity = UserEntity::findOrFail($id);
        return view('usersEntities.edit',compact('userEntity','users','entities','view'));
    }

    public function update(UserEntityRequest $request,$id)
    {
        
        $date = Carbon::now(); 
        $user_entity= UserEntity::findOrFail($id);
        $user_entity->fill($request->all());
        $user_entity->updated_at = $date; 
        $user_entity->save();
        return redirect()->route('usuarios-entidades.index');
    }

    public function destroy($id)
    {
        if (!$this->exist($id)) {
            Session::flash('message','El usuario entidad a eliminar no existe');
            return redirect()->route('usuarios-entidades.index');
        }
        $user_entity= UserEntity::findOrFail($id);
        $user_entity->delete($id);
        Session::flash('message','Fue eliminado de nuestros registros.');
        return redirect()->route('usuarios-entidades.index');
    }

    public function existUser($id){
        $exist=False;
        $consult=UserEntity::getExist($id);
     
        if ($consult!=[]) {
            $exist=True;
        }
        return $exist;
    }

    public function exist($id){
        $exist=False;
        $usersEntities=UserEntity::all();
        foreach ($usersEntities as $userEntity ) {
            if ($id==$userEntity->id) {
               $exist=True; 
            } 
        }
        return $exist; 
    }
    
    public function existUsers($id){
        $exist=False;
        $users=User::all();
        foreach ($users as $user ) {
            if ($id==$user->id) {
               $exist=True; 
            } 
        }
        return $exist; 
    }
    
    public function existEntity($id){
        $exist=False;
        $entities=Entity::all();
        foreach ($entities as $entity ) {
            if ($id==$entity->id) {
               $exist=True; 
            } 
        }
        return $exist; 
    }
}
