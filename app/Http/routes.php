<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', 'WelcomeController@index');
Route::get('home', 'HomeController@index');
Route::get('blog.html', 'HomeController@showpostall');


Route::get('dashboard', ['as' => 'dashboard', 'uses' =>'AdminCtrl@index']);

/* Post*/
Route::get('post-list', ['as' => 'post', 'uses' =>'PostCtrl@PostList']);
Route::get('post-add', 	['as' => 'postadd', 'uses' => 'PostCtrl@PostAdd']);
Route::post('post-saveedit', ['as'=>'postsaveedit','uses'=>'PostCtrl@store']);
Route::get('post-edit-{id}', ['as' => 'postedit', 'uses' => 'PostCtrl@PostEdit']);
Route::get('post-delete-{id}', ['as' => 'postdelete', 'uses'=> 'PostCtrl@PostDelete']);

/**/

/* Category*/
Route::get('category-list', ['as' => 'category', 'uses' => 'TermCtrl@CategoryList']);
Route::get('category-add', 	['as' => 'categoryadd', 'uses' =>'TermCtrl@CategoryAdd']);
Route::post('category-add', 'TermCtrl@CategoryAddPost');
Route::get('category-edit-{id}', ['as' => 'categoryedit', 'uses' => 'TermCtrl@CategoryEdit']);
Route::post('category-edit-{id}', 'TermCtrl@CategoryEditPost');
Route::get('category-delete-{id}', ['as' => 'categorydelete', 'uses'=> 'TermCtrl@CategoryDelete']);

Route::get('tags-list', ['as' => 'tags', 'uses' => 'TermCtrl@TagList']);
Route::get('tags-add', 	['as' => 'tagsadd', 'uses' =>'TermCtrl@TagAdd']);
Route::post('tags-add', 'TermCtrl@TagAddPost');
Route::get('tags-edit-{id}', ['as' => 'tagsedit', 'uses' => 'TermCtrl@TagEdit']);
Route::post('tags-edit-{id}', 'TermCtrl@TagEditPost');
Route::get('tags-delete-{id}', ['as' => 'tagsdelete', 'uses'=> 'TermCtrl@TagDelete']);
/**/

/* Modul */
Route::get('modul-list', ['as' => 'modul', 'uses' => 'ModulCtrl@ModulList']);
Route::get('modul-add', ['as' => 'moduladd', 'uses' => 'ModulCtrl@ModulAdd']);
Route::post('modul-add', 'ModulCtrl@ModulAddPost');
Route::get('modul-edit-{id}', ['as' => 'moduledit', 'uses' => 'ModulCtrl@ModulEdit']);
Route::post('modul-edit-{id}', 'ModulCtrl@ModulEditPost');
Route::get('modul-delete-{id}', ['as' => 'moduldelete', 'uses' => 'ModulCtrl@ModulDelete']);
Route::get('modul-aktifmati-{id}', ['as' => 'modulaktif', 'uses' => 'ModulCtrl@ModulMati']);


/**/

/* User*/
Route::get('user',['as' => 'users', 'uses' => 'UserController@UserList']);
Route::get('user-add',['as' => 'useradd', 'uses' =>'UserController@UserAdd']);
Route::post('user-add','UserController@UserAddPost');
Route::get('user-edit-{id}',['as' => 'useredit', 'uses' => 'UserController@UserEdit']);
Route::post('user-edit-{id}','UserController@UserEditPost');
Route::get('user-hapus-{id}',['as' => 'userdelete', 'uses'=> 'UserController@UserHapus']);
Route::get('user-hidupmati-{id}',['as' => 'userhidupmati', 'uses'=> 'UserController@UserHidupMati']);
Route::get('level',['as' => 'level', 'uses' => 'UserController@LevelList']);
Route::get('level-add',['as' => 'leveladd', 'uses' => 'UserController@LevelAdd']);
Route::get('level-edit-{id}',['as' => 'leveledit', 'uses' => 'UserController@LevelEdit']);

Route::get('level-delete-{id}',['as' => 'leveldelete', 'uses' => 'UserController@LevelHapus']);
/*------------------------------------------*/

