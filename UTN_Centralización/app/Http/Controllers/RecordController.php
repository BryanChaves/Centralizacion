<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\RecordRequest;
use App\Http\Controllers\Controller;
use App\Record;
use App\Parameter;
use App\Sampling;
use App\Watersource;
use Auth;
use Carbon\Carbon;
use Redirect;
use Session;

class RecordController extends Controller
{
    public function __construct()
    {  
        $this->middleware('auth');
        if (Auth::user()->getRol()=="Administrador") {
            $this->middleware('administrator'); 
        }elseif(Auth::user()->getRol()=="Institución"){
            $this->middleware('institution'); 
        }elseif(Auth::user()->getRol()=="Gestor"){
            $this->middleware('agent',['only'=>['create','edit','store','destroy','update','show']]);
            
        }
        
    }

    public function index()
    {
       
        $view=Auth::user()->getView();
        $parameters=Parameter::all();
        if (Auth::user()->getRol()=="Gestor") {
            $records=Record::recordsForSmpling($this->idWatersource());
           
        }else{
           $records=Record::all(); 
        }
        $samplings=Sampling::all();
        
       
        return view('records.index',compact('records','parameters','samplings','view'));
    }

    public function create()
    {   
        $view=Auth::user()->getView();
        $parameters=Parameter::all();
        $samplings=Sampling::all();
        return view('records.create',compact('parameters','samplings','view'));
    }

    public function store(RecordRequest $request)
    {
        if (!$this->existParameterId($request->input('parameter_id'))) {
           return redirect()->route('registros.create')->withInput()->withErrors(array('invalid' => 'El parámetro seleccionado ya no existe'));  
        }
        if (!$this->existSamplingId($request->input('sampling_id'))) {
           return redirect()->route('registros.create')->withInput()->withErrors(array('invalid' => 'El parámetro seleccionado ya no existe'));  
        }
        if ($this->existRecord($request->input('parameter_id'),$request->input('sampling_id'))) {
            return redirect()->route('registros.create')->withInput()->withErrors(array('invalid' => 'Ya existe ese registro'));  
        }
        
        $date = Carbon::now();        
        $record= new Record($request->all());
        $record->created_at = $date;
        $record->updated_at = $date;           
        $record->save();
        return redirect()->route('registros.index'); 
    }

    public function show($id)
    {
        return redirect()->route('registros.index');
    }

    public function edit($id)
    {   
        if (!$this->existRecordId($id)) {
           Session::flash('message','El registro no existe');
            return redirect()->route('registros.index');  
        }

        $view=Auth::user()->getView();
        $parameters=Parameter::all();
        $samplings=Sampling::all();
        $record = Record::findOrFail($id);
        return view('records.edit',compact('record','parameters','samplings','view'));
    }

    public function update(RecordRequest $request, $id)
    {   
        if (!$this->existParameterId($request->input('parameter_id'))) {
           return redirect()->to('registros/'.$id.'/edit')->withInput()->withErrors(array('invalid' => 'El parámetro seleccionado ya no existe'));  
        }
        if (!$this->existSamplingId($request->input('sampling_id'))) {
           return redirect()->to('registros/'.$id.'/edit')->withInput()->withErrors(array('invalid' => 'El parámetro seleccionado ya no existe'));  
        }
        $date = Carbon::now();  
        $record= Record::findOrFail($id);
      
        if ($record->parameter_id!=$request->input('parameter_id')) {
            $record->parameter_id=$request->input('parameter_id');
        }
        if ($record->sampling_id!=$request->input('sampling_id')) {
            $record->sampling_id=$request->input('sampling_id');
        }
                
                
        

        $record->updated_at = $date; 
        $record->save();
        return redirect()->route('registros.index');
    }

    public function destroy($id)
    {   
        if (!$this->existRecordId($id)) {
           Session::flash('message','El registro no existe');
            return redirect()->route('registros.index');  
        }
        $record= Record::findOrFail($id);
        $record->delete($id);
        Session::flash('message','fue eliminado de nuestros registros.');
        return redirect()->route('registros.index');  
    }

    public function idWatersource(){
        $watersources=Watersource::watersourceAgent(Auth::user()->idEntity());
        $id=0;
        foreach ($watersources as $watersource ) {
            $id=$watersource->id;
        }
        return $id;
    }
    public function existRecordId($id){
        $exist=False;
        $records=Record::all();
        foreach ($records as $record ) {
            if ($id==$record->id) {
               $exist=True; 
            } 
        }
        return $exist; 
    }
    public function existRecord($parameter_id,$sampling_id){
        $exist=False;
        $records=Record::all();
        foreach ($records as $record ) {
            if (($parameter_id==$record->parameter_id)&&($sampling_id==$record->sampling_id)) {
               $exist=True; 
            } 
        }
        return $exist; 
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
    public function existSamplingId($id){
        $exist=False;
        $samplings=Sampling::all();
        foreach ($samplings as $sampling) {
            if ($id==$sampling->id) {
               $exist=True; 
            } 
        }
        return $exist; 
    }

}
