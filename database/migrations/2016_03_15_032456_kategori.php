<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Kategori extends Migration {

	public function up()
	{
		Schema::create('kategori', function(Blueprint $table){
			$table->increments('kategoriid');
			$table->string('namakategori');
			$table->string('kategoriseo');
			$table->boolean('kategoriaktif')->default(true);
		});
	}

	public function down()
	{
		Schema::drop('kategori');
	}

}
