<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\EditRolRequest;
use App\Http\Requests\CreateRolRequest;
use App\Http\Controllers\Controller;
use App\Rol;
use Redirect;
use Session;
use Auth;
use Carbon\Carbon;

class RolController extends Controller
{
    public function __construct()
    {  
        $this->middleware('auth');
        $this->middleware('administrator');
    }    

    public function index()
    {
        $view=Auth::user()->getView();
        $roles=Rol::all();
        
        return view('roles.index',compact('roles','view'));
    }

    public function create()
    {   
        $view=Auth::user()->getView();
        return view('roles.create',compact('view'));
    }

    public function store(CreateRolRequest $request)
    {   
        
        $date = Carbon::now(); 
        if ($this->existRol($request->input('name'))) {
          return redirect()->route('roles.create')->withInput()->withErrors(array('invalid' => 'Ya existe un rol con ese nombre favor cambiarlo'));  
        }

        $rol= new Rol($request->all());
        $rol->rol_value= $request->input('name');   
        $rol->created_at = $date;
        $rol->updated_at = $date;           
        $rol->save();
        return redirect()->route('roles.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {   
        if (!$this->existRolId($id )) {
           Session::flash('message','El rol a editar no existe'); 
           return redirect()->route('roles.index');
        }
        
        $view=Auth::user()->getView();
        $rol = Rol::findOrFail($id);
        return view('roles.edit',compact('rol','view'));
    }

    public function update(EditRolRequest $request,$id)
    {   
        $date = Carbon::now();
        $value = $request->input('rol_value');
        if ($this->existRol($value)) {
          return redirect()->to('roles/'.$id.'/edit')->withInput()->withErrors(array('invalid' => 'Ya existe un rol con ese nombre favor cambiarlo'));
        }
        $rol= Rol::findOrFail($id);
        $rol->rol_value=$value ;
        $rol->updated_at = $date; 
        $rol->save();
        return redirect()->route('roles.index');
    }

    public function destroy($id)
    {
        if (!$this->existRolId($id )) {
           Session::flash('message','El rol a eliminar no existe'); 
           return redirect()->route('roles.index');
        } 

        $rol= Rol::findOrFail($id);
        $rol->delete($id);
        Session::flash('message',$rol->rol_value.' ' .'fue eliminado de nuestros registros.');
        return redirect()->route('roles.index');
    }

    public function existRol($name){
        
        $status=False;
        $roles=Rol::all();
        
        foreach ($roles as $rol ) {
            if ((strtolower($rol->name))==(strtolower($name))) {
                $status=True;
            }
            
        }

        return $status;
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
