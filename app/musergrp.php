<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class musergrp extends Model {

	protected $table = 'm_user_group';
	protected $primaryKey = 'groupid';
	protected $fillable = [];
	protected $hidden = [];

	public function users()
    {
        return $this->belongsToMany('App\User');
    }

}
