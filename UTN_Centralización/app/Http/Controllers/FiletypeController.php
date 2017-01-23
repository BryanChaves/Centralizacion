<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\FiletypeRequest;
use App\Http\Controllers\Controller;
use App\Filetype;
use Redirect;
use Session;
use Carbon\Carbon;
use Auth;

class FiletypeController extends Controller
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
        $fileTypes=Filetype::all();
        
        return view('fileTypes.index',compact('fileTypes','view'));
    }

    public function create()
    {   
        $view=Auth::user()->getView();
        return view('fileTypes.create',compact('view'));
    }

    public function store(FiletypeRequest $request)
    {
        
        if ($this->exist($this->removeSpace($request->input('name')))) {
            return redirect()->to('expedientes/create')->withInput()->withErrors(array('invalid' => 'Ya existe el tipo de expediente por favor digite uno distinto')); 
        }


        $date = Carbon::now();       
        $fileType= new Filetype($request->all());
        $fileType->created_at = $date;
        $fileType->updated_at = $date;           
        $fileType->save();
        return redirect()->route('tipos-expediente.index');
    }

    public function show($id)
    {
        
    }

    public function edit($id)
    {   
        if (!$this->existFileTypeId($id)) {
            Session::flash('message','No existe el tipo de expediente ');
            return redirect()->route('tipos-expediente.index');
        }
        $view=Auth::user()->getView();
        $fileType = Filetype::findOrFail($id);

         
        return view('fileTypes.edit', compact('fileType','view'));
    }

    public function update(FiletypeRequest $request,$id)
    {
        $date = Carbon::now(); 
        $fileType= Filetype::findOrFail($id);
        if ((strtolower($this->removeSpace($fileType->name)))!=(strtolower($this->removeSpace($request->input('name'))))){
           if ($this->exist($request->input('name'))) {
                return redirect()->to('tipos-expediente/'.$id.'/edit')->withInput()->withErrors(array('invalid' => 'Ya existe el tipo de expediente por favor digite uno distinto')); 
            }
        }
        $fileType->fill($request->all());
        $fileType->updated_at = $date; 
        $fileType->save();
        return redirect()->route('tipos-expediente.index');
    }

    public function destroy($id)
    {
        if (!$this->existFileTypeId($id)) {
            Session::flash('message','No existe el tipo de expediente ');
            return redirect()->route('tipos-expediente.index');
        }
        $fileType= Filetype::findOrFail($id);
        $fileType->delete($id);
        Session::flash('message','Fue eliminado de nuestros registros.');
        return redirect()->route('tipos-expediente.index');
    }

    public function exist($name){
        $status=False;
        $fileTypes=Filetype::all();
       
        
        foreach ($fileTypes as $fileType ) {
            if ((strtolower($this->removeSpace($fileType->name)))==(strtolower($this->removeSpace($name)))) {
                $status=True;
            }
            
        }

        return $status;
    }

    public function removeSpace($name){
        $name = str_replace(' ', '', $name);
        return $name;
    }

    public function existFileTypeId($id){
        $exist=False;
        $fileTypes=Filetype::all();
        foreach ($fileTypes as $fileType ) {
            if ($id==$fileType->id) {
               $exist=True; 
            } 
        }
        return $exist; 
    }

}
