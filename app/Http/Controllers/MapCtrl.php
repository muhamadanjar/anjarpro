<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Response;
use Illuminate\Http\Request;

class MapCtrl extends Controller {

	public function onedatamap(){
		return view('map.onedatamap');
	}

	public function map(){
		return view('map.map');
	}

	public function map_cmv(){
		return view('map.map_cmv');
	}

	public function map_openlayers(){
		return view('map.map_openlayers');
	}

	public function openlayergetmap(){
		return DB::table('layeropenlayer')->orderBy('urutan','asc')->get();
	}

	public function map_google(){
		return view('map.map_gapi');
	}

	public function map_custom($value=''){
		return view('map.map_full');
	}

	public function LayerUser(){
		$user = \Auth::user();
		$guest = \Auth::guest();
		$currentroleuser = ($user ? $user->roles:'');
		$userid = ($user ? $user->id : 0);
			$layers = Layer::join('role_layer',function($join) {
	      		$join->on('Layers.id_layer', '=', 'role_layer.layer_id');
	    	})->where('na','=','N')
	    	->where('role_layer.role_id','=',$userid)
	    	->with('roles')->orderBy('orderlayer','DESC');

		$sql = $layers->toSql();
		$run_layers = $layers->get();
		
		$array = array(); $operationallayer = array();
		
			foreach ($run_layers as $klyr => $layer) {
				$optionfeature['id'] = $layer->layer;
				$optionfeature['opacity'] = 1.0;
				$optionfeature['visible'] = false;
				$optionfeature['outFields'] = ['*'];
				$optionfeature['mode'] = 1;
			        
			    $optiondynamic['id'] = $layer->layer;  
			    $optiondynamic['opacity'] = $layer->option_opacity;
			    $optiondynamic['visible'] = $layer->option_visible;
			    $optiondynamic['outFields'] = ['*'];
			    $optiondynamic['imageParameters'] = '';
			       
			    $options = ($layer->tipelayer=='dynamic' ?  $optiondynamic : $optionfeature); 

			    $operationallayer_['type'] = $layer->tipelayer;
			    $operationallayer_['url'] =  $layer->layerurl;
			    $operationallayer_['title'] = $layer->layername;
			    $operationallayer_['options'] = $options;
			    $layerIds = ['layerIds' => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22]];
			    $operationallayer_['identifyLayerInfos'] = $layerIds;
			    $operationallayer_['roles'] = $layer->roles;
			    array_push($operationallayer, $operationallayer_);
			}
		
		return json_encode($operationallayer);

	}

	public function editGeotagFoto(Request $request) {

		$objectid = $request->objectid;
		$foto = $request->foto;
		if($request->ajax()){
            $GeoTag = GeoTag::where('objectid' , '=', $objectid)->first();
            $GeoTag->foto = $foto;
			//$GeoTag->personil = \Auth::user()->name;
			//$GeoTag->tanggal = Carbon::now();
			$GeoTag->save();

        }

		print($objectid.' - '.$foto);

	}

	public function show_layer($term){

		$layers = \App\LayerOL::where('namalayer', 'LIKE', '%' . ($term) . '%')
			->whereRaw('UPPER(namalayer) LIKE ?',array(strtoupper('%'.$term.'%')))
			->whereRaw('UPPER(tags) LIKE ?',array(strtoupper('%'.$term.'%')),'OR')

		
			->get();

		return Response::json($layers,200);
	}


	public function show_katalog($term){
		$katalogs = DB::table('katalog')
			->whereRaw('UPPER(namakatalog) LIKE ?',array(strtoupper('%'.$term.'%')))
			->whereRaw('UPPER(lokasi) LIKE ?',array(strtoupper('%'.$term.'%')),'OR')
			->whereRaw('UPPER(tags) LIKE ?',array(strtoupper('%'.$term.'%')),'OR')

			->get();

		return Response::json($katalogs,200);
	}

	public function getlayer(){
		$layers_ol = \App\LayerOL::orderBy('urutan','ASC')->get();
		return $layers_ol;
	}

}
