<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;
use App\Http\Requests\ViabilityRequest;
use App\Http\Controllers\Controller;
use App\Viability;
use App\Province;
use App\Canton;
use App\District;
use Redirect;
use Session;
use Carbon\Carbon;
use Auth;
use Input;
use Storage;

class ViabilityController extends Controller
{
    public function __construct()
    {  
        $this->middleware('auth');
        $this->middleware('auth');
        if (Auth::user()->getRol()=="Administrador") {
            $this->middleware('administrator'); 
        }else{
            $this->middleware('institution'); 
        }
    }
    
    public function index()
    {   
        $view=Auth::user()->getView();   
        $provinces=Province::all();
        $viabilities=Viability::all();
        
        return view('viabilities.index',compact('viabilities','provinces','view'));
    }

    public function create()
    {   
        $view=Auth::user()->getView();
        return view('viabilities.create', compact('provinces','view'));
    }
    
    public function store(ViabilityRequest $request)
    {
        if (!$this->existProvinceId($request->input('province'))) {
            return redirect()->to('viabilidades/create')->withInput()->withErrors(array('invalid' => 'La provincia no existe')); 
        }
        if (!$this->existCantonId($request->input('canton'))) {
            return redirect()->to('viabilidades/create')->withInput()->withErrors(array('invalid' => 'El Cantón no existe')); 
        }
       
        if (!$this->existDistrictId($request->input('district'))) {
            return redirect()->to('viabilidades/create')->withInput()->withErrors(array('invalid' => 'La distrito no existe')); 
        }
        if ($this->exist("setena_administrative_record",$this->removeSpace($request->input('setena_administrative_record')))) {
            return redirect()->to('viabilidades/create')->withInput()->withErrors(array('invalid' => 'Ya existe el expediente por favor cambiar')); 
        }
        if ($request->input('viability_number')!="") {

            if ($this->exist("viability_number",$this->removeSpace($request->input('viability_number')))) {
                return redirect()->to('viabilidades/create')->withInput()->withErrors(array('invalid' => 'Ya existe el número de viabilidad por favor cambiar')); 
            }
        }

       
        $date = Carbon::now();       
        $viability= new Viability($request->all());
        if (Input::file('path')==null) {
                 $viability->path =""; 
            }elseif($this->validateExist(Input::file('path'))){
               return redirect()->to('viabilidades/create')->withInput()->withErrors(array('invalid' => 'Ya existe un archivo con ese nombre favor cambiarlo'));
            }else{

                $viability->path =Input::file('path')->getClientOriginalName();
                $this->uploadFile(Input::file('path'));
            } 
        $viability->created_at = $date;
        $viability->updated_at = $date;           
        $viability->save();
        return redirect()->route('viabilidades.index');
    }

    public function show($id)
    {   $view=Auth::user()->getView();
        $provinces=Province::all();
        $cantons=Canton::all();
        $districts=District::all();
        $viability = Viability::findOrFail($id);
        return view('viabilities.show', compact('viability','provinces','cantons','districts','view'));
    }

    public function edit($id)
    {   
        if ($this->existViabilityId($id)==False) {
            Session::flash('message','La viabilidad no existe');
            return redirect()->route('viabilidades.index');
        }
        $view=Auth::user()->getView();
        $provinces=Province::all();
        $cantons=Canton::all();
        $districts=District::all();
        $viability = Viability::findOrFail($id);
        return view('viabilities.edit', compact('viability','provinces','cantons','districts','view'));
    }

