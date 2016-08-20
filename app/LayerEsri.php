<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class LayerEsri extends Model {

	protected $table = 'layeresri';
	protected $primaryKey = 'id_layer';

	public static $rules = array(
		'layername'=>'required|min:3',
		'layerurl' => 'required',
		'orderlayer'=>'numeric|required',
		'level' => 'required',
	);

}
