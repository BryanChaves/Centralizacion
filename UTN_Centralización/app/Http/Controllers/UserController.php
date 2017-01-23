<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\EditUserRequest;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\User;
use App\UserEntity;
use Redirect;
use Session;
use Auth;

class UserController extends Controller
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
        $idEntity = Auth::user()->idEntity();
        $view = Auth::user()->getView();
        if(Auth::user()->getRol()=="Gestor"){ 
            $users = User::getUsers($idEntity);            
        }elseif((Auth::user()->getRol()=="Institución")){
            $name="Administrador";
            $users = User::getUsersRol(Auth::user()->extractIdRol($name));
        }else{
            $users = User::all(); 
        }
        return view('users.index',compact('view','users'));
    }

    public function create()
    {   
        $view = Auth::user()->getView();
        return view('users.create',compact('view'));
    }

    public function store(CreateUserRequest $request)
    { 
        $date = Carbon::now();       
        $users = new User($request->all());
        $users->created_at = $date;
        $users->updated_at = $date;           
        $users->save();
        if (Auth::user()->getRol()=="Gestor") {
            $email = $request->input('email');
            $id = Auth::user()->extractId($email);
            $idEntity = Auth::user()->idEntity();
            $this->insert($id,$idEntity);
        }
        return redirect()->route('usuarios.index');
    }

    public function show($id)
    {
        return redirect()->route('usuarios.index');
    }
    public function insert($id,$idEntity)
    {
        $date = Carbon::now();        
        $user_entity = new UserEntity();
        $user_entity->user_id = $id;
        $user_entity->entity_id = $idEntity;
        $user_entity->created_at = $date;
        $user_entity->updated_at = $date;           
        $user_entity->save();
    }
    public function edit($id)
    {   
        
        if (!$this->exist($id)) {
            Session::flash('message','El usuario a editar no existe no existe');
            return redirect()->route('usuarios.index'); 
        }
       
        if ((Auth::user()->getRol()=="Institución")&&(Auth::user()->checkRol($id)=="Administrador")) {
            Session::flash('message','No posee privilegios para editar este usuario');
            return redirect()->route('usuarios.index');
        }
        
        if ((Auth::user()->getRol()=="Institución")&&(Auth::user()->checkRol($id)=="Institución")) {
            if ((Auth::user()->getNameEntity())!=(Auth::user()->nameEntity($id))) {
                 Session::flash('message','No posee privilegios para editar este usuario');
                 return redirect()->route('usuarios.index');
            }
        }
        $view = Auth::user()->getView(); 
        $user = User::findOrFail($id);
        return view('users.edit',compact('user','view'));
    }

    public function update(EditUserRequest $request,$id)
    {   
        
        if ((Auth::user()->extractUserEmail($id))!=($request->input('email'))) {
            if ($this->existEmail($request->input('email'))) {
                return redirect()->to('usuarios/'.$id.'/edit')->withInput()->withErrors(array('invalid' => 'El correo electrónico ya ha sido tomado por favor digite otro'));
            }
        }
        if ((Auth::user()->extractUserID($id))!=($request->input('ID_number'))) {
            if ($this->existID($request->input('ID_number'))) {
                return redirect()->to('usuarios/'.$id.'/edit')->withInput()->withErrors(array('invalid' => 'La cédula ya ha sido tomada por favor digite otra'));
            }
        }
        $date = Carbon::now();  
        $user = User::findOrFail($id);
        $user ->fill($request->all());
        $user ->updated_at = $date; 
        $user ->save();
        return redirect()->route('usuarios.index');
    }

    public function destroy($id)
    {   
        if (!$this->exist($id)) {
            Session::flash('message','El usuario a eliminar no existe no existe');
            return redirect()->route('usuarios.index'); 
        }

        if ((Auth::user()->getRol()=="Institución")&&(Auth::user()->checkRol($id)=="Institución")) {
            if ((Auth::user()->getNameEntity())!=(Auth::user()->nameEntity($id))) {
                Session::flash('message','No posee privilegios para eliminar este usuario');
                return redirect()->route('usuarios.index');
            }
        }
        $user = User::findOrFail($id);
        $user->delete($id);
        Session::flash('message',$user->full_name.' ' .'fue eliminado de nuestros registros.');
        return redirect()->route('usuarios.index');
    }

    public function existEmail($email){
        $exist=False;
        if (Auth::user()->existEmail($email)!=[]) {
            $exist=True;
        }
        return $exist; 
    }
    public function existID($ID){
        $exist=False;
        if (Auth::user()->existID($ID)!=[]) {
            $exist=True;
        }
        return $exist; 
    }

    public function exist($id){
        $exist=False;
        $users=User::all();
        foreach ($users as $user ) {
            if ($id==$user->id) {
               $exist=True; 
            } 
        }
        return $exist; 
    }
    


}
