<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\WatersourceRequest;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Watersource;
use Redirect;
use Session;
use Auth;

class WatersourceController extends Controller
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
        $view=Auth::user()->getView();
        if(Auth::user()->getRol()=="Gestor"){ 

            $watersources=Watersource::watersourceAgent(Auth::user()->idEntity());
            
        }else{
            $watersources=Watersource::all();
        }
        
        
        return view('watersources.index',compact('watersources','view'));
    }

    public function create()
    {
        $view=Auth::user()->getView();
        return view('watersources.create',compact('view'));
    }

    public function store(WatersourceRequest $request)
    {   
        if ($this->exist($this->removeSpace($request->input('watersource_name')))) {
            return redirect()->to('nacientes/create')->withInput()->withErrors(array('invalid' => 'Ya existe una naciente con ese nombre favor cambiarlo')); 
        }
        $date = Carbon::now();
        $watersource= new Watersource($request->all());
        $watersource->created_at = $date;
        $watersource->updated_at = $date;           
        $watersource->save();
        return redirect()->route('nacientes.index');
    }

    public function show($id)
    {
        return redirect()->route('nacientes.index');
    }

    public function edit($id)
    {   
        if (!$this->existWatersourceId($id)) {
            Session::flash('message','No existe la naciente');
            return redirect()->route('nacientes.index');
        }

        $view=Auth::user()->getView();
        $watersource = Watersource::findOrFail($id);
        return view('watersources.edit',compact('watersource','view'));
    }

    public function update(WatersourceRequest $request,$id)
    {
        $date = Carbon::now();  
        $watersource= Watersource::findOrFail($id);
        if ((strtolower($this->removeSpace($watersource->watersource_name)))!=(strtolower($this->removeSpace($request->input('watersource_name'))))){
           if ($this->exist($request->input('watersource_name'))) {
                return redirect()->to('nacientes/'.$id.'/edit')->withInput()->withErrors(array('invalid' => 'Ya existe una naciente con ese nombre por favor digite uno distinto')); 
            }
        }
        $watersource->fill($request->all());
        $watersource->updated_at = $date; 
        $watersource->save();
        return redirect()->route('nacientes.index');  
    }

    public function destroy($id)
    {   
        if (!$this->existWatersourceId($id)) {
            Session::flash('message','No existe la naciente');
            return redirect()->route('nacientes.index');
        }
        $watersource= Watersource::findOrFail($id);
        $watersource->delete($id);
        Session::flash('message',$watersource->sampling_site_name.' ' .'fue eliminado de nuestros registros.');
        return redirect()->route('nacientes.index');
    }

    public function exist($name){
        $status=False;
        $watersources=Watersource::all();
       
        
        foreach ($watersources as $watersource ) {
            if ((strtolower($this->removeSpace($watersource->watersource_name)))==(strtolower($this->removeSpace($name)))) {
                $status=True;
            }
            
        }

        return $status;
    }

    public function removeSpace($name){
        $name = str_replace(' ', '', $name);
        return $name;
    }

    public function existWatersourceId($id){
        $exist=False;
        $watersources=Watersource::all();
        foreach ($watersources as $watersource ) {
            if ($id==$watersource->id) {
               $exist=True; 
            } 
        }
        return $exist; 
    }

}
