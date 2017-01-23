<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\ReportQualityRequest;
use App\Http\Controllers\Controller;
use App\Watersource;
use App\Flow_Measurement;
use App\Samplingsite;
use Auth;
use Carbon\Carbon;
use Redirect;
use Session;

class ReportqualityController extends Controller
{

    public function __construct()
    {  
        $this->middleware('auth');
        //$this->middleware('rol');
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        
        $view=Auth::user()->getView();
        $idEntity=Auth::user()->idEntity();
        $tipo = Auth::user()->getRol();
        if($tipo == "Gestor"){
            $samplingSites = \DB::select("select * from sampling_site where agent_id  =".$idEntity);
        }else{
         $samplingSites=Samplingsite::all();
     }

     return view('reports.quality.index',compact('samplingSites','view'));
 }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
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
    public function store(ReportQualityRequest $request)
    {       
        $view=Auth::user()->getView();
        $startDate = (string)$request->input('startDate');
        $endDate = (string)$request->input('endDate');
        $tipo = Auth::user()->getRol();
        $idEntity=Auth::user()->idEntity();

        $puntoControl = $request->input('F1');
        $id_comboMostrar = $request->input('combo');

        $estructura = "";
        $value ="";

        if($puntoControl == "sampling_site")
        {
         if ($startDate<$endDate) 
         {
          if($id_comboMostrar != "todos")
          {
                $value = " and sa.id=".$id_comboMostrar;
           }
            if($tipo == "Gestor")
            {
                $estructura =" and e.id =".$idEntity;
            }

            $record = \DB::select("select p.parameter, p.unit, r.value, p.maximum_allowable, s.id, a.report_number from record r
                inner join parameter p on p.id = r.parameter_id
                inner join sampling s on s.id = r.sampling_id
                inner join sampling_site sa on sa.id = s.sampling_site_id ".$value."
                inner join entity e on e.id = sa.agent_id".$estructura."
                inner join analysis a on a.agent_id = e.id and s.analysis_id = a.id
		and s.created_at >= '$startDate' and s.created_at <= '$endDate'");

            return view('reports.quality.resultado',compact('view','record'));
        }else{
           Session::flash('message','Existe un error con las fechas favor revisar');
           return redirect()->route('calidades.index');
       }
   }

   if($puntoControl == "watersource")
   {
    if ($startDate<$endDate) 
    {
        if($tipo == "Gestor")
        {
            $estructura =" and e.id =".$idEntity;
        }
   if($id_comboMostrar != "todos")
          {
                $value = " and s.id=".$id_comboMostrar;
           }

        $record = \DB::select("select p.parameter, p.unit, r.value, p.maximum_allowable, s.id, a.report_number from record r
            inner join parameter p on p.id = r.parameter_id
            inner join sampling s on s.id = r.sampling_id
            inner join watersource w on w.id = s.watersource_id ".$value."
            inner join concession_watersource cw on cw.watersource_id = w.id
            inner join concession c on c.id = cw.concession_id
            inner join entity e on e.id = c.agent_id".$estructura."
            inner join analysis a on a.agent_id = e.id and s.analysis_id = a.id
            and s.created_at >= '$startDate' and s.created_at <= '$endDate'");

        return view('reports.quality.resultado',compact('view','record'));
        
    }else{
       Session::flash('message','Existe un error con las fechas favor revisar');
       return redirect()->route('calidades.index');
   }
}

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
}
