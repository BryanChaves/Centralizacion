<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CreateFlow_MeasurementRequest;
use App\Http\Requests\EditFlow_MeasurementRequest;
use App\Http\Controllers\Controller;
use App\Flow_Measurement;
use App\Watersource;
use Redirect;
use Session;
use Carbon\Carbon;
use Auth;

class Flow_MeasurementController extends Controller
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
            
        }
    } 

    public function index()
    {
        $view=Auth::user()->getView();
        if (Auth::user()->getRol()=="Gestor") {
            $flow_Measurements=Flow_Measurement::flowAgent($this->idWatersource());
        }else{
            $flow_Measurements=Flow_Measurement::all();
        }
        
        $watersources=Watersource::all();
        return view('flow_Measurements.index',compact('flow_Measurements','watersources','view'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $view=Auth::user()->getView();
        $watersources=Watersource::all();
        return view('flow_Measurements.create',compact('view','watersources'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(CreateFlow_MeasurementRequest $request)
    {   
        $capacity = $request->input('capacity');
        $date = Carbon::now();        
        $flow_measurement= new Flow_Measurement($request->all());
        $flow_measurement->capacity = $capacity;
        $flow_measurement->created_at = $date;
        $flow_measurement->updated_at = $date;           
        $flow_measurement->save();
        return redirect()->route('medicion-caudal.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $view=Auth::user()->getView();
        $flow_measurement = Flow_Measurement::findOrFail($id);
        $watersources=Watersource::all();
        return view('flow_Measurements.edit',compact('flow_measurement','view','watersources'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(EditFlow_MeasurementRequest $request, $id)
    {   
        $capacity = $request->input('capacity');
        $date = Carbon::now();  
        $flow_measurement= Flow_Measurement::findOrFail($id);
        $flow_measurement->fill($request->all());
        $flow_measurement->capacity = $capacity;
        $flow_measurement->updated_at = $date; 
        $flow_measurement->save();
        return redirect()->route('medicion-caudal.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $flow_measurement= Flow_Measurement::findOrFail($id);
        $flow_measurement->delete($id);
        Session::flash('message','Fue eliminado de nuestros registros.');
        return redirect()->route('medicion-caudal.index');
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
