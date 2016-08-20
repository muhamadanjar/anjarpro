<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Taxonomy extends Model {

	protected $table = 'term_taxonomy';
	protected $primaryKey = 'termtaxonomyid';
	public $timestamps = false;
}
