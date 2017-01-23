<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $table = 'file';
	protected $fillable = array('num_file','created_at','updated_at');
	protected $guarded  = array('id');
	public    $timestamps = false;

	

}
