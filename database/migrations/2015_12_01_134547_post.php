<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Post extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('post', function(Blueprint $table)
		{
			$table->increments('postid');
			$table->integer('postauthor');
			$table->timestamp('postdate');
			$table->text('postcontent');
			$table->text('posttitle');
			$table->string('poststatus',20);
			$table->string('commentstatus',20);
			$table->string('postname',200);
			$table->timestamp('postmodified');
			$table->integer('postparent');
			$table->string('posttype');
			$table->string('image')->nullable();
			$table->timestamps();


		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('post');
	}

}
