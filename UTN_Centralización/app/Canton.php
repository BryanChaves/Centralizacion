<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Canton extends Model
{
    protected $table = 'canton';
	protected $fillable = array('name','province_id');
	protected $guarded  = array('id');
	public    $timestamps = false;

	static public function getCanton($id){
        return \DB::table('canton')
            ->where('province_id', $id)
            ->select('canton.id','canton.name')
            ->get();    
    }

}
