<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MUserGroupDetil extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('m_user_group_detil', function(Blueprint $table){
			$table->unsignedInteger('groupid');
			$table->unsignedInteger('moduleid');
			$table->unsignedInteger('privid');
			$table->primary(['groupid', 'moduleid']);

			/*$table->foreign('groupid')
                  ->references('groupid')->on('m_user_group')
                  ->onDelete('cascade');
                  
            $table->foreign('moduleid')
                  ->references('moduleid')->on('m_module')
                  ->onDelete('cascade');

            $table->foreign('privid')
                  ->references('privid')->on('m_privileges')
                  ->onDelete('cascade');*/
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('m_user_group_detil');
	}

}
