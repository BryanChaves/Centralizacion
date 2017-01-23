<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\FileRequest;
use App\Http\Controllers\Controller;
use App\File;
use Redirect;
use Session;
use Carbon\Carbon;
use Auth;

class FileController extends Controller
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
        $files=File::all();
        return view('files.index',compact('files','view'));
    }

    public function create()
    {   
        $view=Auth::user()->getView();
        return view('files.create',compact('view'));
    }

    public function store(FileRequest $request)
    {   
        

        if ($this->exist($request->input('num_file'))) {
            return redirect()->to('expedientes/create')->withInput()->withErrors(array('invalid' => 'Ya existe el expediente por favor digite uno distinto')); 
        }
        
        $date = Carbon::now();        
        $file= new File($request->all());
        $file->created_at = $date;
        $file->updated_at = $date;           
        $file->save();
        return redirect()->route('expedientes.index');
    }

    public function show($id)
    {   
     
    }

    public function edit($id)
    {   
        if (!$this->existFileId($id)) {
            Session::flash('message','El expediente no existe');
            return redirect()->route('expedientes.index');
        }
        $view=Auth::user()->getView();
        $file = File::findOrFail($id);
        return view('files.edit', compact('file','view'));
    }

    public function update(FileRequest $request,$id)
    {
        
        

        $date = Carbon::now();  
        $file= File::findOrFail($id);
       
       
        if ((strtolower($this->removeSpace($file->num_file)))!=(strtolower($this->removeSpace($request->input('num_file'))))){
           if ($this->exist($request->input('num_file'))) {
                return redirect()->to('expedientes/'.$id.'/edit')->withInput()->withErrors(array('invalid' => 'Ya existe el expediente por favor digite uno distinto')); 
            }
        }
         
        $file->fill($request->all());
        $file->updated_at = $date; 
        $file->save();
        return redirect()->route('expedientes.index');
    }

    public function destroy($id)
    {
         if (!$this->existFileId($id)) {
            Session::flash('message','El expediente no existe');
            return redirect()->route('expedientes.index');
        }
        $file= File::findOrFail($id);
        $file->delete($id);
        Session::flash('message','Fue eliminado de nuestros registros.');
        return redirect()->route('expedientes.index');
    }

    public function exist($num){
        $status=False;
        $files=File::all();
       
        
        foreach ($files as $file ) {
            if ((strtolower($this->removeSpace($file->num_file)))==(strtolower($this->removeSpace($num)))) {
                $status=True;
            }
            
        }

        return $status;
    }

    public function removeSpace($name){
        $name = str_replace(' ', '', $name);
        return $name;
    }

    public function existFileId($id){
        $exist=False;
        $files=File::all();
        foreach ($files as $file ) {
            if ($id==$file->id) {
               $exist=True; 
            } 
        }
        return $exist; 
    }


}
