<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\ParameterlevelRequest;
use App\Http\Controllers\Controller;
use App\Parameter;
use App\Parameterlevel;
use Auth;
use Carbon\Carbon;
use Redirect;
use Session;

class ParameterlevelController extends Controller
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
        $parameterLevels=Parameterlevel::all();
        
        return view('parameterLevels.index',compact('parameterLevels','parameters','view'));
    }

    public function create()
    {   
        $view=Auth::user()->getView();
        $parameters=Parameter::all();
        return view('parameterLevels.create',compact('parameters','view'));
    }

    public function store(ParameterlevelRequest $request)
    {
        
        if (!$this->existParameterId($request->input('parameter_id'))) {
          
           return redirect()->to('nivel-parametros/create')->withInput()->withErrors(array('invalid' => 'El parámetro seleccionado no existe'));
        }
        if ($this->existParameterlevel($request->input('parameter_id'))) {

            return redirect()->to('nivel-parametros/create')->withInput()->withErrors(array('invalid' => 'El parámetro seleccionado ya fue vinculado a un nivel'));
        }

        $date = Carbon::now();        
        $parameter_level= new Parameterlevel($request->all());
        $parameter_level->created_at = $date;
        $parameter_level->updated_at = $date;           
        $parameter_level->save();
        return redirect()->route('nivel-parametros.index');
    }

    public function show($id)
    {
        return redirect()->route('nivel-parametros.index');
    }

    public function edit($id)
    {   
        if (!$this->existParameterlevelId($id)) {
            Session::flash('message','El nivel parámetro no existe');
            return redirect()->route('nivel-parametros.index');
        }

        $view=Auth::user()->getView();
        $parameters=Parameter::all();
        $parameterLevel = Parameterlevel::findOrFail($id);
        return view('parameterLevels.edit',compact('parameterLevel','parameters','view'));
    }

    public function update(ParameterlevelRequest $request, $id)
    {
        $date = Carbon::now();  
        $parameter_level= Parameterlevel::findOrFail($id);
        $parameter_level->fill($request->all());
        $parameter_level->updated_at = $date; 
        $parameter_level->save();
        return redirect()->route('nivel-parametros.index');
    }

    public function destroy($id)
    {   

        if (!$this->existParameterlevelId($id)) {
            Session::flash('message','El nivel parámetro no existe');
            return redirect()->route('nivel-parametros.index');
        }
        $parameter_level= Parameterlevel::findOrFail($id);
        $parameter_level->delete($id);
        Session::flash('message','fue eliminado de nuestros registros.');
        return redirect()->route('nivel-parametros.index');
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
    public function existParameterlevelId($id){
        $exist=False;
        $parameterLevels=Parameterlevel::all();
        foreach ($parameterLevels as $parameterLevel) {
            if ($id==$parameterLevel->id) {
               $exist=True; 
            } 
        }
        return $exist; 
    }
    public function existParameterlevel($id){
        $exist=False;
        $parameterLevels=Parameterlevel::all();
        foreach ($parameterLevels as $parameterLevel) {
            if ($id==$parameterLevel->parameter_id) {
               $exist=True; 
            } 
        }
        return $exist; 
    }
}
