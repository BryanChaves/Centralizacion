<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\AnalysisRequest;
use App\Http\Requests\AnalysisEditRequest;
use App\Http\Controllers\Controller;
use App\Analysis;
use App\Sampling;
use App\Entity;
use Auth;
use Carbon\Carbon;
use Redirect;
use Session;
use Storage;
use Input;

class AnalysisController extends Controller
{
    public function __construct()
    {  
        $this->middleware('auth');
        
    }

    public function index()
    {   
        $view=Auth::user()->getView();
        $entities=Entity::all();
        if (Auth::user()->getRol()=="Gestor") {
            $analysis=Analysis::analysisAgent(Auth::user()->id);
        }else{
           $analysis=Analysis::all();
        }
       
        return view('analysis.index',compact('view','analysis','entities'));
    }

    public function create()
    {   $name="Gestor";
        $view=Auth::user()->getView();
        $entities=Entity::getEntities(Auth::user()->extractIdRol($name));
        return view('analysis.create',compact('view','entities'));

    }

    public function store(AnalysisRequest $request)
    {        
            $date = Carbon::now();       
            $analysis= new Analysis($request->all());
            if(Auth::user()->getRol()=="Gestor"){
                $analysis->agent_id = Auth::user()->IdEntity();
            }
            if (Input::file('path')==null) {
                 $analysis->path =""; 
            }elseif($this->validateExist(Input::file('path'))){
                return redirect()->route('analisis.create')->withInput()->withErrors(array('invalid' => 'Ya existe un archivo con ese nombre favor cambiarlo'));
            }else{

                $analysis->path =Input::file('path')->getClientOriginalName();
                $this->uploadFile(Input::file('path'));
            }
                    
            $analysis->created_at = $date;
            $analysis->updated_at = $date;           
            $analysis->save();
            $id = $analysis->id;    

            $muestras = $_POST['muestras'];

            $muestras = explode(",", $muestras);

            $this->updateSampling($id,$muestras);
            
            return redirect()->route('analisis.index'); 
            
    }

    public function show($id)
    {
       
    }

    public function edit($id)
    {   
       $sql = \DB::select("select s.id,s.consecutive, s.label, s.level, w.watersource_name as name, s.created_at from sampling s
        inner join watersource w on w.id = s.watersource_id
        inner join concession_watersource cw on cw.watersource_id = w.id
        inner join concession c on c.id = cw.concession_id
        inner join entity e on e.id = c.agent_id 
        where s.analysis_id = ".$id);
       if(COUNT($sql) < 0)
        {
         $sql = \DB::select("select s.id, s.consecutive, s.label, s.level, ss.name, s.created_at from sampling s
             inner join sampling_site ss on ss.id = s.sampling_site_id
             inner join entity e on e.id = ss.agent_id
             where s.analysis_id = ".$id);
        }
        $view= Auth::user()->getView(); 
        $analysis = Analysis::findOrFail($id);
        $entities=Entity::all();
        return view('analysis.edit',compact('view','analysis','entities','sql'));

    }

    public function update(AnalysisEditRequest $request,$id)
    {
        $date = Carbon::now();  
        $analysis= Analysis::findOrFail($id);
        if(!(Auth::user()->getRol()=="Gestor")){
                $analysis->agent_id = $request->input('agent_id'); 
        }
        $analysis->laboratory_name =$request->input('laboratory_name') ;

        if ($request->input('date')=="") {
           $analysis->date =$analysis->date ; 
        }else{
            $analysis->date = $request->input('date'); 
        }

        if (Input::file('path')==null) {
            $analysis->path =$analysis->path;  
           
        }else{

            if ($this->validateExist(Input::file('path'))) {
                 return redirect()->to('analisis/'.$id.'/edit')->withInput()->withErrors(array('invalid' => 'Ya existe un archivo con ese nombre favor cambiarlo'));
            }else{
               
                if (!($analysis->path=="")) {
                    
                    $this->deleteFile($analysis->path);
                }
               
                $analysis->path =Input::file('path')->getClientOriginalName();
                $this->uploadFile(Input::file('path'));
            }
            
                
            
        }
             
           
        

        $analysis->updated_at = $date;
        $analysis->save();
       
        
        return redirect()->route('analisis.index');
    }

    public function destroy($id)
    {   
        $sql = \DB::update("UPDATE sampling SET analysis_id = NULL where analysis_id = ".$id);
        $analysis = Analysis::findOrFail($id);
        $analysis->delete($id);
        Session::flash('message','fue eliminado de nuestros registros.');
        return redirect()->route('analisis.index');   
    }

   
    public function validateExist($file){ 
        $name=$file->getClientOriginalName();
        $exists = Storage::disk('local')->has($name);
        return $exists;  
    } 
     public function uploadFile($file){
        $name=$file->getClientOriginalName();
        Storage::disk('local')->put($name,\File::get($file));
     } 
     public function updateFile($file){
        $name=$file->getClientOriginalName();

     } 
     
     public function deleteFile($name){
        Storage::delete($name);
     } 

      public function updateSampling($id,$muestrasId){
       // var_dump($muestrasId);
        //die();
          foreach ($muestrasId as $key => $value) {

             $sampling = Sampling::findOrFail($value);
             $sampling->analysis_id = $id;
             $sampling->save();
          }
    }
        public function cargarTabla($file){
        $tipo = Auth::user()->getRol();
        $idEntity=Auth::user()->idEntity();
        $sql = "";
        $file = explode(",", $file);
        $estructura ="";
        $puntoControl = $file[0];
        $id_comboMostrar =$file[1];
       // dd($id_comboMostrar);
        if($puntoControl == "watersource")
        {
            if($id_comboMostrar == "todos")
            {
                if($tipo == "Gestor")
                {
                    $estructura =" and e.id = ".$idEntity;
                }
                $sql = \DB::select("select s.id,s.consecutive, s.label, s.level, w.watersource_name as name, s.created_at from sampling s
                    inner join watersource w on w.id = s.watersource_id
                    inner join concession_watersource cw on cw.watersource_id = w.id
                    inner join concession c on c.id = cw.concession_id
                    inner join entity e on e.id = c.agent_id".$estructura.
                    " where s.analysis_id IS NULL");  
            }else{
                $sql = \DB::select("select s.id,s.consecutive, s.label, s.level, w.watersource_name as name, s.created_at from sampling s
                    inner join watersource w on w.id = s.watersource_id
                    inner join concession_watersource cw on cw.watersource_id = w.id
                    inner join concession c on c.id = cw.concession_id
                    inner join entity e on e.id = c.agent_id 
                    where s.watersource_id = ".$id_comboMostrar." and s.analysis_id IS NULL");  
            }                  
        }else{
           if($puntoControl == "sampling_site")
           {
            if($id_comboMostrar == "todos")
            {
                if($tipo == "Gestor")
                {
                    $estructura =" and e.id =".$idEntity;
                }
                $sql = \DB::select("select s.id, s.consecutive, s.label, s.level, ss.name, s.created_at from sampling s
                   inner join sampling_site ss on ss.id = s.sampling_site_id
                   inner join entity e on e.id = ss.agent_id".$estructura.
                   " where s.analysis_id IS NULL");  
            }else{
               $sql = \DB::select("select s.id,s.consecutive, s.label, s.level, ss.name, s.created_at from sampling s
                   inner join sampling_site ss on ss.id = s.sampling_site_id
                   inner join entity e on e.id = ss.agent_id
                   where s.sampling_site_id = ".$id_comboMostrar." and s.analysis_id IS NULL");  
           }   
       }
   }
   return response()->json($sql); 
} 
}
