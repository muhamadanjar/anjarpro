<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use DB;
use Illuminate\Http\Request;
use App\Lib\AHelper;
class UserController extends Controller {

	public function __construct(AHelper $setting){
		//$this->middleware('auth');
		$this->setting = $setting;
		$this->middleware('notadmin');
		$this->redirectUrl = 'user';
	}

	public function UserList(){
		$users = $this->getUserLevel();
		return view('master.UserList')->with('users',$users);
	}

	public function UserAdd(){
		$level = $this->setting->GetDftrLevelSelect();
		return view('master.UserAdd')->with('level',$level);
	}
	
	public function UserAddPost(Request $request){
		
		DB::beginTransaction();
		try {
			$user = new User;
			$user->username = $request->username;
			$user->name = $request->name;
			$user->email = $request->email;
			$user->password = \Hash::make($request->password);
			$user->groupid = 100;
			$user->save();
			$role = DB::table('role_user')->insert(['role_id' => $request->level,'user_id' => $user->id]);	
		} catch (Exception $e) {
			DB::rollback();
			    throw $e;
		}
		DB::commit();
		return redirect('user');
	
	}

	public function UserEdit($id){
		$user = User::find($id);
		$level = $this->setting->GetDftrLevelSelect($id);
		return view('master.UserEdit')->with('users',$user)->with('level',$level);
	}

	public function UserEditPost(Request $request){
		
		$user = User::find($request->id);
		$user->username = $request->username;
		$user->name = $request->name;
		$user->email = $request->email;
		//$user->password = Hash::make($request->password);
		if($request->oldpassword == $request->password){
			$user->password = $request->oldpassword;
		}else{
			$user->password = bcrypt($request->password);	
		}

		$user->save();
		$user->touch();
		
		return redirect('user');
	
	}

	public function LevelList(){
		$levels = Role::whereRaw('id != ?',array(0))->orderBy('id','asc')->get();
		return view('master.LevelList')->with('levels',$levels);
	}

	public function LevelAdd(){
		
		return view('master.LevelAdd');
	}

	public function LevelEdit($id){
		$level = Role::find($id);
		return view('master.LevelEdit')->with('level',$level);
	}

	public function LevelHapus($id){
		$level = Role::find($id);
		$level->delete();
		return redirect(route('level'));
	}

	public function UserHidupMati($id) {
		$user = User::find($id);
		$status = ($user->isactive == 1) ? 0 : 1 ;
		$user->isactive = $status;
		$user->save();
		return redirect($this->redirectUrl);
	}

	public function getUserLevel(){
		$user = User::join('role_user',function($join){
			$join->on('users.id', '=', 'role_user.user_id');
		})
		->join('roles','roles.id','=','role_user.role_id')
		->get(['users.id','users.name','users.name','users.email','users.username','users.isactive','roles.name as rolename']);

		return $user;
	}

	public function getVallevel($userid){
		$detil = DB::table('role_user')->whereRaw('user_id = ?',array($userid))->get();
		$a='';
		foreach ($detil as $key => $value) {
			$a .= '.'.$value->role_id;
		}
		return $a;
	}


}
