<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FloatLatLon extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
                Schema::table('data', function(Blueprint $table)
                {
                        $table->float('lat')->change();
                        $table->float('lon')->change();
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
                        $table->integer('lat')->change();
                        $table->integer('lon')->change();
                });
	}

}
