<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PostKategori extends Migration {

	public function up(){
		Schema::create('post_kategori', function(Blueprint $table){
			$table->unsignedInteger('kategori_id');
			$table->unsignedInteger('post_id');
			$table->primary(['kategori_id', 'post_id']);
		});
	}

	public function down(){
		Schema::drop('post_kategori');
	}

}
