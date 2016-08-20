<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Commands\DuplicateTalkCommand;
use App\Commands\CekHakAksesCommand;
use Illuminate\Http\Request;
use App\Wilayah;
use Route;
use DB;
use App\Http\Controllers\Setting;
class WilayahController extends Controller {
    
    public $setting;
    public function __construct(Setting $setting){
        $halaman = Route::getCurrentRoute()->getPath();
        $this->setting = $setting;
        $this->MenuMaster = $this->setting->MenuMaster();
    }

	public function index(){
        $menuList = $this->MenuMaster;
		$wilayah = Wilayah::orderBy('wilayahid','ASC')->orderBy('wilayahparentid')->get();
		return view('master.m_wilayah')->with('wilayahs',$wilayah)->with('MenuList',$menuList);
	}

    public function WilayahAdd(){
        $menuList = $this->MenuMaster;
        return view('master.m_wilayahAdd')->with('MenuList',$menuList);
    }

	public function duplicate($talkId)
    {
        $talk = Wilayah::findOrFail($talkId);

        $this->dispatch(new DuplicateTalkCommand($talk));

        // Depending on implementation, this could also just be:
        // $this->dispatch(new DuplicateTalkCommand($talkId));
    }

}
