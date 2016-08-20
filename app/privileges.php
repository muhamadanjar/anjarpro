<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class privileges extends Model {

	protected $table = 'm_privileges';
	protected $primaryKey = 'privid';
	protected $fillable = [];
	protected $hidden = [];

}
