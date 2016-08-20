<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Terms extends Model {

	protected $table = 'terms';
	protected $primaryKey = 'termid';
	
	public function taxonomy(){
		return $this->hasMany('App\Taxonomy','termid');
	}
}
