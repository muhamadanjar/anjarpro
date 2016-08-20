<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\RTH;
use Illuminate\Http\Request;
use DB;

class RTHCtrl extends Controller {

	public function __construct(){
		$this->middleware('auth');

		$this->redirectUrl = 'rth-list';
	}

	public function RTHList(){
		$rth = RTH::all();
		
		return view('forms.rth.RTHList')->with('list_rth',$rth);
	}
	public function RTHAdd(){
		$kelurahan = DB::table('kelurahan_rth')->get();
		$fungsi = DB::table('fungsi_rth')->where('statusrth','publik')->get();
		return view('forms.rth.RTHAdd')->with('kelurahan',$kelurahan)->with('fungsi',$fungsi);
	}

	public function RTHAddPost(Request $request){
		$file = $request->file('image_link');

		$rth = new RTH();
		$rth->nama_rth = $request->nama_rth;
		$rth->kelompok_rth = $request->kelompok_rth;
		$rth->kelurahan = $request->kelurahan;
		if(!empty($file)){
			$destinationPath = public_path('images').'/rth';
			//$fileName = $file->getClientOriginalName();
			$fileName = str_random(20) . '.' . $file->getClientOriginalExtension();
			$pathFilename = 'images/rth/'.$fileName;

			$file->move($destinationPath, $fileName);
			$rth->image_link = $fileName;
		}
		$rth->luas_m2 = $request->luas_m2;
		$rth->kordinat_x = $request->kordinat_x;
		$rth->kordinat_y = $request->kordinat_y;
		$rth->fungsi_rth = $request->fungsi_rth;
		$rth->klasifikasi_rth = $request->klasifikasi_rth;
		$rth->vegetasi = $request->vegetasi;
		$rth->furniture = $request->furniture;
		$rth->tahun_survey = $request->tahun_survey;
		$rth->kepemilikan = $request->kepemilikan;
		$rth->geom = DB::raw("ST_GeomFromText('POINT({$request->kordinat_x} {$request->kordinat_y})', 4326)");
		
		$rth->save();

		return redirect($this->redirectUrl);
	}

	public function RTHEdit(){
		return view('forms.rth.RTHEdit');
	}

	public function RTHEditPost(Request $request){
		$file = $request->file('image_link');

		$rth = RTH::find($request->id);
		$rth->nama_rth = $request->nama_rth;
		$rth->kelompok_rth = $request->kelompok_rth;
		$rth->kelurahan = $request->kelurahan;
		if(!empty($file)){
			$destinationPath = public_path('images').'/rth';
			//$fileName = $file->getClientOriginalName();
			$fileName = str_random(20) . '.' . $file->getClientOriginalExtension();
			$pathFilename = 'images/rth/'.$fileName;

			$file->move($destinationPath, $fileName);
			$rth->image_link = $fileName;
		}
		$rth->luas_m2 = $request->luas_m2;
		$rth->kordinat_x = $request->kordinat_x;
		$rth->kordinat_y = $request->kordinat_y;
		$rth->fungsi_rth = $request->fungsi_rth;
		$rth->klasifikasi_rth = $request->klasifikasi_rth;
		$rth->vegetasi = $request->vegetasi;
		$rth->furniture = $request->furniture;
		$rth->tahun_survey = $request->tahun_survey;
		$rth->kepemilikan = $request->kepemilikan;
		$rth->geom = DB::raw("ST_GeomFromText('POINT({$request->kordinat_x} {$request->kordinat_y})', 4326)");
		$rth->save();
		return redirect($this->redirectUrl);
	}

	public function RTHDelete($id){
		$rth = RTH::find($id);
		$rth->delete();

		return redirect($this->redirectUrl);
	}

	public function Getklasifikasirth($fungsirthid){
		$kla = '<option value="0">-------</option>';
		$kl = DB::table('klasifikasi_rth')->where('fungsirthid',$fungsirthid)->orderBy('id','asc')->get();
		foreach ($kl as $key => $value) {
			$kla .= '<option value="'.$value->id.'">'.$value->klasifikasirth.'</option>';
		}

	return $kla;
	}



}
