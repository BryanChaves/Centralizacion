<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flow_Measurement extends Model
{
    protected $table = 'flow_measurement';
	protected $fillable = array('capacity','method','observations','date','weather','sampling_site_id','watersource_id','created_at','updated_at');
	protected $guarded  = array('id');
	public    $timestamps = false;

	static public function flowAgent($id){
		   return \DB::table('flow_measurement')
            
            ->where('flow_measurement.watersource_id', $id)
            ->select('flow_measurement.*')
            
            ->get(); 
	}
}
