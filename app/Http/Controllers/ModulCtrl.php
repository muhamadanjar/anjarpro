<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Services\AnjarService as Setting;
use Illuminate\Http\Request;
use App\mmodule as Module;
use DB;
use Validator;
use Redirect;
use App\Role;
use App\musrgdetil;
use App\Lib\AHelper;
class ModulCtrl extends Controller {

	public function __construct(Setting $setting){
		$this->middleware('auth');
		$this->middleware('notadmin');
		$this->setting = $setting;
		$this->_s = new AHelper();

		$this->tableModuleForeign = 'm_user_group_detil';
		$this->redirectUrl = 'modul-list';
	}
	public function ModulListJG($value=''){
		return \AHelper::jgridData('modul');
	}
	public function ModulList(){
		$module = Module::orderBy('moduleid','desc')->get();
		
		return view('master.ModulList')->with('module',$module);
	}

	public function ModulAdd(){
		$modulselect = Module::where('status',1)->select('moduleid','moduleparentid','modulename')->get();
		$level = $this->GetDftrLevel();
		return view('master.ModulAdd')->with('modulselect',$modulselect)->with('level',$level);
	}

	public function ModulAddPost(Request $request){
		/*$this->validate($request, [
            'modulename' => 'required', 
            'moduleslug' => 'required',
            'modulefile' => 'required',
            'status' => 'required',
            'type' => 'required',
            'level' => 'required',
        ]);*/

        $validator = Validator::make($request->all(), Module::$rules,Module::$messages);

        if(!$validator->passes()) {
			return Redirect::to('modul-add')
			->with('message', \AHelper::format_message('Error,Coba lagi','cancel'))
			->withErrors($validator)
			->withInput();
		} else {
			DB::beginTransaction();
			try {
				$modul = new Module;
				$modul->moduleparentid = $request->moduleparentid;
				$modul->modulename = $request->modulename;
				$modul->moduleslug = $request->moduleslug;
				$modul->modulefile = $request->modulefile;
				$modul->urutan = $request->urutan;
				$modul->status = $request->status;
				$modul->type = $request->type;
				$modul->icon = $request->icon;
			
				$modul->save();
			} catch(ValidationException $e){
			    // Rollback and then redirect
			    // back to form with errors
			    DB::rollback();
			    return Redirect::to('/form')
			        ->withErrors( $e->getErrors() )
			        ->withInput();
			} catch (Exception $e) {
				DB::rollback();
			    throw $e;
			}

			try {
				$modul_detil = $this->getlevel($modul->moduleid);
				foreach ($modul_detil as $key => $value) {
					$detil = new musrgdetil();
					
					$detil->groupid = $value['groupid'];
					$detil->moduleid = $value['moduleid'];
					$detil->privid = $value['privid'];
					$detil->save();
				}
			} catch (ValidationException $e) {
				DB::rollback();
			    return Redirect::to('/form')
			        ->withErrors( $e->getErrors() )
			        ->withInput();
			} catch (Exception $e) {
				DB::rollback();
			    throw $e;
			}
			DB::commit();
			$this->_s->updateSessionMenu();
			return Redirect::to($this->redirectUrl)->with('message',\AHelper::format_message('Data Berhasil ditambahkan','checkmark'));
		}


		
	}

	public function ModulEdit($id){
		$modul = Module::find($id);
		$modulselect = Module::where('status',1)->select('moduleid','moduleparentid','modulename')->get();
		
		$detil = $this->getVallevelmodul($id);
		$level = $this->GetDftrLevel($detil);
		return view('master.ModulEdit')
		->with('modul',$modul)
		->with('modulselect',$modulselect)
		->with('level',$level);
	}

	public function ModulEditPost(Request $request){
		$this->validate($request, [
            'modulename' => 'required', 
            'moduleslug' => 'required',
            'modulefile' => 'required',
            'status' => 'required',
            'type' => 'required',
            'level' => 'required',
        ]);
        $validator = Validator::make($request->all(), Module::$rules);

        if(!$validator->passes()) {
			return Redirect::to($this->redirectUrl)
			->with('message', \AHelper::format_message('Error,Coba lagi','cancel'))
			->withErrors($validator)
			->withInput();
		} else {
			DB::beginTransaction();
			try {
				$modul = Module::find($request->moduleid);
				$modul->moduleparentid = $request->moduleparentid;
				$modul->modulename = $request->modulename;
				$modul->moduleslug = $request->moduleslug;
				$modul->modulefile = $request->modulefile;
				$modul->urutan = $request->urutan;
				$modul->status = $request->status;
				$modul->type = $request->type;
				$modul->icon = $request->icon;
				$modul->save();
				$modul->touch();
			} catch(ValidationException $e){
			    // Rollback and then redirect
			    // back to form with errors
			    DB::rollback();
			    return Redirect::to('/form')
			        ->withErrors( $e->getErrors() )
			        ->withInput();
			} catch (Exception $e) {
				DB::rollback();
			    throw $e;
			}

			try {
				$modul_detil = $this->getlevel($modul->moduleid);
				$usermodul = DB::table($this->tableModuleForeign)->where('moduleid',$modul->moduleid)->delete();
				foreach ($modul_detil as $key => $value) {
					$detil = new musrgdetil();
					
					$detil->groupid = $value['groupid'];
					$detil->moduleid = $value['moduleid'];
					$detil->privid = $value['privid'];
					$detil->save();
				}
			} catch (Exception $e) {
				
			}
			DB::commit();
			$this->_s->updateSessionMenu();
			return Redirect::to($this->redirectUrl)->with('message', \AHelper::format_message('Data Berhasil diedit','checkmark'));
		}
		
		

		
	}

	public function ModulDelete($id) {

		$modul = Module::find($id);
		$usermodul = DB::table($this->tableModuleForeign)->where('moduleid',$id);
		if($modul->delete()){
			$usermodul->delete();
		}

		return redirect($this->redirectUrl);
	}

	public function ModulMati($id) {
		$modul = Module::find($id);
		$status = ($modul->status == 1) ? 0 : 1 ;
		$modul->status = $status;
		$modul->save();
		return redirect($this->redirectUrl);
	}

	public function getlevel($moduleid=''){
		$levelform = \Input::get('level');
		$array = array();
		$array2 = array();
		if(empty($moduleid)){
			return 'moduleid kosong';
		}

		foreach ($levelform as $key => $value) {
			$array['groupid'] = $value;
			$array['moduleid'] = $moduleid;
			$array['privid'] = 10;
			array_push($array2,$array); 
		}

		return $array2;
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

	public function getVallevelmodul($moduleid){
		$detil = musrgdetil::whereRaw('moduleid = ?',array($moduleid))->get();
		$a='';
		foreach ($detil as $key => $value) {
			$a .= '.'.$value->groupid;
		}
		return $a;
	}

}
