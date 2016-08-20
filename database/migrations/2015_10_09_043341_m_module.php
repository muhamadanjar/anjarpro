<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MModule extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('m_module', function(Blueprint $table)
		{
			$table->increments('moduleid');
			$table->integer('moduleparentid')->default(0);
			$table->string('modulename');
			$table->string('moduleslug');
			$table->string('modulefile');
			$table->string('urutan');
			$table->integer('status');
			$table->string('type',10);
			$table->string('icon',40)->nullable();
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
		Schema::drop('m_module');
	}

}
