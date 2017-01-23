<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = 'province';
	protected $fillable = array('name');
	protected $guarded  = array('id');
	public    $timestamps = false;
}
