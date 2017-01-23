<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parameter extends Model
{
    protected $table = 'parameter';
	protected $fillable = array('parameter', 'unit','recommended_value','maximum_allowable','created_at','updated_at');
	protected $guarded  = array('id');
	public    $timestamps = false;

	

}
