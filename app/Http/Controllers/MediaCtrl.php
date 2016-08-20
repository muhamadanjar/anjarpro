<?php namespace App\Http\Controllers;

//use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Media;
use App\Lib\UploadHandler;

class MediaCtrl extends Controller {


	public function index(){
		return view('master.MediaList');
	}


	public function create(){
		
	}


	public function store(Request $request)
	{

		$destinationPath = public_path('images');
		$fileName = str_random(20) . '.' . $request->file('image')->getClientOriginalExtension();
		
		$media = new Media;

		$media->name = $request->name;
		$media->caption = $request->caption;
		$media->alttext = $request->alttext;
		$media->description = $request->description;
		
		$media->file = $fileName;
		
		$media->save();

		$request->file('image')->move($destinationPath, $fileName);

		return redirect('media-list');
	}


	public function show($id){
		//
	}


	public function edit($id)
	{
		

	}


	public function update($id)
	{
		//
	}


	public function destroy($id)
	{
		//
	}

	public function handle_upload(){
		$upload_handler = new UploadHandler();
	}

	public function uploadphpPost(Request $request){
		// upload.php
		// 'images' refers to your file input name attribute
		if (empty($_FILES['images'])) {
		    echo json_encode(['error'=>'No files found for upload.']); 
		    // or you can throw an exception 
		    return; // terminate
		}
		 
		// get the files posted
		$images = $_FILES['images'];
		 
		// get user id posted
		$userid = empty($_POST['userid']) ? '' : $_POST['userid'];
		 
		// get user name posted
		$username = empty($_POST['username']) ? '' : $_POST['username'];
		 
		// a flag to see if everything is ok
		$success = null;
		 
		// file paths to store
		$paths= [];
		 
		// get file names
		$filenames = $images['name'];
		 
		// loop and process files
		for($i=0; $i < count($filenames); $i++){
		    $ext = explode('.', basename($filenames[$i]));
		    $target = "uploads" . DIRECTORY_SEPARATOR . md5(uniqid()) . "." . array_pop($ext);
		    if(move_uploaded_file($images['tmp_name'][$i], $target)) {
		        $success = true;
		        $paths[] = $target;
		    } else {
		        $success = false;
		        break;
		    }
		}
		 
		// check and process based on successful status 
		if ($success === true) {
		    // call the function to save all data to database
		    // code for the following function `save_data` is not 
		    // mentioned in this example
		    save_data($userid, $username, $paths);
		 
		    // store a successful response (default at least an empty array). You
		    // could return any additional response info you need to the plugin for
		    // advanced implementations.
		    $output = [];
		    // for example you can get the list of files uploaded this way
		    // $output = ['uploaded' => $paths];
		} elseif ($success === false) {
		    $output = ['error'=>'Error while uploading images. Contact the system administrator'];
		    // delete any uploaded files
		    foreach ($paths as $file) {
		        unlink($file);
		    }
		} else {
		    $output = ['error'=>'No files were processed.'];
		}
		 
		// return a json encoded response for plugin to process successfully
		echo json_encode($output);
	
	}

	public function blueimp(){
<<<<<<< HEAD
<<<<<<< HEAD
		return view('master.Media_blueimp');
=======
		return view('master.Media2');
>>>>>>> a8494fcaf56055ca0d8fa3cc1176e415b8933627
=======
		return view('master.Media2');
>>>>>>> a8494fcaf56055ca0d8fa3cc1176e415b8933627
	}


	public function blueimp_upload($value=''){
		error_reporting(E_ALL | E_STRICT);
		

		$upload_dir = public_path('images').'/uploads/'; //specify path to your upload folder

		$upload_handler = new UploadHandler(array(
			'max_file_size' => 2048576, //1MB file size
			'image_file_types' => '/\.(gif|jpe?g|png)$/i',
			'upload_dir' => $upload_dir,
			'upload_url' => 'http://localhost/anjarpro/public/images/uploads/',
			'thumbnail' => array('max_width' => 80,'max_height' => 80)
		));
	}

}
