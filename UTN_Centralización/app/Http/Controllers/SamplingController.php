<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\SamplingRequest;
use App\Http\Controllers\Controller;
use App\Samplingsite;
use App\Sampling;
use Redirect;
use Session;
use Auth;
use Carbon\Carbon;
use App\Watersource;

class SamplingController extends Controller
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
        
        if (Auth::user()->getRol()=="Gestor") {
            $samplings=Sampling::samplingAgent($this->idWatersource()); 
            
        }else{
            $samplings=Sampling::all();
        }

        return view('samplings.index',compact('samplings','view'));
    }

    public function create()
    {   
        $view=Auth::user()->getView();
        $samplingSites=Samplingsite::all();
        return view('samplings.create',compact('samplingSites','view'));
    }

    public function store(SamplingRequest $request)
    {
        $sampling_id = (int)$request->input('sampling_site_id');
        $count = Sampling::count($sampling_id);
        $date = Carbon::now();        
        $sampling= new Sampling($request->all()); 
        if($count==0){
            $sampling->consecutive = 1;
        }else{
            $sampling->consecutive = $count+1;
        }
        $sampling->created_at = $date;
        $sampling->updated_at = $date;
        $sampling->save();
        return redirect()->route('muestras.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {   
        $view=Auth::user()->getView();
        $samplingSites=Samplingsite::all();
        $sampling = Sampling::findOrFail($id);
        return view('samplings.edit', compact('sampling','samplingSites','view'));
    }

    public function update(SamplingRequest $request, $id)
    {   
        $date = Carbon::now(); 
        $sampling= Sampling::findOrFail($id);
        $sampling->fill($request->all());
        $sampling->updated_at = $date; 
        $sampling->save();
        return redirect()->route('muestras.index');
    }

    public function destroy($id)
    {   
       
        $sampling= Sampling::findOrFail($id);
        $sampling->delete($id);
        Session::flash('message','Fue eliminado de nuestros registros.');
        return redirect()->route('muestras.index');
    }

    public function idWatersource(){
        $watersources=Watersource::watersourceAgent(Auth::user()->idEntity());
        $id=0;
        foreach ($watersources as $watersource ) {
            $id=$watersource->id;
        }
        return $id;
    }
}
