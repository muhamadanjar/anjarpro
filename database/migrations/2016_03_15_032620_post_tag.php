<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PostTag extends Migration {

	public function up(){
		Schema::create('post_tags', function(Blueprint $table){
			$table->unsignedInteger('tag_id');
			$table->unsignedInteger('post_id');
			$table->primary(['tag_id', 'post_id']);
		});
	}


	public function down(){
		Schema::drop('post_tag');
	}

}
