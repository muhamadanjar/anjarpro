<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Terms;
use App\Taxonomy;
use Illuminate\Http\Request;
use App\Services\AnjarService as Setting;

use DB;

class TermCtrl extends Controller {
	public function __construct (Setting $setting){
		$this->middleware('notadmin');
		$this->setting = $setting;

		$this->redirectUrl = 'category-list';
	}
	public function CategoryList(){
		$category  = $this->TermQuery('post_category');
		return view('master.TermCategoryList')->with('category',$category);
			
	}
	public function CategoryAdd(){
		return view('master.TermCategoryAdd');
	}

	public function CategoryAddPost(Request $request){
		
		DB::beginTransaction();

		try {

		  	$category = new Terms();
		  	$category->name = $request->name;
			$category->slug = $this->setting->seo_title($request->name);
			$category->term_group = 0;
			$category->save();
		} catch(ValidationException $e){

		    DB::rollback();
		    return Redirect::to('/form')
		        ->withErrors( $e->getErrors() )
		        ->withInput();
		} catch(\Exception $e){
		    DB::rollback();
		    throw $e;
		}

		try {

		    $taxonomy = new Taxonomy();
		    $taxonomy->termid = $category->termid;
			$taxonomy->taxonomy = 'post_category';
			$taxonomy->parent = 0;
			$taxonomy->count = 0;
			$taxonomy->save();

		} catch(ValidationException $e){

		    DB::rollback();
		    return Redirect::to('/form')
		        ->withErrors( $e->getErrors() )
		        ->withInput();
		} catch(\Exception $e){
		    DB::rollback();
		    throw $e;
		}
		DB::commit();

		return redirect($this->redirectUrl);

	}

	public function CategoryEdit($id){
		$category = Terms::find($id);
		return view('master.TermCategoryEdit')->with('category',$category);
	}

	public function CategoryEditPost(Request $request){
		
		$category = Terms::find($request->termid);
		$category->name = $request->name;
		$category->slug = $this->setting->seo_title($request->name);
		$category->term_group = 0;
		$category->save();
		return redirect($this->redirectUrl);

	}

	public function CategoryDelete($id){
		$category = Terms::find($id);
		$taxonomy = Taxonomy::where('termid',$id)->where('taxonomy','post_category');
			
		if($category->delete()){
			$taxonomy->delete();
		}
		return redirect($this->redirectUrl);
	}
	//===================================================================
	public function TagList(){
		$tags  = $this->TermQuery('post_tag');
		return view('master.TermTagList')->with('tags',$tags);	
	}

	public function TagAdd(){
		return view('master.TermTagAdd');
	}

	public function TagAddPost(Request $request){
		
		DB::beginTransaction();

		try {

		  	$category = new Terms();
		  	$category->name = $request->name;
			$category->slug = $this->setting->seo_title($request->name);
			$category->term_group = 0;
			$category->save();
		} catch(ValidationException $e){

		    DB::rollback();
		    return Redirect::to('/form')
		        ->withErrors( $e->getErrors() )
		        ->withInput();
		} catch(\Exception $e){
		    DB::rollback();
		    throw $e;
		}

		try {

		    $taxonomy = new Taxonomy();
		    $taxonomy->termid = $category->termid;
			$taxonomy->taxonomy = 'post_tag';
			$taxonomy->parent = 0;
			$taxonomy->count = 0;
			$taxonomy->save();

		} catch(ValidationException $e){

		    DB::rollback();
		    return Redirect::to('/form')
		        ->withErrors( $e->getErrors() )
		        ->withInput();
		} catch(\Exception $e){
		    DB::rollback();
		    throw $e;
		}
		DB::commit();

		return redirect($this->redirectUrl);

	}

	public function TagEdit($id){
		$tag = Terms::find($id);
		return view('master.TermTagEdit')->with('tags',$Tag);
	}

	public function TagEditPost(Request $request,$id){
		$category = Terms::find($request->termid);
		$category->name = $request->name;
		$category->slug = $this->setting->seo_title($request->name);
		$category->term_group = 0;
		$category->save();
		return redirect($this->redirectUrl);

	}

	public function TagDelete($id){
		$category = Terms::find($id);
		$taxonomy = Taxonomy::where('termid',$id)->where('taxonomy','post_tag');
			
		if($category->delete()){
			$taxonomy->delete();
		}
		return redirect($this->redirectUrl);
	}

	public function TermQuery($jenis = ''){
		$table = 'terms';$table_foreign = 'term_taxonomy';
		$jenis = ($jenis=='') ? 'post_category' : $jenis;
		$category = DB::table($table)
		->join($table_foreign,$table_foreign.'.termid','=',$table.'.termid')
		->where('taxonomy',$jenis)->get();
		return $category;
	}
	public function custom(){
		$category = Taxonomy::where('termid','=',1)->get();
		return json_encode($category);
	}

}
