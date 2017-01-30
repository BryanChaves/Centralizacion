<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Analysis extends Model
{
    protected $table = 'analysis';
	protected $fillable = array('agent_id', 'laboratory_name','date','
		                         report_number','path','created_at','updated_at');
	protected $guarded  = array('id');
	public    $timestamps = false;

	static public function analysisAgent($id){
		return \DB::table('analysis')
            ->where('analysis.agent_id', $id)
            ->get(); 
	}

}
