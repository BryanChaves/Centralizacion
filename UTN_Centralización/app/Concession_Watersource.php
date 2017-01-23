<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Concession_Watersource extends Model
{
    protected $table = 'concession_watersource';
	protected $fillable = array('concession_id','watersource_id','created_at','updated_at');
	protected $guarded  = array('id');
	public    $timestamps = false;
}
