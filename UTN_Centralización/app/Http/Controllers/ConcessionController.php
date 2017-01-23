<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\CreateConcessionRequest;
use App\Http\Requests\EditConcessionRequest;
use App\Http\Controllers\Controller;
use App\Resolution;
use App\File;
use App\Filetype;
use App\Viability;
use App\Concession;
use App\Entity;
use Redirect;
use Session;
use Carbon\Carbon;
use Auth;
use Input;
use Storage;

class ConcessionController extends Controller
{
    public function __construct()
    {  
        $this->middleware('auth');
         if (Auth::user()->getRol()=="Administrador") {
            $this->middleware('administrator'); 
        }elseif(Auth::user()->getRol()=="Institución"){
            $this->middleware('institution'); 
        }elseif(Auth::user()->getRol()=="Gestor"){
            $this->middleware('agent',['only'=>['create','edit','store','destroy','update']]);
            
        }
    }

    public function index()
    {   
        if(Auth::user()->getRol()=="Gestor"){
            $entities=Entity::getEntities(Auth::user()->idEntity());
            $concessions=Concession::concessionForAgent(Auth::user()->idEntity());
        }else{
            $entities=Entity::all();
            $concessions=Concession::all();
        }
        
        
        $view=Auth::user()->getView();
        
        return view('concessions.index',compact('concessions','view','entities'));
    }

    public function create()
    {   $name="Gestor";
        $view=Auth::user()->getView();
        $resolutions=Resolution::all();
        $files=File::all();
        $fileTypes=Filetype::all();
        $viabilities=Viability::all();
        $entities=Entity::getEntities(Auth::user()->extractIdRol($name));
        return view('concessions.create',compact('resolutions','files','fileTypes','viabilities','view','entities'));
    }

    public function store(CreateConcessionRequest $request)
    {
        
        if (!$this->existEntityId($request->input('agent_id'))) {
            return redirect()->to('concesiones/create')->withInput()->withErrors(array('invalid' => 'El gestor  seleccionada no existe'));
        }
            
        if ((Auth::user()->extractRol($request->input('agent_id'))=="Administrador")||(Auth::user()->extractRol($request->input('agent_id'))=="Institución")) {
              
            return redirect()->to('concesiones/create')->withInput()->withErrors(array('invalid' => 'La gestor seleccionado no es permitido')); 
         }
           
        if (!$this->existResolutionId($request->input('resolution_id'))) {
           
            return redirect()->to('concesiones/create')->withInput()->withErrors(array('invalid' => 'La resolución seleccionada no existe')); 
        }
        if (!$this->existFileId($request->input('file_id'))) {
            return redirect()->to('concesiones/create')->withInput()->withErrors(array('invalid' => 'La expediente seleccionado no existe')); 
        }
        if (!$this->existFileTypeId($request->input('fileType_id'))) {
            return redirect()->to('concesiones/create')->withInput()->withErrors(array('invalid' => 'El tipo expediente seleccionado no existe'));  
        }
        if (!$this->existViabilityId($request->input('viability_id'))) {
            return redirect()->to('concesiones/create')->withInput()->withErrors(array('invalid' => 'La viabilidad seleccionada no existe'));  
        }

        $date = Carbon::now();
        $startDate = $request->input('conferment_date');
        $endDate = $request->input('due_date');  
        if (!($startDate<$endDate)) {
           
            return redirect()->to('concesiones/create')->withInput()->withErrors(array('invalid' => 'Existe un error con las fechas que a seleccionado favor revisar'));
        }
         
        $concession= new Concession($request->all());
        
         if (Input::file('path')==null) {
                 $concession->path =""; 
            }elseif($this->validateExist(Input::file('path'))){
               return redirect()->to('concesiones/create')->withInput()->withErrors(array('invalid' => 'Ya existe un archivo con ese nombre favor cambiarlo'));
            }else{

                $concession->path =Input::file('path')->getClientOriginalName();
                $this->uploadFile(Input::file('path'));
            } 
            
        $concession->created_at = $date;
        $concession->updated_at = $date;           
        $concession->save();
        return redirect()->route('concesiones.index');
    }

    public function show($id)
    {   
        $view=Auth::user()->getView();
        $resolutions=Resolution::all();
        $files=File::all();
        $fileTypes=Filetype::all();
        $viabilities=Viability::all();
        $concession = Concession::findOrFail($id);
        return view('concessions.show',compact('resolutions','files','fileTypes','viabilities','concession','view','entities'));
    }

    public function edit($id)
    {   
        if (!$this->existConcessionId($id)) {
            Session::flash('message','No existe la concesión ');
            return redirect()->route('concesiones.index');
        }


        $name="Gestor";
        $view=Auth::user()->getView();
        $resolutions=Resolution::all();
        $files=File::all();
        $fileTypes=Filetype::all();
        $viabilities=Viability::all();
        $entities=Entity::getEntities(Auth::user()->extractIdRol($name));
        $concession = Concession::findOrFail($id);
        return view('concessions.edit',compact('resolutions','files','fileTypes','viabilities','concession','view','entities'));
    }

