<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\Concession_WatersourceRequest;
use App\Http\Controllers\Controller;
use App\Concession_Watersource;
use App\Concession;
use App\Watersource;
use Redirect;
use Session;
use Carbon\Carbon;
use Auth;

class Concession_WatersourceController extends Controller
{
    public function __construct()
    {  
        $this->middleware('auth');
        if (Auth::user()->getRol()=="Administrador") {
            $this->middleware('administrator'); 
        }elseif(Auth::user()->getRol()=="Institución"){
            $this->middleware('institution'); 
        }
    }

    public function index()
    {
        $view=Auth::user()->getView();
        $concession_Watersources=Concession_Watersource::all();
        $concessions=Concession::all();
        $watersources=Watersource::all();
        return view('concession_Watersources.index',compact('concession_Watersources','concessions','watersources','view'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $view=Auth::user()->getView();
        $concessions=Concession::all();
        $watersources=Watersource::all();
        return view('concession_Watersources.create',compact('view','concessions','watersources'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Concession_WatersourceRequest $request)
    {
        if (!$this->existWatersourceId($request->input('watersource_id'))) {
           return redirect()->to('concesion-naciente/create')->withInput()->withErrors(array('invalid' => 'La naciente seleccionada no existe')); 
        }
        if (!$this->existConcessionId($request->input('concession_id'))) {
           return redirect()->to('concesion-naciente/create')->withInput()->withErrors(array('invalid' => 'La concesión seleccionada no existe')); 
        }
        $date = Carbon::now();
        $concession_watersource= new Concession_Watersource($request->all());
        $concession_watersource->created_at = $date;
        $concession_watersource->updated_at = $date;           
        $concession_watersource->save();
        return redirect()->route('concesion-naciente.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return redirect()->route('concesion-naciente.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        if (!$this->existId($id)) {
            Session::flash('message','No existe esa concesión naciente');
            return redirect()->route('concesion-naciente.index');
        }
        $view=Auth::user()->getView();
        $concession_watersource = Concession_Watersource::findOrFail($id);
        $concessions=Concession::all();
        $watersources=Watersource::all();
        return view('concession_Watersources.edit',compact('concession_watersource','view','concessions','watersources'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Concession_WatersourceRequest $request, $id)
    {
        
        if (!$this->existWatersourceId($request->input('watersource_id'))) {
           return redirect()->to('concesion-naciente/'.$id.'/edit')->withInput()->withErrors(array('invalid' => 'La naciente seleccionada no existe')); 
        }
        if (!$this->existConcessionId($request->input('concession_id'))) {
           return redirect()->to('concesion-naciente/'.$id.'/edit')->withInput()->withErrors(array('invalid' => 'La concesión seleccionada no existe')); 
        }
        $date = Carbon::now();  
        $concession_watersource= Concession_Watersource::findOrFail($id);
        $concession_watersource->fill($request->all());
        $concession_watersource->updated_at = $date; 
        $concession_watersource->save();
        return redirect()->route('concesion-naciente.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        if (!$this->existId($id)) {
            Session::flash('message','No existe esa concesión naciente');
            return redirect()->route('concesion-naciente.index');
        }
        $concession_watersource= Concession_Watersource::findOrFail($id);
        $concession_watersource->delete($id);
        Session::flash('message','Fue eliminado de nuestros registros.');
        return redirect()->route('concesion-naciente.index');
    }

    public function existConcessionId($id){
        $exist=False;
        $concessions=Concession::all();
        foreach ($concessions as $concession ) {
            if ($id==$concession->id) {
               $exist=True; 
            } 
        }
        return $exist; 
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

    public function existId($id){
        $exist=False;
        $concession_Watersources=Concession_Watersource::all();
        foreach ($concession_Watersources as $concession_Watersource ) {
            if ($id==$concession_Watersource->id) {
               $exist=True; 
            } 
        }
        return $exist; 
    }
}
