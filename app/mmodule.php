<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class mmodule extends Model {

	protected $table = 'm_module';
	protected $primaryKey = 'moduleid';
	public function roles(){
        return $this->belongsToMany('App\Role','m_user_group_detil','groupid','groupid');
    }

    public static $rules = array(
		'modulename'=>'required|min:3',
		'moduleslug' => 'required',
        'modulefile' => 'required',
		'urutan'=>'numeric|required',
		'level' => 'required',
	);

	public static $messages = [
	    'modulename.required' => 'Nama Modul harus diisi!',
	    'moduleslug.required' => 'Url harus diisi!',
	    'modulefile.required' => 'Modul File harus diisi!',
	    'urutan.required' => 'Urutan harus diisi!',
	    'level.required' => 'Level harus diisi!',

	];



}
