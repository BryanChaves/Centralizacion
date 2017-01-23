<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\CreateEntityRequest;
use App\Http\Requests\EditEntityRequest;
use App\Http\Controllers\Controller;
use App\Rol;
use App\Entity;
use Redirect;
use Session;
use Carbon\Carbon;
use Auth;

class EntityController extends Controller
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
        $name="Administrador";
        if (Auth::user()->getRol()=="Institución") {
         $entities=Entity::getEntityRol(Auth::user()->extractIdRol($name));
        }else{
            $entities=Entity::all();
        }
        
        $view=Auth::user()->getView();
        $roles=Rol::all();
        
        return view('entities.index',compact('entities','roles','view'));
    }

    public function create()
    {  
        $name="Administrador";
        if (Auth::user()->getRol()=="Institución") {
            $roles=Rol::roles($name);  
        }else{
          $roles=Rol::all();  
        } 
        $view=Auth::user()->getView();
        
        return view('entities.create',compact('roles','view'));
    }

    public function store(CreateEntityRequest $request)
    {   
        $rol_id = $request->input('rol_id');
        if (!$this->existRolId($rol_id )) {
           return redirect()->to('entidades/create')->withInput()->withErrors(array('invalid' => 'El rol seleccionado no existe'));
        }
        if ((Auth::user()->getRol()=="Institución")&&((Auth::user()->extractRol($rol_id)=="Administrador"))) {
           return redirect()->to('entidades/create')->withInput()->withErrors(array('invalid' => 'No posee privilegios para crear una entidad con el rol seleccionado'));
        }
        if ($this->existEntity($request->input('name'))) {
          return redirect()->to('entidades/create')->withInput()->withErrors(array('invalid' => 'Ya ese nombre fue tomado favor escribir otro')); 
        }
        $date = Carbon::now();        
        $entity= new Entity($request->all());
        $entity->created_at = $date;
        $entity->updated_at = $date;           
        $entity->save();
        return redirect()->route('entidades.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {   
        if (!$this->existEntityId($id)) {
           Session::flash('message','La entidad a editar no existe');
           return redirect()->route('entidades.index');
        }

        if ((Auth::user()->getRol()=="Institución")&&(Auth::user()->extractRolName($id)=="Administrador")) {
            Session::flash('message','No posee privilegios');
            return redirect()->route('entidades.index');
        }
        if ((Auth::user()->getRol()=="Institución")&&(Auth::user()->checkRol($id)=="Institución")) {
            if ((Auth::user()->getNameEntity())!=(Auth::user()->nameEntity($id))) {
                 Session::flash('message','No posee privilegios para editar esta entidad');
                 return redirect()->route('entidades.index');
            }
        }
        $view=Auth::user()->getView();
        $roles=Rol::all();
        $entity = Entity::findOrFail($id);
        return view('entities.edit',compact('entity','roles','view'));
    }

    public function update(EditEntityRequest $request,$id)
    {
        $date = Carbon::now();  
        $entity= Entity::findOrFail($id);
        $entity->fill($request->all());
        $entity->updated_at = $date; 
        $entity->save();
        return redirect()->route('entidades.index');
    }

    public function destroy($id)
    {   
        if (!$this->existEntityId($id)) {
           Session::flash('message','La entidad a eliminar no existe');
           return redirect()->route('entidades.index');
        }

        if ((Auth::user()->getRol()=="Institución")&&(Auth::user()->extractRolName($id)=="Administrador")) {
            Session::flash('message','No posee privilegios para eliminar esta entidad');
            return redirect()->route('entidades.index');
        }
        if ((Auth::user()->getRol()=="Institución")&&(Auth::user()->checkRol($id)=="Institución")) {
            if ((Auth::user()->getNameEntity())!=(Auth::user()->nameEntity($id))) {
                 Session::flash('message','No posee privilegios para editar esta entidad');
                 return redirect()->route('entidades.index');
            }
        }
        $entity= Entity::findOrFail($id);
        $entity->delete($id);
        Session::flash('message',$entity->name.' ' .'fue eliminado de nuestros registros.');
        return redirect()->route('entidades.index');
    }

    public function existEntity($name){
        
        $status=False;
        $entities=Entity::all();
        
        foreach ($entities as $entity ) {
            if ((strtolower($entity->name))==(strtolower($name))) {
                $status=True;
            }
            
        }

        return $status;
    }

    public function existEntityId($id){
        $exist=False;
        $entities=Entity::all();
        foreach ($entities as $entity ) {
            if ($id==$entity->id) {
               $exist=True; 
            } 
        }
        return $exist; 
    }


    public function existRolId($id){
        $exist=False;
        $roles=Rol::all();
        foreach ($roles as $rol ) {
            if ($id==$rol->id) {
               $exist=True; 
            } 
        }
        return $exist; 
    }

}
