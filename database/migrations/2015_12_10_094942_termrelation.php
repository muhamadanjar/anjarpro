<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Termrelation extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('term_relation', function(Blueprint $table)
		{
			$table->unsignedInteger('postid');
			$table->unsignedInteger('termtaxonomyid');
			$table->integer('termorder')->default(0);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('term_relation');
	}

}
