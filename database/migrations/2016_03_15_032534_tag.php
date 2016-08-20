<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tag extends Migration {


	public function up(){
		Schema::create('tags', function(Blueprint $table){
			$table->increments('tagid');
			$table->string('namatag');
			$table->string('tagseo');
			
		});
	}

	public function down()
	{
		Schema::drop('tags');
	}

}
