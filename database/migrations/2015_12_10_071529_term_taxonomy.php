<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TermTaxonomy extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('term_taxonomy', function(Blueprint $table)
		{
			$table->increments('termtaxonomyid');
			$table->unsignedInteger('termid');
			$table->string('taxonomy',32);
			$table->text('description')->nullable();
			$table->bigInteger('parent')->default(0);
			$table->bigInteger('count');
			
			
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('term_taxonomy');
	}

}
