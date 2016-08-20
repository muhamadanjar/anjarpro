<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Services\AnjarService as Setting;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Post;
use App\Lib\AHelper;
use Validator;
use Redirect;
use DB;
class PostCtrl extends Controller {

	public function __construct(Setting $setting){
		//$this->middleware('auth');
		$this->middleware('notadmin');
		$this->setting = $setting;
		$this->_s = new AHelper();
		
	}
	public function PostList(){

		$result = DB::select(DB::raw("SELECT post.*,postcategory.categorypost,posttag.tagpost FROM post 
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
				FROM
				post
				INNER JOIN term_relation ON post.postid = term_relation.postid
				INNER JOIN term_taxonomy ON term_relation.termtaxonomyid = term_taxonomy.termtaxonomyid
				INNER JOIN terms ON term_taxonomy.termid = terms.termid 
				WHERE term_taxonomy.taxonomy = 'post_tag'
				GROUP BY post.postid
				) as posttag ON post.postid = posttag.postid
		"));
		

		
		return view('master.PostList')->with('post',$result);
	}
	public function PostAdd(){
		$kategori = \AHelper::GetKategoriSelect();
		$tags = \AHelper::GetTermsTagCheckBox();
		return view('master.PostAdd')->with('kategori',$kategori)
		->with('tags',$tags);
	}

	public function store(Request $request){
		$validator = Validator::make($request->all(), Post::$rules,Post::$messages);
		if(!$validator->passes()) {
			return Redirect::to('post-add')
			->with('message', \AHelper::format_message('Error,Coba lagi','cancel'))
			->withErrors($validator)
			->withInput();
		} else {
			DB::beginTransaction();
			try {

				$destinationPath = public_path('images');
				$fileName = str_random(20) . '.' . $request->file('image')->getClientOriginalExtension();	
				//dd($request->file('image')->getMimeType());
				$qlayer = ($request->postid == null) ? new \App\Post() : \App\Post::find($request->postid);
				$post = $qlayer;
				$post->postauthor = \Auth::user()->id;
				$post->postdate = date('Y-m-d H:i:s');
				$post->postcontent = $request->postcontent;
				$post->posttitle = $request->posttitle;
				$post->poststatus = $request->poststatus;
				$post->commentstatus = $request->commentstatus;
				$post->postname = $this->setting->seo_title($request->posttitle);
				$post->postmodified = date('Y-m-d H:i:s');
				$post->postparent = $request->postparent;
				$post->image = $fileName;
				$post->posttype = $request->posttype;
				if ($request->created_at != null) {
					$post->created_at = $request->created_at;
				}
				
				$post->save();
				$this->_s->UploadImage($request->file('image'));

				
				//$request->file('image')->move($destinationPath, $fileName);

			} catch(ValidationException $e){
			    // Rollback and then redirect
			    // back to form with errors
			    DB::rollback();
			    return Redirect::to('/post-add')
			        ->withErrors( $e->getErrors() )
			        ->withInput();	
			} catch (Exception $e) {
				DB::rollback();
			    throw $e;
			}

			try {
				if($request->postid != null){
					$postkategori = DB::table('term_relation')
						->where('postid',$post->postid);
					$postkategori->delete();
				}
				/*$kategori_term = $this->_s->GetDataTagKategori($post->postid);
				foreach ($kategori_term as $key) {
		            DB::table('term_relation')->insert($key);
		        }*/

		        $kategori_term = $this->_s->GetDataKategoriSelect($post->postid);
		        foreach ($kategori_term as $key) {
		            DB::table('term_relation')->insert($key);
		        }

		        $tag_term = $this->_s->GetDataTagKategori($post->postid,'tags');
				foreach ($tag_term as $key) {
		            DB::table('term_relation')->insert($key);
		        }
			} catch (Exception $e) {
				DB::rollback();
			}
			
			DB::commit();

			return redirect('post-list');
		}
		
	
	}

	public function PostEdit($id){
		//$post = Post::find($id);

		$post = Post::join(DB::raw("(SELECT post.postid,string_agg(terms.name,',') as categorypost, 
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
		
		->where("post.postid",$id)
		->first();


		$tag_isi = $post->tagpostid;
		
		

		$kategori = \AHelper::GetKategoriSelect();
		$tags = \AHelper::GetTermsTagCheckBox($tag_isi);
		return view('master.PostEdit')->with('post',$post)->with('kategori',$kategori)->with('tags',$tags);
	}



	public function PostDelete($id) {

		$post = Post::find($id);
		//\File::delete(public_path('images/' . $post->image));
		$post->delete();
		DB::table('term_relation')->where('postid',$id)->delete();
		\File::delete(public_path('images/' . $post->image));
		
		return redirect('post-list');
	}

	public function PostFind($term=''){
		$kata = trim($term);
		$kata = htmlentities(htmlspecialchars($kata), ENT_QUOTES);
		$pisah_kata = explode(" ",$kata);
		$jml_katakan = (integer)count($pisah_kata);
		$jml_kata = $jml_katakan-1;
		$post = Post::where('postcontent','LIKE','%' . ($term) . '%')
		->where('posttitle','LIKE','%' . ($term) . '%')
		->get();
	}

}