    public function update(ViabilityRequest $request,$id)
    {   
        if (!$this->existProvinceId($request->input('province'))) {
            return redirect()->to('viabilidades/'.$id.'/edit')->withInput()->withErrors(array('invalid' => 'La provincia no existe')); 
        }
        if (!$this->existCantonId($request->input('canton'))) {
            return redirect()->to('viabilidades/'.$id.'/edit')->withInput()->withErrors(array('invalid' => 'El Cantón no existe')); 
        }
       
        if (!$this->existDistrictId($request->input('district'))) {
            return redirect()->to('viabilidades/'.$id.'/edit')->withInput()->withErrors(array('invalid' => 'La distrito no existe')); 
        }
         

        
        $date = Carbon::now();  
        $viability= Viability::findOrFail($id);
        if ($viability->project_name!=$request->input('project_name')) {
            $viability->project_name=$request->input('project_name');
        }
        if ($viability->viability_number!=$request->input('viability_number')) {
            if ($this->exist("viability_number",$this->removeSpace($request->input('viability_number')))) {
                return redirect()->to('viabilidades/'.$id.'/edit')->withInput()->withErrors(array('invalid' => 'Ya existe el número de viabilidad por favor cambiar')); 
            }
        }
        if ($viability->setena_administrative_record!=$request->input('setena_administrative_record')) {
            if ($this->exist("setena_administrative_record",$this->removeSpace($request->input('setena_administrative_record')))) {
            return redirect()->to('viabilidades/'.$id.'/edit')->withInput()->withErrors(array('invalid' => 'Ya existe el expediente por favor cambiar')); 
            }
        }
        if ($viability->cadrastal_plane_number!=$request->input('cadrastal_plane_number')) {
            $viability->cadrastal_plane_number=$request->input('cadrastal_plane_number');
        }
        if ($viability->property_number!=$request->input('property_number')) {
            $viability->property_number=$request->input('property_number');
        }
        if ($viability->province!=$request->input('province')) {
            $viability->province=$request->input('province');
        }
        if ($viability->canton!=$request->input('canton')) {
            $viability->canton=$request->input('canton');
        }
        if ($viability->district!=$request->input('district')) {
            $viability->district=$request->input('district');
        }
        if ($viability->coordinate!=$request->input('coordinate')) {
            $viability->coordinate=$request->input('coordinate');
        }

        if (Input::file('path')==null) {
            $viability->path =$viability->path;  
           
        }else{

            if ($this->validateExist(Input::file('path'))) {
                 return redirect()->to('viabilidades/'.$id.'/edit')->withInput()->withErrors(array('invalid' => 'Ya existe un archivo con ese nombre favor cambiarlo'));
            }else{
               
                if (!($viability->path=="")) {
                    
                    $this->deleteFile($concession->path);
                }
               
                $viability->path =Input::file('path')->getClientOriginalName();
                $this->uploadFile(Input::file('path'));
            }
            
                
            
        }
        $viability->updated_at = $date; 
        $viability->save();
        return redirect()->route('viabilidades.index');
    }

    public function destroy($id)
    {   
        if ($this->existViabilityId($id)==False) {
            Session::flash('message','La viabilidad no existe');
            return redirect()->route('viabilidades.index');
        }
        $viability= Viability::findOrFail($id);
        $viability->delete($id);
        Session::flash('message','Fue eliminado de nuestros registros.');
        return redirect()->route('viabilidades.index');
    }
    
    public function canton($value)
    {  
        $id=(int)$value;
        $cantons=Canton::getCanton($id);
        return response()->json($cantons); 
    }
    
    public function district($value)
    {  
        $id=(int)$value;
        $districts=District::getDistrict($id);
        return response()->json($districts); 
    }

    public function existProvinceId($id){
        $exist=False;
        $provinces=Province::all();
        foreach ($provinces as $province ) {
            if ($id==$province->id) {
               $exist=True; 
            } 
        }
        return $exist; 
    }
     public function existCantonId($id){
        $exist=False;
        $cantons=Canton::all();
        foreach ($cantons as $canton ) {
            if ($id==$canton->id) {
               $exist=True; 
            } 
        }
        return $exist; 
    }
    public function existDistrictId($id){
        $exist=False;
        $districts=District::all();
        foreach ($districts as $district ) {
            if ($id==$district->id) {
               $exist=True; 
            } 
        }
        return $exist; 
    }
    public function exist($consult,$num){
        $status=False;
        $viabilities=Viability::all();
       
        
        foreach ($viabilities as $viability ) {
            if ((strtolower($this->removeSpace($viability->$consult)))==(strtolower($this->removeSpace($num)))) {
                $status=True;
            }
            
        }

        return $status;
    }

    public function removeSpace($name){
        $name = str_replace(' ', '', $name);
        return $name;
    }

    public function existViabilityId($id){
        $status=False;
        $viabilities=Viability::all();
         foreach ($viabilities as $viability ) {
            if ($viability->id==$id) {
               $status=True;
            }
            
        }
        return  $status;
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
    public function deleteFile($name){
        Storage::delete($name);
     } 
}
