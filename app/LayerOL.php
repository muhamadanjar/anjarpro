<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class LayerOL extends Model {

	protected $table = 'layeropenlayer';
	protected $primaryKey = 'layerid';

	public static $rules = array(
		'namalayer'=>'required|min:3',
		'urllayer' => 'required',
		'urutan'=>'numeric|required',
		
	);

	public $timestamps = false;


}
