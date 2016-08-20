<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MWilayah extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('m_wilayah', function(Blueprint $table)
		{
			$table->increments('wilayahid');
			$table->string('wilayahnama');
			$table->string('wilayahkode');
			$table->string('wilayahsingkatan')->nullable();
			$table->integer('wilayahparentid');
			$table->integer('tingkatid');
			$table->string('kodepos',10)->nullable();
			//$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('m_wilayah');
	}

}
