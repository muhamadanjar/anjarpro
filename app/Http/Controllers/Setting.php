<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Route;
use DB;
use Illuminate\Http\Request;

class Setting extends Controller {
	protected $baseurl;
	public function __construct(){
		$this->baseurl = url();
	}

	public function ordered_menu($array,$parent_id = 0){
	  	$temp_array = array();
	  	foreach($array as $element){
	    	if($element->moduleparentid==$parent_id){
	      		$element->subs += $this->ordered_menu($array,$element->moduleid);
	      		$temp_array[] += $element;
	    	}
	  	}
	  return ($temp_array);
	}

	function html_ordered_menu($array,$parent_id = 0){
	  	$menu_html = '<ul class="nav navbar-nav">';
	  	foreach($array as $element){
	    	if($element->moduleparentid==$parent_id)		{
	      		$menu_html .= '<li class="dropdown"><a href="'.$this->baseurl.'/'.$element->moduleslug.'">'.$element->modulename.'</a>';
	      		$menu_html .= ($this->html_ordered_menu($array,$element->moduleid));
	      		$menu_html .= '</li>';
	    	}
	  	}
	  	$menu_html .= '</ul>';
	  	return $menu_html;
	}

	public function MenuMaster()
	{
		$md = DB::table('m_module')->get();
		$md_ = $this->html_ordered_menu($md);
		return $md_;
	}

	public function MenuMasterArray()
	{
		$md = DB::table('m_module')->get();

		$md_ = $this->ordered_menu($md);
		return $md_;
	}

	public function slug(){
		$slug = Route::getCurrentRoute()->getPath();
		$qs = DB::table('m_module')->where('moduleslug','=',$slug)->count();
		if ($qs <= 0) {
			print 'Modul tidak ditemukan. Hubungi Administrator!!!';
		}
		return $qs;
	}

	public function takephoto(){
		return view('takephoto');
	}

	public function imagestring(){
		$data = $_POST['data'];
		$img = str_replace('data:image/png;base64,', '', $data);
		$img = str_replace(' ', '+', $img);
		$data = base64_decode($img);
		$filepng = uniqid() . '.png';
		$file = "./images/poi/". $filepng;
		$success = file_put_contents($file, $data);
		print $success ? $filepng : 'Unable to save the file.'.$data;
	}
}