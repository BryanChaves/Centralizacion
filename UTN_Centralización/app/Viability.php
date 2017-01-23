<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Viability extends Model
{
  	protected $table = 'viability';
	protected $fillable = array('project_name','viability_number','setena_administrative_record','cadrastal_plane_number','property_number','province','canton','district','coordinate','path','created_at','updated_at');
	protected $guarded  = array('id');
	public    $timestamps = false;

}
