<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\ReportCapacityRequest;
use App\Http\Controllers\Controller;
use App\Watersource;
use App\Flow_Measurement;
use App\Samplingsite;
use Auth;
use Carbon\Carbon;
use Redirect;
use Session;

class ReportcapacityController extends Controller
{
     public function __construct()
    {  
        $this->middleware('auth');
        //$this->middleware('rol');
    }

    public function index(Request $request)
    {   
        $view=Auth::user()->getView();
        $lugars=Samplingsite::all();
        $wates=Watersource::all();
        
        return view('reports.capacity.index',compact('lugars','wates','view'));
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(ReportCapacityRequest $request)
    {   
        $view=Auth::user()->getView();
        $puntoControl = $request->input('F1');
        $id_comboMostrar = $request->input('combo');
        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');
        $estructura ="";
        $tipo = Auth::user()->getRol();
        $idEntity=Auth::user()->idEntity();

        if($puntoControl == "watersource")
        {
            if ($startDate<$endDate) 
            {
                if($id_comboMostrar == "todos")
                {
                    if($tipo == "Gestor")
                    {
                        $estructura =" and e.id =".$idEntity;
                    }
                    $aforos = \DB::select("select fm.id, fm.capacity, fm.method, fm.observations, fm.date, fm.weather, w.watersource_name as name from flow_measurement fm
                        inner join watersource w on w.id = fm.watersource_id
                        inner join concession_watersource cw on cw.watersource_id = w.id
                        inner join concession c on c.id = cw.concession_id
                        inner join entity e on e.id = c.agent_id".$estructura.
                        " where fm.date  >= '$startDate'  and 
                       fm.date <= '$endDate'");  

                    return view('reports.capacity.mostrar',compact('view','aforos'));

                }else{
                    $aforos = \DB::select("select fm.id, fm.capacity, fm.method, fm.observations, fm.date, fm.weather, w.watersource_name as name from flow_measurement fm
                        inner join watersource w on w.id = fm.watersource_id
                        inner join concession_watersource cw on cw.watersource_id = w.id
                        inner join concession c on c.id = cw.concession_id
                        inner join entity e on e.id = c.agent_id
                        where fm.watersource_id = ".$id_comboMostrar. " and 
                        fm.date >= '$startDate' and 
                        fm.date <= '$endDate' ");  
			

                    return view('reports.capacity.mostrar',compact('view','aforos'));
                }
                
            }else{
                Session::flash('message','Existe un error con las fechas favor revisar');
                return redirect()->route('aforos.index');
            }
        }else{
           if($puntoControl == "sampling_site")
           {
              if ($startDate<$endDate) 
              {
                if($id_comboMostrar == "todos")
                {
                    if($tipo == "Gestor")
                    {
                        $estructura =" and s.agent_id =".$idEntity;
                    }
                    $aforos = \DB::select("select fm.id, fm.capacity, fm.method, fm.observations, fm.date, fm.weather, s.name from flow_measurement fm
                        inner join sampling_site s on s.id = fm.sampling_site_id".$estructura. 
                        " where fm.date  >= '$startDate'  and 
                       fm.date <= '$endDate'");  

                    return view('reports.capacity.mostrar',compact('view','aforos'));
                }else{
                   $aforos = \DB::select("select fm.id, fm.capacity, fm.method, fm.observations, fm.date, fm.weather, s.name from flow_measurement fm
                    inner join sampling_site s on s.id = fm.sampling_site_id 
                    where fm.sampling_site_id =".$id_comboMostrar."  and 
                        fm.date >= '$startDate' and 
                        fm.date <= '$endDate' ");  

                   return view('reports.capacity.mostrar',compact('view','aforos'));

               }   
           }else{
             Session::flash('message','Existe un error con las fechas favor revisar');
             return redirect()->route('aforos.index');
         }

     }
 }
}

public function show($id)
{

}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }  

    public function combo($value)
    {  
        

        $tipo = Auth::user()->getRol();
        $idEntity=Auth::user()->idEntity();

        //dd($idEntity.$tipo);
        if($tipo == "Gestor"){
            if($value == "watersource"){
        //$watersources 
                $sql = \DB::select("select w.id, w.watersource_name as name from watersource w
                    inner join concession_watersource cw on cw.watersource_id = w.id
                    inner join concession c on c.id = cw.concession_id
                    inner join entity e on e.id = c.agent_id and e.id =".$idEntity); 
            }else{
                if($value == "sampling_site"){
                 $sql = \DB::select("select s.id,s.name from sampling_site s 
                    inner join entity e on e.id = s.agent_id and e.id =".$idEntity); 
             }
         }
     }else{
        if($value == "watersource"){
        //$watersources 
            $sql = \DB::select("select w.id, w.watersource_name as name from watersource w
                inner join concession_watersource cw on cw.watersource_id = w.id
                inner join concession c on c.id = cw.concession_id"); 
        }else{
            if($value == "sampling_site"){
             $sql = \DB::select("select s.id,s.name from sampling_site s"); 
         }
     }

 }
 return response()->json($sql); 
}
}
