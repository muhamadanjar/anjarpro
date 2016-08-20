<?php namespace App\Http\Controllers;

use Route;
use URL;
use App\Services\AnjarService;
use DB;
class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct(AnjarService $setting){
		//$this->middleware('guest');
		$this->setting = $setting;
		
	}

	public function index(){
		
		return view('layout.frontend.home');
	}

	public function hasilcari($value='')
	{
		$kata = trim($_POST['kata']);
		$kata = htmlentities(htmlspecialchars($kata), ENT_QUOTES);
		$pisah_kata = explode(" ",$kata);
		$jml_katakan = (integer)count($pisah_kata);
		$jml_kata = $jml_katakan-1;


		$cari = "SELECT * FROM berita WHERE " ;
	  	for ($i=0; $i<=$jml_kata; $i++){
	  		$cari .= "isi_berita LIKE '%$pisah_kata[$i]%' or judul LIKE '%$pisah_kata[$i]%'";
	  		if ($i < $jml_kata ){
	  			$cari .= " OR "; 
	  		} 
	  	}
	  
	  	$cari .= " ORDER BY id_berita DESC LIMIT 3";


		$post = \App\Post::whereRaw('UPPER(postcontent) LIKE ?',array(strtoupper('%'.$term.'%')))
		->whereRaw('UPPER(posttittle) LIKE ?',array(strtoupper('%'.$term.'%')),'OR')
		->get();
	}

	/*public function getRoute__()
	{
		$a = Route::getCurrentRoute()->getPath();
		$b = Route::getCurrentRoute()->getActionName();
		$c = Route::getCurrentRoute();
		return $a;
	}

	function drawMenu ($listOfItems) {
	    echo "<ul>";
	    foreach ($listOfItems as $item) {
	        echo "<li>" . $item->name;
	        if ($item->hasChildren()) {
	            drawMenu($item->getChildren()); // here is the recursion
	        }
	        echo "</li>";
	    }
	    echo "</ul>";
	}

	public function ordered_menu($array,$parent_id = 0){
	  	$temp_array = array();
	  	foreach($array as $element){
	    	if($element['parent_id']==$parent_id){
	      		$element['subs'] = ordered_menu($array,$element['id']);
	      		$temp_array[] = $element;
	    	}
	  	}
	  return $temp_array;
	}

	function html_ordered_menu($array,$parent_id = 0){
	  	$menu_html = '<ul>';
	  	foreach($array as $element){
	    	if($element['parent_id']==$parent_id)		{
	      		$menu_html .= '<li><a href="'.$element['url'].'">'.$element['name'].'</a>';
	      		$menu_html .= ordered_menu($array,$element['id']);
	      		$menu_html .= '</li>';
	    	}
	  	}
	  	$menu_html .= '</ul>';
	  	return $menu_html;
	}


	public function menu($slug){
		$slug = Route::getCurrentRoute()->getPath();

		$results = DB::select('select mg.moduleid as GM
        from m_module m
        left outer join m_module mg on m.moduleid=mg.moduleparentid
        group by mg.urutan');
		if (file_exists($slug)) {
	      // cek apakah berhak mengakses? Harus dicek 1 per 1 karena mungkin 1 modul tersedia bagi banyak level
	      $sboleh = "select * from mdl where Script='$_SESSION[mnux]'";
	      $rboleh = _query($sboleh); $ktm = -1;
	      if (_num_rows($rboleh) > 0) {
	        while ($wboleh = _fetch_array($rboleh)) {
	          @$pos = strpos($wboleh['LevelID'], ".$_SESSION[_LevelID].");
	          if ($pos === false) {}
	          else $ktm = 1;
	        }
	        if ($ktm <= 0) {
	          echo ErrorMsg("Anda Tidak Berhak",
	            "Anda tidak berhak mengakses modul ini.<br />
	            Hubungi Sistem Administrator untuk memperoleh informasi lebih lanjut.
	            <hr size=1>
	            Pilihan: <a href='?mnux=&slnt=loginprc&slntx=lout'>Logout</a>");
	        }
	        else include_once $_SESSION['mnux'].'.php';
	      } else include_once $_SESSION['mnux'].'.php';
	      include_once "disconnectdb.php";
	    }
	    else echo ErrorMsg('Fatal Error', "Modul tidak ditemukan. Hubungi Administrator!!!<hr size=1 color=silver>
	    Pilihan: <a href='?mnux=&KodeID=$_SESSION[KodeID]'>Kembali</a>");
	    echo "</div>";
	}

	public function custom(){
		return $this->setting->rawmenu(1);
	}*/

	public function showpostall(){
		//$post = \App\Post::orderBy('created_at','desc')->get();

		$post = DB::select(DB::raw("SELECT post.*,postcategory.categorypost,posttag.tagpost,users.name AS postauthorname FROM post 
				INNER JOIN (
					SELECT
						post.postid,
						string_agg(terms.name,',') as categorypost
					FROM
						post
					INNER JOIN term_relation ON post.postid = term_relation.postid
					INNER JOIN term_taxonomy ON term_relation.termtaxonomyid = term_taxonomy.termtaxonomyid
					INNER JOIN terms ON term_taxonomy.termid = terms.termid 
					WHERE term_taxonomy.taxonomy = 'post_category'
					GROUP BY post.postid
				) as postcategory ON post.postid = postcategory.postid

				LEFT JOIN (
				SELECT
					post.postid,
					string_agg(terms.name,',') as tagpost
				FROM post
					INNER JOIN term_relation ON post.postid = term_relation.postid
					INNER JOIN term_taxonomy ON term_relation.termtaxonomyid = term_taxonomy.termtaxonomyid
					INNER JOIN terms ON term_taxonomy.termid = terms.termid 
					WHERE term_taxonomy.taxonomy = 'post_tag'
					GROUP BY post.postid
				) as posttag ON post.postid = posttag.postid

				INNER JOIN users on post.postauthor = users.id

			"));



		return view('frontend.blog')->with('post',$post);
	}

	public function showpost($slug){


		$post = \App\Post::join(DB::raw("(SELECT post.postid,string_agg(terms.name,',') as categorypost, 
				array_to_string(array_agg(terms.termid),';') as kategoripostid
			FROM post
			INNER JOIN term_relation ON post.postid = term_relation.postid
			INNER JOIN term_taxonomy ON term_relation.termtaxonomyid = term_taxonomy.termtaxonomyid
			INNER JOIN terms ON term_taxonomy.termid = terms.termid 
			WHERE term_taxonomy.taxonomy = 'post_category'
			GROUP BY post.postid
		) as postcategory"),
		function($join){
			$join->on('post.postid', '=', 'postcategory.postid');
		})
		->leftjoin(DB::raw("(SELECT post.postid,string_agg(terms.name,',') as tagpost,
			array_to_string(array_agg(terms.termid),';') as tagpostid 
			FROM post
			INNER JOIN term_relation ON post.postid = term_relation.postid
			INNER JOIN term_taxonomy ON term_relation.termtaxonomyid = term_taxonomy.termtaxonomyid
			INNER JOIN terms ON term_taxonomy.termid = terms.termid 
				WHERE term_taxonomy.taxonomy = 'post_tag'
				GROUP BY post.postid) as posttag"),
		function($join){
			$join->on('post.postid', '=', 'posttag.postid');
				
		})
		->where("post.postname",$slug)
		->first();
		
		if($post){
			if($post->poststatus == false)
				//return redirect('/')->withErrors('requested page not found');
				return view('errors.404');
			$comments = $post->comments;	
		}else {
			//return redirect('/')->withErrors('requested page not found');
			return view('errors.404');
		}
		return view('frontend.blogitem')->with('post',$post);
	}

}
