<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForgotId extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('data', function(Blueprint $table)
                {
                        $table->increments('id');
                });
                Schema::table('tags', function(Blueprint $table)
                {
                        $table->increments('id');
                });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
                Schema::table('data', function(Blueprint $table)
                {
                        $table->dropColumn('id');
                });
                Schema::table('tags', function(Blueprint $table)
                {
                        $table->dropColumn('id');
                });
	}

}
