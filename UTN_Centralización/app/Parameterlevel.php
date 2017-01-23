<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parameterlevel extends Model
{
    protected $table = 'parameter_level';
	protected $fillable = array('level', 'parameter_id','created_at','updated_at');
	protected $guarded  = array('id');
	public    $timestamps = false;


}
