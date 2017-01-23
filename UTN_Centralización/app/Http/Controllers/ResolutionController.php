<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\ResolutionRequest;
use App\Http\Controllers\Controller;
use App\Resolution;
use Redirect;
use Session;
use Carbon\Carbon;
use Auth;

class ResolutionController extends Controller
{
    public function __construct()
    {  
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
        $resolutions=Resolution::all();
       
        return view('resolutions.index',compact('resolutions','view'));
    }

    public function create()
    {
        $view=Auth::user()->getView();
        return view('resolutions.create',compact('view'));
    }

    public function store(ResolutionRequest $request)
    {
        if ($this->exist($this->removeSpace($request->input('num_resolution')))) {
            return redirect()->to('resoluciones/create')->withInput()->withErrors(array('invalid' => 'Ya existe el tipo de expediente por favor digite uno distinto')); 
        } 

        $date = Carbon::now();
      
        $resolution= new Resolution($request->all());
        $resolution->created_at = $date;
        $resolution->updated_at = $date;           
        $resolution->save();
        return redirect()->route('resoluciones.index');
    }

    public function show($id)
    {   
      return redirect()->route('resoluciones.index');
    }

    public function edit($id)
    {   

        if (!$this->existResolutionId($id)) {
            Session::flash('message','La resolución no existe');
            return redirect()->route('resoluciones.index');
        }
        $view=Auth::user()->getView();
        $resolution = Resolution::findOrFail($id);
        return view('resolutions.edit', compact('resolution','view'));
    }

    public function update(ResolutionRequest $request,$id)
    {
        $date = Carbon::now(); 
        $resolution= Resolution::findOrFail($id);

        if ((strtolower($this->removeSpace($resolution->num_resolution)))!=(strtolower($this->removeSpace($request->input('num_resolution'))))){
           if ($this->exist($request->input('num_resolution'))) {
                return redirect()->to('resoluciones/'.$id.'/edit')->withInput()->withErrors(array('invalid' => 'Ya existe la resolución por favor digite uno distinto')); 
            }
        }
        $resolution->fill($request->all());
        $resolution->updated_at = $date; 
        $resolution->save();
        return redirect()->route('resoluciones.index');
    }

    public function destroy($id)
    {   
        if (!$this->existResolutionId($id)) {
            Session::flash('message','La resolución no existe');
            return redirect()->route('resoluciones.index');
        }
        $resolution= Resolution::findOrFail($id);
        $resolution->delete($id);
        Session::flash('message','Fue eliminado de nuestros registros.');
        return redirect()->route('resoluciones.index');
    }

     public function exist($name){
        $status=False;
        $resolutions=Resolution::all();
       
        
        foreach ($resolutions as $resolution ) {
            if ((strtolower($this->removeSpace($resolution->num_resolution)))==(strtolower($this->removeSpace($name)))) {
                $status=True;
            }
            
        }

        return $status;
    }

    public function removeSpace($name){
        $name = str_replace(' ', '', $name);
        return $name;
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

}
