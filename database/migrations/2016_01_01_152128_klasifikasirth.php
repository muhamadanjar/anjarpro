<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Klasifikasirth extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('klasifikasi_rth',function($t){
			$t->increments('id')->unique();
			$t->integer('fungsirthid');
			$t->string('klasifikasirth',50);

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('klasifikasi_rth');
	}

}
