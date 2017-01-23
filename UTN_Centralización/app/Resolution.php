<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resolution extends Model
{
    protected $table = 'resolution';
	protected $fillable = array('num_resolution','created_at','updated_at');
	protected $guarded  = array('id');
	public    $timestamps = false;


}
