<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
use Validator;
use Redirect;

class LayerOLCtrl extends Controller {

	public function __construct(){
		$this->middleware('notadmin');
		$this->table = 'layeropenlayer';
	}

	public function index()
	{
		$list_layer = DB::table($this->table)->orderby('urutan','asc')->get();
		return view('forms.layerol.LayerOLList')->with('list_layer',$list_layer);
	}

	
	public function create(){
		return view('forms.layerol.LayerOLAdd');
	}


	public function store(Request $request){
		$validator = Validator::make($request->all(), \App\LayerOL::$rules);
		
		if(!$validator->passes()) {
			return Redirect::to('layerol-add')
			->with('message', \AHelper::format_message('Error,Coba lagi','cancel'))
			->withErrors($validator)
			->withInput();
		}else{
			$qlayer = ($request->layerid == null) ? new \App\LayerOL() : \App\LayerOL::find($request->layerid);
			try {
				$layer = $qlayer;
				$layer->namalayer = $request->namalayer;
				$layer->urllayer = $request->urllayer;
				$layer->tipelayer = $request->tipelayer;
				$layer->source_layer = $request->source_layer;
				$layer->source_tiled = $request->source_tiled;
				$layer->layervisible = $request->layervisible;
				$layer->layeropacity = $request->layeropacity;
				$layer->x_min = $request->x_min;
				$layer->y_min = $request->y_min;
				$layer->x_max = $request->x_max;
				$layer->y_max = $request->y_max;
				$layer->tags = $request->tags;
				$layer->urutan = $request->urutan;
				$layer->save();
				
			} catch (Exception $e) {
				DB::rollback();
			    return Redirect::to('/layerol-add')
			        ->withErrors( $e->getErrors() )
			        ->withInput();
			}

			
			return Redirect::to('layerol-list')->with('message', \AHelper::format_message('Data Berhasil diedit','checkmark'));
		}
	}


	public function show($id){
		//
	}

	
	public function edit($id){
		$layer = \App\LayerOL::find($id);
		return view('forms.layerol.LayerOLEdit')->with('layer',$layer);
	}

	
	public function update($id){
		//
	}


	public function destroy($id){
		$layer = \App\LayerOL::find($id);
		$layer->delete();
		return Redirect::to('layerol-list');
	}

	public function getlevel($layerid=''){
		$levelform = \Input::get('level');
		$array = array();
		$array2 = array();
		if(empty($layerid)){
			return 'layerid kosong';
		}
		foreach ($levelform as $key => $value) {
			$array['layer_id'] = $layerid;
			$array['role_id'] = $value;
			array_push($array2,$array); 
		}


		return $array2;
	}

}
