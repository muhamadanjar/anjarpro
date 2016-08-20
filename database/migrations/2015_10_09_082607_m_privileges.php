<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MPrivileges extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('m_privileges', function(Blueprint $table)
		{
			$table->increments('privid');
			$table->string('privname');
			$table->integer('r');
			$table->integer('e');
			$table->integer('a');
			$table->integer('d');
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
		Schema::drop('m_privileges');
	}

}
