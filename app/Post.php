<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {

	protected $table = 'post';

	protected $primaryKey = 'postid';

	//public $timestamp = false;
	public static $rules = array(
		'posttitle'=>'required|min:3',
		'postcontent' => 'required',
        'tags' => 'required',
		'kategori'=>'required',
		'image' => 'required',
	);

	public static $messages = [
	    'posttitle.required' => 'Nama Berita harus diisi!',
	    'postcontent.required' => 'Isi Berita harus diisi!',
	    'kategori.required' => 'Kategori harus diisi!',
	    'image.required' => 'Gambar harus diisi!',
	];


	public function kategori(){
        return $this->belongsToMany('App\Kategori');
    }

    public function hasKategori($name){
        foreach($this->kategori as $kat){
            if ($kat->namakategori === $name) return true;
        }
        return false;
    }

    public function author(){
		return $this->belongsTo('App\User','postauthor');
	}

	

}
