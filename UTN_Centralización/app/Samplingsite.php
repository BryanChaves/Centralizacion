<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
class Samplingsite extends Model
{
  protected $table = 'sampling_site';
	protected $fillable = array('name','agent_id','created_at','updated_at');
	protected $guarded  = array('id');
	public    $timestamps = false;

	 static public function searchSites($startDate,$endDate){
       $id=Auth::user()->id;
       return $capacity = \DB::table('sampling_site')
                    ->whereBetween('created_at', array($startDate,$endDate))
                    ->where('agent_id', $id)
                    ->get();
    }
    static public function search($startDate,$endDate){
       
       return $capacity = \DB::table('sampling_site')
                    ->whereBetween('created_at', array($startDate,$endDate))
                    ->get();
    }
    static public function allAgent(){
       $id=Auth::user()->idEntity();
      return \DB::table('sampling_site')
        
            ->where('agent_id', $id)
            ->select('sampling_site.*')
            ->get(); 
    }


}