/* RTH*/
Route::get('rth-list',['as' => 'rth', 'uses' => 'RTHCtrl@RTHList']);
Route::get('rth-add',['as' => 'rthadd', 'uses' =>'RTHCtrl@RTHAdd']);
Route::post('rth-add','RTHCtrl@RTHAddPost');
Route::get('rth-edit-{id}',['as' => 'rthedit', 'uses' =>'RTHCtrl@RTHEdit']);
Route::post('rth-edit-{id}','RTHCtrl@RTHEditPost');
Route::post('rth-delete-{id}',['as' => 'rthdelete', 'uses' =>'RTHCtrl@RTHDelete']);
Route::get('get-rth-klasifikasi-{fungsirthid}','RTHCtrl@Getklasifikasirth');
/*------------------------------------------*/

/* Layer Esri*/
Route::get('layeresri-list',['as' => 'layeresri', 'uses' => 'LayerCtrl@LayerList']);
Route::get('layeresri-add',['as' => 'layeresri-add', 'uses' => 'LayerCtrl@LayerAddForm']);
Route::post('layeresri-add',['as' => 'layeresri-addpost', 'uses' => 'LayerCtrl@LayerAddFormPost']);
Route::get('layeresri-edit',['as' => 'layeresriedit', 'uses' => 'LayerCtrl@LayerAddForm']);
Route::get('layeresri-delete-{id}',['as' => 'layeresridelete', 'uses' => 'LayerCtrl@LayerDelete']);

/* Layer Openlayer*/
Route::get('layerol-list',['as' => 'layerol', 'uses' => 'LayerOLCtrl@index']);
Route::get('layerol-add',['as' => 'layeroladd', 'uses' => 'LayerOLCtrl@create']);
Route::post('layerol-saveedit',['as' => 'layerolsaveedit', 'uses' => 'LayerOLCtrl@store']);

Route::get('layerol-edit-{id}',['as' => 'layeroledit', 'uses' => 'LayerOLCtrl@edit']);

Route::get('layerol-delete-{id}',['as' => 'layeroldelete', 'uses' => 'LayerOLCtrl@destroy']);

/*------------Map------------------------------*/
Route::get('map', 'MapCtrl@map');
Route::get('map-google','MapCtrl@map_google');
Route::get('map-cmv',['as'=>'map-cmv','uses'=> 'MapCtrl@map_cmv']);
Route::get('map-openlayers',['as'=>'map-op','uses'=> 'MapCtrl@map_openlayers']);
Route::get('map-full','MapCtrl@map_custom');

Route::get('onedatamap','MapCtrl@onedatamap');

/*------------Develop------------------------------*/

Route::get('media-list','MediaCtrl@index');

Route::get('media-upload','MediaCtrl@blueimp');
Route::post('media-upload-proses','MediaCtrl@blueimp_upload');

Route::group(array('prefix'=>'api'), function(){

	Route::get('map/search/{term}', 'MapCtrl@show_layer');
	Route::get('map/getlayer', 'MapCtrl@getlayer');

	
});

Route::get('takephoto','Setting@takephoto');
Route::post('imagestring','Setting@imagestring');

Route::get('layout0', 'HomeController@layout0');
Route::get('backend', 'HomeController@backend');
Route::get('fullbackend', 'HomeController@fullbackend');


Route::get('setting-slug','Setting@slug');
Route::get('MenuMaster','Setting@MenuMaster');


Route::get('wilayah','WilayahController@index');
Route::get('wilayah-tambah','WilayahController@WilayahAdd');
Route::get('jgridData-{data}','ModulCtrl@ModulListJG');
Route::get('custom',function (){
	return view('video');
});
Route::post('/grid-data', function()
{
    GridEncoder::encodeRequestedData(new \App\Models\ExampleRepository(), Input::all());
});
/*------------------------------------------*/

// display single post
Route::get('/{slug}',['as' => 'fepost', 'uses' => 'HomeController@showpost'])->where('postname', '[A-Za-z0-9-_]+');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('cauth/login',  ['as' => 'login', 'uses' => 'CAuthController@getLogin']);   
Route::post('cauth/login', 'CAuthController@postLogin');
Route::get('cauth/logout', ['as' => 'logout', 'uses' => 'CAuthController@getLogout']);
