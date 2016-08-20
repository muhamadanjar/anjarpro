<?php namespace App\Services;

use App\User;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;
use Session;
use DB;

class AnjarService {
	protected $baseurl;
	public function __construct(){
		$this->baseurl = url();
		DB::enableQueryLog();
	}
	public function ordered_menu($array,$parent_id = 0){
	  	$temp_array = array();
	  	foreach($array as $element){
	    	if($element->moduleparentid==$parent_id){
	      		$element->subs[] = $this->ordered_menu($array,$element->moduleid);
	      		//array_push($element->subs, $this->ordered_menu($array,$element->moduleid));
	      		$temp_array[] = $element;
	    	}
	  	}
	  return ($temp_array);
	}

	function html_ordered_menu($array,$parent_id = 0){

		$menu_html = ($parent_id == 0) ? '<ul id="navbar-menu" class="nav navbar-nav collapse">' : '<ul class="dropdown-menu dropdown-menu-right">' ;
	
	  	foreach($array as $element){
	    	if($element->moduleparentid==$parent_id){		
	    		if($parent_id == 0){ 
	    			$url = $element->moduleslug;
	    			$link = '<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="'.$url.'"><i class="'.$element->icon.'"></i><span>'.$element->modulename.'</span></a>';
	    			
	    		}else{
	    			$url = $this->baseurl.'/'.$element->moduleslug;
	    			$link = '<li><a href="'.$url.'">'.$element->modulename.'</a>';
	    		}
	      		$menu_html .= $link;
	      		$menu_html .= ($this->html_ordered_menu($array,$element->moduleid));
	      		
	      		$menu_html .= '</li>';
	    	}
	  	}
	  	$menu_html .= '</ul>';
	  	return $menu_html;
	}

	function html_ordered_menu_nav($array,$parent_id = 0){

		$menu_html = ($parent_id == 0) ? '<ul class="navigation">' : '<ul>' ;
	
	  	foreach($array as $element){
	    	if($element->moduleparentid==$parent_id){
	    		$url = $this->baseurl.'/'.$element->moduleslug;		
	    		if($parent_id == 0){ 
	    			$link = '<li><a href="'.$url.'"><i class="'.$element->icon.'"></i>'.$element->modulename.'</a>';
	    		}else{
	    			
	    			$link = '<li><a href="'.$url.'">'.$element->modulename.'</a>';

	    		}
	      		
	      		$menu_html .= $link;
	      		
	      		$menu_html .= ($this->html_ordered_menu_nav($array,$element->moduleid));
	      		
	      		$menu_html .= '</li>';
	      		
	    	}

	  	}
	  	$menu_html .= '</ul>';
	  	return $menu_html;
	}

	

	function get_menu_encore($data, $parent = 0) {

		static $i = 1;
		$tab = str_repeat(" ", $i);
		
		if(isset($data[$parent])){
			$html = "<ul class='navigation'>";
		  	$i++;
			foreach ($data[$parent] as $v) {
				echo $v->moduleid.' ';
		  		$child = $this->get_menu_encore($data, $v->moduleid);
		  		$html .= "$tab<li class='last'>";
		  		$html .= '<a class="" href="'.$v->moduleslug.'"><span>'. $v->modulename.'</span><i class="'.$v->modulename.'"></i></a>';
		  		if ($child) {
		  			$i--;
		  			$html .= "<ul>$child";
		  			$html .= "$tab</ul>";}
		  		$html .= '</li>';
		  	}
		  	$html .= "$tab</ul>";
		  	return $html;
		}else{
			return false;
		}
		 	
		
	}

	

	public function slug(){
		$slug = Route::getCurrentRoute()->getPath();
		$qs = DB::table('m_module')->where('moduleslug','=',$slug)->count();
		if ($qs <= 0) {
			print 'Modul tidak ditemukan. Hubungi Administrator!!!';
		}
		return $qs;
	}

