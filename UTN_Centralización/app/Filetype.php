<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filetype extends Model
{
    protected $table = 'file_type';
	protected $fillable = array('name','created_at','updated_at');
	protected $guarded  = array('id');
	public    $timestamps = false;

	
}
