<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\ParameterRequest;
use App\Http\Controllers\Controller;
use App\Parameter;
use Auth;
use Carbon\Carbon;
use Redirect;
use Session;

class ParameterController extends Controller
{
    public function __construct()
    {  
        $this->middleware('auth');
        $this->middleware('administrator'); 
    }

    public function index()
    {  
        $view=Auth::user()->getView();
        $parameters=Parameter::all();
        return view('parameters.index',compact('parameters','view'));
    }

    public function create()
    {   
        $view=Auth::user()->getView();
        return view('parameters.create',compact('view'));
    }

    public function store(ParameterRequest $request)
    {
        if ($this->existParameter($request->input('parameter'))) {
          return redirect()->route('parametros.create')->withInput()->withErrors(array('invalid' => 'Ya existe un parámetro con ese nombre favor cambiarlo'));  
        }    

        $date = Carbon::now();        
        $parameter= new Parameter($request->all());
        $parameter->created_at = $date;
        $parameter->updated_at = $date;           
        $parameter->save();
        return redirect()->route('parametros.index');
    }

    public function show($id)
    {
        
    }

    public function edit($id)
    {   
        if (!$this->existParameterId($id)) {
           Session::flash('message','El parámetro a editar no existe'); 
           return redirect()->route('parametros.index');
        }

        $view=Auth::user()->getView();
        $parameter = Parameter::findOrFail($id);
        return view('parameters.edit',compact('parameter','view'));
    }

    public function update(ParameterRequest $request, $id)
    {
        $date = Carbon::now(); 
        $parameter= Parameter::findOrFail($id);
        $parameter->fill($request->all());
        $parameter->updated_at = $date; 
        $parameter->save();
        return redirect()->route('parametros.index');
    }

    public function destroy($id)
    {
        if (!$this->existParameterId($id)) {
           Session::flash('message','El parámetro a eliminar no existe'); 
           return redirect()->route('parametros.index');
        }
        $parameter= Parameter::findOrFail($id);
        $parameter->delete($id);
        Session::flash('message','fue eliminado de nuestros registros.');
        return redirect()->route('parametros.index'); 
    }

    public function existParameter($name){
        
        $status=False;
        $parameters=Parameter::all();
        
        foreach ($parameters as $parameter ) {
            if ((strtolower($parameter->parameter))==(strtolower($name))) {
                $status=True;
            }
            
        }

        return $status;
    }

     public function existParameterId($id){
        $exist=False;
        $parameters=Parameter::all();
        foreach ($parameters as $parameter) {
            if ($id==$parameter->id) {
               $exist=True; 
            } 
        }
        return $exist; 
    }

}
