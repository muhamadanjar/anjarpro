<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GeoRthPublik extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('geo_rth_publik', function($t)
		{
			$t->increments('id')->unique();
			$t->string('nama_rth');
			$t->string('kelompok_rth');
			$t->integer('kelurahan');
			$t->integer('luas_m2');
			$t->double('kordinat_x');
			$t->double('kordinat_y');
			$t->integer('fungsi_rth');
			$t->integer('klasifikasi_rth');
			$t->string('vegetasi');
			$t->string('furniture');
			$t->string('tahun_survey');
			$t->string('kepemilikan');
			$t->text('image_link')->nullable();
			$t->string('status',1)->default(0);
		});

		DB::unprepared("ALTER TABLE geo_rth_publik ADD COLUMN geom GEOMETRY(POINT, 4326)"); 
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('geo_rth_publik');
	}

}