    public function update(EditConcessionRequest $request, $id)
    {
        $date = Carbon::now();  
        $concession= Concession::findOrFail($id);
        
        if (!$this->existEntityId($request->input('agent_id'))) {
            return redirect()->to('concesiones/'.$id.'/edit')->withInput()->withErrors(array('invalid' => 'El gestor  seleccionada no existe'));
        }
            
        if ((Auth::user()->extractRol($request->input('agent_id'))=="Administrador")||(Auth::user()->extractRol($request->input('agent_id'))=="Institución")) {
              
            return redirect()->to('concesiones/'.$id.'/edit')->withInput()->withErrors(array('invalid' => 'La gestor seleccionado no es permitido')); 
         }
           
        if (!$this->existResolutionId($request->input('resolution_id'))) {
           
            return redirect()->to('concesiones/'.$id.'/edit')->withInput()->withErrors(array('invalid' => 'La resolución seleccionada no existe')); 
        }
        if (!$this->existFileId($request->input('file_id'))) {
            return redirect()->to('concesiones/'.$id.'/edit')->withInput()->withErrors(array('invalid' => 'La expediente seleccionado no existe')); 
        }
        if (!$this->existFileTypeId($request->input('fileType_id'))) {
            return redirect()->to('concesiones/'.$id.'/edit')->withInput()->withErrors(array('invalid' => 'El tipo expediente seleccionado no existe'));  
        }
        if (!$this->existViabilityId($request->input('viability_id'))) {
            return redirect()->to('concesiones/'.$id.'/edit')->withInput()->withErrors(array('invalid' => 'La viabilidad seleccionada no existe'));  
        }



        if ($request->input('agent_id')!=$concession->agent_id) {
            $concession->agent_id=$request->input('agent_id');
        }
        if ($request->input('agent_ID')!=$concession->agent_ID) {
            $concession->agent_ID=$request->input('agent_ID');
        }
        if ($request->input('resolution_id')!=$concession->resolution_id) {
            $concession->resolution_id=$request->input('resolution_id');
        }
        if ($request->input('file_id')!=$concession->file_id) {
            $concession->file_id=$request->input('file_id');
        }
        if ($request->input('fileType_id')!=$concession->fileType_id) {
            $concession->fileType_id=$request->input('fileType_id');
        } 
        if ($request->input('owner')!=$concession->owner) {
            $concession->owner=$request->input('owner');
        }
        if ($request->input('property_number')!=$concession->property_number) {
            $concession->property_number=$request->input('property_number');
        } 
        if ($request->input('water_tapping_point')!=$concession->water_tapping_point) {
            $concession->water_tapping_point=$request->input('water_tapping_point');
        } 
        if ($request->input('authorized_use')!=$concession->authorized_use) {
            $concession->authorized_use=$request->input('authorized_use');
        }
        if ($request->input('assigned_flow')!=$concession->assigned_flow) {
            $concession->assigned_flow=$request->input('assigned_flow');
        }
        if ($request->input('capacity_flow')!=$concession->capacity_flow) {
            $concession->capacity_flow=$request->input('capacity_flow');
        }
        if ($request->input('viability_id')!=$concession->viability_id) {
            $concession->viability_id=$request->input('viability_id');
        }      

        if (($request->input('conferment_date')=="")||($request->input('due_date')=="")) {
           
        }else{
            
            $startDate = $request->input('conferment_date');
            $endDate = $request->input('due_date');  
            if (!($startDate<$endDate)) {
           
                return redirect()->to('concesiones/'.$id.'/edit')->withInput()->withErrors(array('invalid' => 'Existe un error con las fechas que a seleccionado favor revisar'));
            }else{
                $concession->conferment_date=$request->input('conferment_date');
                $concession->due_date=$request->input('due_date');
            } 
        }




        if (Input::file('path')==null) {
            $concession->path =$concession->path;  
           
        }else{

            if ($this->validateExist(Input::file('path'))) {
                 return redirect()->to('concesiones/'.$id.'/edit')->withInput()->withErrors(array('invalid' => 'Ya existe un archivo con ese nombre favor cambiarlo'));
            }else{
               
                if (!($concession->path=="")) {
                    
                    $this->deleteFile($concession->path);
                }
               
                $concession->path =Input::file('path')->getClientOriginalName();
                $this->uploadFile(Input::file('path'));
            }
            
                
            
        }
       
        $concession->updated_at = $date; 
        $concession->save();
        return redirect()->route('concesiones.index');
    }

    public function destroy($id)
    {
        if (!$this->existConcessionId($id)) {
            Session::flash('message','No existe la concesión ');
            return redirect()->route('concesiones.index');
        }
        $concession= Concession::findOrFail($id);
        $concession->delete($id);
        Session::flash('message','Fue eliminado de nuestros registros.');
        return redirect()->route('concesiones.index');
    }

     public function validateExist($file){ 
        $name=$file->getClientOriginalName();
        $exists = Storage::disk('local')->has($name);
        return $exists;  
    } 
     public function uploadFile($file){
        $name=$file->getClientOriginalName();
        Storage::disk('local')->put($name,\File::get($file));
     } 

      public function existConcessionId($id){
        $exist=False;
        $concessions=Concession::all();
        foreach ($concessions as $concession ) {
            if ($id==$concession->id) {
               $exist=True; 
            } 
        }
        return $exist; 
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
    public function existResolutionId($id){
        $exist=False;
        $resolutions=Resolution::all();
        foreach ($resolutions as $resolution ) {
            if ($id==$resolution->id) {
               $exist=True; 
            } 
        }
        return $exist; 
    }
     public function existFileId($id){
        $exist=False;
        $files=File::all();
        foreach ($files as $file ) {
            if ($id==$file->id) {
               $exist=True; 
            } 
        }
        return $exist; 
    }
    public function existFileTypeId($id){
        $exist=False;
        $fileTypes=Filetype::all();
        foreach ($fileTypes as $fileType ) {
            if ($id==$fileType->id) {
               $exist=True; 
            } 
        }
        return $exist; 
    }

    public function existViabilityId($id){
        $exist=False;
        $viabilities=Viability::all();
        foreach ($viabilities as $viability ) {
            if ($id==$viability->id) {
               $exist=True; 
            } 
        }
        return $exist; 
    }
    public function deleteFile($name){
        Storage::delete($name);
     } 

}
