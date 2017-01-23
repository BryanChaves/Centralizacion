<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\SamplingsiteRequest;
use App\Http\Controllers\Controller;
use App\Samplingsite;
use App\Entity;
use Redirect;
use Session;
use Auth;
use Carbon\Carbon;

class SamplingsiteController extends Controller
{
    public function __construct()
    {  
        $this->middleware('auth');
        if (Auth::user()->getRol()=="Administrador") {
            $this->middleware('administrator'); 
        }elseif(Auth::user()->getRol()=="Institución"){
            $this->middleware('institution'); 
        }elseif(Auth::user()->getRol()=="Gestor"){
            $this->middleware('agent',['only'=>['show']]);
        }
    } 

    public function index(Request $request)
    {   
        $view=Auth::user()->getView();
        
        if (Auth::user()->getRol()=="Gestor") {
             $samplingSites=Samplingsite::allAgent();       
        }else{
             $samplingSites=Samplingsite::all();       
                    
        }
        $entities=Entity::all();
        return view('samplingSites.index',compact('samplingSites','view','entities'));
    }

    public function create()
    {   
        $view=Auth::user()->getView();
        return view('samplingSites.create',compact('view'));
    }

    public function store(SamplingsiteRequest $request)
    {   
           
            $date = Carbon::now();       
            $sampling_site= new Samplingsite($request->all());

            if (Auth::user()->getRol()=="Gestor") {
            
            $sampling_site->agent_id = Auth::user()->idEntity();
            
            }
            
            if ($this->exist($this->removeSpace($request->input('name')))) {
                
                return redirect()->to('sitios-muestreo/create')->withInput()->withErrors(array('invalid' => 'Ya existe un sitio de muestreo con ese nombre favor cambiarlo')); 
            }
            $sampling_site->agent_id = Auth::user()->idEntity();
            $sampling_site->created_at = $date;
            $sampling_site->updated_at = $date;           
            $sampling_site->save();

            return redirect()->route('sitios-muestreo.index');
    }

    public function show($id)
    {
        return redirect()->route('sitios-muestreo.index');
    }

    public function edit($id)
    {   
        $view=Auth::user()->getView();
        $sampling_site = Samplingsite::findOrFail($id);
        return view('samplingSites.edit', compact('sampling_site','view'));
    }

    public function update(SamplingsiteRequest $request,$id)
    {
            
            $date = Carbon::now(); 
            $sampling_site= Samplingsite::findOrFail($id);
            if ($sampling_site->name!=$request->input('name')) {
                if ($this->exist($this->removeSpace($request->input('name')))) {
                    return redirect()->to('sitios-muestreo/'.$id.'/edit')->withInput()->withErrors(array('invalid' => 'Ya existe un sitio de muestreo con ese nombre favor cambiarlo')); 
                }
            }
            $sampling_site->fill($request->all());
            $sampling_site->updated_at = $date; 
            $sampling_site->save();
            return redirect()->route('sitios-muestreo.index');
        
       
    }

    public function destroy($id)
    {
        $sampling_site= Samplingsite::findOrFail($id);
        $sampling_site->delete($id);
        Session::flash('message','Fue eliminado de nuestros registros.');
        return redirect()->route('sitios-muestreo.index');
    }

    
    public function removeSpace($name){
        $name = str_replace(' ', '', $name);
        return $name;
    }

    public function exist($name){
        
        $exist=False;
        $Samplingsites=Samplingsite::all();
        foreach ($Samplingsites as $Samplingsite ) {
            if ($name==$this->removeSpace($Samplingsite->name)) {
               $exist=True; 
            } 
        }
        return $exist; 
    }
    
    
    
    


}
