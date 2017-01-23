<?php

namespace App;
use Carbon\Carbon;
use Storage;
use File;
use Illuminate\Database\Eloquent\Model;

class Watersource extends Model
{
  	protected $table = 'watersource';
	protected $fillable = array('watersource_name','address','coordinate_CRTM05','observations','created_at','updated_at');
	protected $guarded  = array('id');
	public    $timestamps = false;

	static function watersourceAgent($id){

		 return \DB::table('watersource')
            
            ->join('concession_watersource', 'watersource.id', '=', 'concession_watersource.watersource_id')
            ->join('concession', 'concession.id', '=', 'concession_watersource.concession_id')
            ->where('concession.agent_id', $id)
            ->select('watersource.*')
            ->get(); 
	}

}