	public function seo_title($s) {
	    $c = array (' ');
	    $d = array ('-','/','\\',',','.','#',':',';','\'','"','[',']','{','}',')','(','|','`','~','!','@','%','$','^','&','*','=','?','+');

	    $s = str_replace($d, '', $s); // Hilangkan karakter yang telah disebutkan di array $d
	    
	    $s = strtolower(str_replace($c, '-', $s)); // Ganti spasi dengan tanda - dan ubah hurufnya menjadi kecil semua
	    return $s;
	}

	public function rawmenu($user){
		$menu = DB::table('m_user_group_detil')
		->join('m_module','m_module.moduleid','=','m_user_group_detil.moduleid')
		->join('roles','roles.id','=','m_user_group_detil.groupid')
		->join('m_privileges','m_privileges.privid','=','m_user_group_detil.privid')
		->where('m_user_group_detil.groupid',$user)
		->where('m_module.status','1')
		->orderBy('urutan','asc')
		->get();
		return ($menu);
	}

	public function showquery(){
		return $querylog = DB::getQueryLog();
	}

	public function LayerUserESRI(){
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
				$optionfeature['opacity'] = $layer->option_opacity;
				$optionfeature['visible'] = $layer->option_visible;
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

	public function transaction(){
		// Start transaction!
		DB::beginTransaction();

		try {
		    // Validate, then create if valid
		    $newAcct = Account::create( ['accountname' => Input::get('accountname')] );
		} catch(ValidationException $e){
		    // Rollback and then redirect
		    // back to form with errors
		    DB::rollback();
		    return Redirect::to('/form')
		        ->withErrors( $e->getErrors() )
		        ->withInput();
		} catch(\Exception $e){
		    DB::rollback();
		    throw $e;
		}

		try {
		    // Validate, then create if valid
		    $newUser = User::create([
		        'username' => Input::get('username'),
		        'account_id' => $newAcct->id
		    ]);
		} catch(ValidationException $e){
		    // Rollback and then redirect
		    // back to form with errors
		    DB::rollback();
		    return Redirect::to('/form')
		        ->withErrors( $e->getErrors() )
		        ->withInput();
		} catch(\Exception $e){
		    DB::rollback();
		    throw $e;
		}

		// If we reach here, then
		// data is valid and working.
		// Commit the queries!
		DB::commit();
	}

	public function makehashtimefile($value=''){
		$this->fileName     = $input->getClientOriginalName();
        $this->extension    = $input->getClientOriginalExtension();
        $this->hashedName   = sha1(time() . $this->fileName);
        $this->path         = $this->hashedName . '.' .$this->extension;
	}

	public function listgambar($namafolder){
		$pathDir =  public_path('images')."/".$namafolder;
		$iconImageTable = url('images').'/'.$namafolder."/";
		$this->pathAddress = strtolower($pathDir);
		if (is_dir($pathDir)) {
			if ($handle = opendir($pathDir)) {
				$files = array();
				while ($files[] = readdir($handle));
				sort($files);
				foreach ($files as $file) {
					if ($file && (substr($file, 0, 1) != ".")) {
						$fileItem = $file;
						// get extension file name
						$countFile = $countFile + 1;
						$ext = substr(strrchr($fileItem, '.'), 1); // 2. The "strrchr" approach
						if($ext=='gif' or $ext=='jpg' or $ext=='JPG' or $ext=='jpeg' or $ext=='png'){
							$iconImage .= "<a href=\"".$iconImageTable.$file."\" data-lightbox=\"image-".$namafolder."\" title=\"".$file."\"><img src=\"".$iconImageTable.$file."\" alt=\"".""."\" height=\"106px\" width=\"115px\" /></a>";
							$c++;
						}
					}
				}
				if($c > 0){
					$foto = '<div class="row">'.$iconImage.'</div>';
					closedir($handle);

				}else{
					$foto = 'nophoto';
				}
				$c=0;
			}
		}else{
			$foto = 'nofolder';
		}
		return $foto;
	}

	function download($fullPath){
		if (file_exists($fullPath)) {
			if ($fd = fopen ($fullPath, "r")) {
			    $fsize = filesize($fullPath);
			    $path_parts = pathinfo($fullPath);
			    $ext = strtolower($path_parts["extension"]);
			    switch ($ext) {
			        case "pdf":
			        header("Content-type: application/pdf");
			        header("Content-Disposition: attachment; filename=\"".$path_parts["basename"]."\""); // use 'attachment' to force a file download
			        break;

			        case "jpg":
			        header('Content-Description: File Transfer');
				    header('Content-Type: application/octet-stream');
				    header("Content-Disposition: attachment; filename=\"".$path_parts["basename"]."\""); // use 'attachment' to force a file download
				    //header('Expires: 0');
				    //header('Cache-Control: must-revalidate');
				    //header('Pragma: public');
				 
			        break;
			        // add more headers for other content types here
			        default;
			        header("Content-type: application/octet-stream");
			        header("Content-Disposition: filename=\"".$path_parts["basename"]."\"");
			        break;
			    }
			    header("Content-length: $fsize");
			    header("Cache-control: private"); //use this to open files directly
			    while(!feof($fd)) {
			        $buffer = fread($fd, 2048);
			        echo $buffer;
			    }
			}
			fclose ($fd);
			exit;
		}else{
			return('Info File tidak ada');
			exit();
		}
	}

	function otomatis_kode($awalan,$table,$field){
		$sql="SELECT $field FROM `$table`ORDER BY `$table`.`$field` DESC LIMIT 1 ";
		$eks=$this->conn->Execute($sql);
		$last_rec=$eks->fields[0];
		$pisah=explode($awalan,$last_rec);
		$angka=$pisah[1];
		$angka++;
		if($angka<=9){
				$angka="0000".$angka;
		}elseif($angka<=99){
				$angka="000".$angka;
		}elseif($angka<=999){
				$angka="00".$angka;
		}elseif($angka<=9999){
				$angka="0".$angka;
		}elseif($angka<=99999){
				$angka=$angka;
		}else{
				$alert=eks::msg("Kode otomatis sudah dalam batas, silahkan kontak admin");
				return $alert;
				return false;
		}
		return $awalan.$angka;
	}

	

	function RandomStringScript() {
  //http://www.mediacollege.com/internet/javascript/number/random.html?randomfield=45654
  	echo <<<ESD
  	<script language="javascript" type="text/javascript">
  	function randomString() {
          var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz";
          var string_length = 8;
          var randomstring = '';
          for (var i=0; i<string_length; i++) {
                  var rnum = Math.floor(Math.random() * chars.length);
                  randomstring += chars.substring(rnum,rnum+1);
          }
          return randomstring;
  	}
	</script>
ESD;
	}

	//DMS2Decimal-106-49-0.5731-E
	public function DMS2Decimal($degrees = 0, $minutes = 0, $seconds = 0, $direction = 'n') {
	     //converts DMS coordinates to decimal
	     //returns false on bad inputs, decimal on success
	      
	     //direction must be n, s, e or w, case-insensitive
	     $d = strtolower($direction);
	     $ok = array('n', 's', 'e', 'w');
	      
	     //degrees must be integer between 0 and 180
	     if(!is_numeric($degrees) || $degrees < 0 || $degrees > 180) {
	          $decimal = false;
	     }
	     //minutes must be integer or float between 0 and 59
	     elseif(!is_numeric($minutes) || $minutes < 0 || $minutes > 59) {
	          $decimal = false;
	     }
	     //seconds must be integer or float between 0 and 59
	     elseif(!is_numeric($seconds) || $seconds < 0 || $seconds > 59) {
	          $decimal = false;
	     }
	     elseif(!in_array($d, $ok)) {
	          $decimal = false;
	     }
	     else {
	          //inputs clean, calculate
	          $decimal = $degrees + ($minutes / 60) + ($seconds / 3600);
	           
	          //reverse for south or west coordinates; north is assumed
	          if($d == 's' || $d == 'w') {
	               $decimal *= -1;
	          }
	     }
	      
	     return $decimal;
	}

	public function thumbnail( $img, $source, $dest, $maxw, $maxh ) {      
	    $jpg = $source.$img;

	    if( $jpg ) {
	        list( $width, $height  ) = getimagesize( $jpg ); //$type will return the type of the image
	        $source = imagecreatefromjpeg( $jpg );

	        if( $maxw >= $width && $maxh >= $height ) {
	            $ratio = 1;
	        }elseif( $width > $height ) {
	            $ratio = $maxw / $width;
	        }else {
	            $ratio = $maxh / $height;
	        }

	        $thumb_width = round( $width * $ratio ); //get the smaller value from cal # floor()
	        $thumb_height = round( $height * $ratio );

	        $thumb = imagecreatetruecolor( $thumb_width, $thumb_height );
	        imagecopyresampled( $thumb, $source, 0, 0, 0, 0, $thumb_width, $thumb_height, $width, $height );

	        $path = $dest.$img."_thumb.jpg";
	        imagejpeg( $thumb, $path, 75 );
	    }
	    imagedestroy( $thumb );
	    imagedestroy( $source );
	}

	public function uploadphp($value=''){
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

	public function folder_exist($folder){
	    // Get canonicalized absolute pathname
	    $path = realpath($folder);

	    // If it exist, check if it's a directory
	    return ($path !== false AND is_dir($path)) ? $path : false;
	}

	public function MakeGeoJSON($value=''){
		/*
		 * Title:   MySQL Points to GeoJSON
		 * Notes:   Query a MySQL table or view of points with x and y columns and return the results in GeoJSON format, suitable for use in OpenLayers, Leaflet, etc.
		 * Author:  Bryan R. McBride, GISP
		 * Contact: bryanmcbride.com
		 * GitHub:  https://github.com/bmcbride/PHP-Database-GeoJSON
		 */

		# Connect to MySQL database
		$conn = new PDO('pgsql:host=localhost;dbname=mypostgisdb','myusername','mypassword');

		# Build SQL SELECT statement including x and y columns
		$sql = 'SELECT *, x AS x, y AS y FROM mytable';

		/*
		* If bbox variable is set, only return records that are within the bounding box
		* bbox should be a string in the form of 'southwest_lng,southwest_lat,northeast_lng,northeast_lat'
		* Leaflet: map.getBounds().pad(0.05).toBBoxString()
		*/
		if (isset($_GET['bbox']) || isset($_POST['bbox'])) {
		    $bbox = explode(',', $_GET['bbox']);
		    $sql = $sql . ' WHERE x <= ' . $bbox[2] . ' AND x >= ' . $bbox[0] . ' AND y <= ' . $bbox[3] . ' AND y >= ' . $bbox[1];
		}

		# Try query or error
		$rs = $conn->query($sql);
		if (!$rs) {
		    echo 'An SQL error occured.\n';
		    exit;
		}

		# Build GeoJSON feature collection array
		$geojson = array(
		   'type'      => 'FeatureCollection',
		   'features'  => array()
		);

		# Loop through rows to build feature arrays
		while ($row = $rs->fetch(PDO::FETCH_ASSOC)) {
		    $properties = $row;
		    # Remove x and y fields from properties (optional)
		    unset($properties['x']);
		    unset($properties['y']);
		    $feature = array(
		        'type' => 'Feature',
		        'geometry' => array(
		            'type' => 'Point',
		            'coordinates' => array(
		                $row['x'],
		                $row['y']
		            )
		        ),
		        'properties' => $properties
		    );
		    # Add feature arrays to feature collection array
		    array_push($geojson['features'], $feature);
		}

		header('Content-type: application/json');
		echo json_encode($geojson, JSON_NUMERIC_CHECK);
		$conn = NULL;
	}

}