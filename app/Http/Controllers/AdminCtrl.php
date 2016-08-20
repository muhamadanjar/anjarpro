<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AdminCtrl extends Controller {

	public function __construct(){
		$this->middleware('auth');
	}
	public function index(){
		return view('dashboard');
	}

}
