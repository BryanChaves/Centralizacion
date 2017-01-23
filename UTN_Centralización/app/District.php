<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = 'district';
	protected $fillable = array('name','canton_id');
	protected $guarded  = array('id');
	public    $timestamps = false;

	static public function getDistrict($id){
        return \DB::table('district')
            ->where('canton_id', $id)
            ->select('district.id','district.name')
            ->get();    
    }

}
