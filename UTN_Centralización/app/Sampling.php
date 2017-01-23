<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Sampling extends Model
{
    protected $table = 'sampling';
	protected $fillable = array('consecutive','label','level','sampling_site_id','analysis_id','watersource_id','created_at','updated_at');
	protected $guarded  = array('id');
	public    $timestamps = false;

     static public function count($id){
     	return \DB::table('sampling')
            ->where('sampling_site_id', $id)
            ->count();           
     }

     static public function allSampling(){
       $id=Auth::user()->idEntity();
      return \DB::table('sampling')
            
            ->join('sampling_site', 'sampling_site.id', '=', 'sampling.sampling_site_id')
            ->join('entity', 'entity.id', '=', 'sampling_site.agent_id')
            ->where('entity.id', $id)
            ->select('sampling.*')
            ->get(); 
    }
     static public function samplingAgent($id){
     
            return \DB::table('sampling')
           
            ->where('sampling.watersource_id',$id)
            ->select('sampling.*')
            ->get(); 
    }

}
