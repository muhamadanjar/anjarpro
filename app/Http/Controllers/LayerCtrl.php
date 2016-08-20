<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
use App\LayerEsri;
use App\Role;
use Validator;
use Redirect;
class LayerCtrl extends Controller {

	public function __construct(){
		$this->middleware('notadmin');
		$this->table = 'layeresri';
	}

	public function LayerList(){
		$list_layer = DB::table($this->table)->orderby('orderlayer','asc')->get();
		return view('forms.layeresri.LayerEsriList')->with('list_layer',$list_layer);
	}

	public function LayerAddForm(){
		$role = $this->GetDftrLevel();
		return view('forms.layeresri.LayerEsriForm')->with('role',$role);
	}

	public function LayerAddFormPost(Request $request){
		$validator = Validator::make($request->all(), LayerEsri::$rules);

		if(!$validator->passes()) {
			return Redirect::to('layeresri-add')
			->with('message', \AHelper::format_message('Error,Coba lagi','cancel'))
			->withErrors($validator)
			->withInput();
		}else{
			$qlayer = (empty($request->id_layer)) ? new LayerEsri() : LayerEsri::find($request->id_layer);
			try {
				$layer = $qlayer;
				$layer->layername = $request->layername;
				$layer->layerurl = $request->layerurl;
				$layer->layer = $request->layer;
				$layer->na = $request->na;
				$layer->id_grouplayer = $request->id_grouplayer;
				$layer->orderlayer = $request->orderlayer;
				$layer->tipelayer = $request->tipelayer;
				$layer->option_opacity = $request->option_opacity;
				$layer->option_visible = $request->option_visible;
				$layer->option_mode = $request->option_mode;
				if ($request->jsonfield != null) {
					$layer->jsonfield = $request->jsonfield;
				}
				
				$layer->save();
			} catch (Exception $e) {
				DB::rollback();
			    return Redirect::to('/layeresri-add')
			        ->withErrors( $e->getErrors() )
			        ->withInput();
			}

			try {
				$_rolelayer = $this->getlevel($layer->id_layer);
				if (!empty($request->id_layer)) {
					$usermodul = DB::table('role_layer')->where('layer_id',$layer->id_layer)->delete();
				}
				foreach ($_rolelayer as $key => $value) {
					DB::table('role_layer')->insert([
					    [
					    	'role_id' => $value['role_id'], 
					    	'layer_id' => $value['layer_id']
					    ]
					]);
				}
			}catch (Exception $e) {
				DB::rollback();
			    throw $e;
			}
			return Redirect::to('layeresri-list')->with('message', \AHelper::format_message('Data Berhasil diedit','checkmark'));
		}
	}

	public function LayerDelete($id){
		$layer = LayerEsri::find($id);
		$layer->delete();
		return Redirect::to('layeresri-list');
	}

	public function GetDftrLevel($lvl='') {
	
	  	$level = Role::whereRaw('id != ?',array(0))->get();
	  	$a = '';
	  	foreach ($level as $key => $value) {
	  		$ck = (strpos($lvl, ".$value->id") === false)? '' : 'checked';
	  		$a .= "<div class='row'><div class='col-md-12'>";
	  		$a .= "<label class='checkbox-primary'><input type=checkbox name='level[]' class='styled' value='$value->id' $ck> $value->id - $value->name</label>";
	  		$a .= "</div></div>";
	  	} 
	  	return $a;

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
