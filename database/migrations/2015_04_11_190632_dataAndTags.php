<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DataAndTags extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
                Schema::create('tags', function(Blueprint $table)
                {
                        $table->string('name')->index();
                        $table->timestamp('created_at');
                });
                Schema::create('data', function(Blueprint $table)
                {
                        $table->integer('lat');
                        $table->integer('lon');
                        $table->integer('tag_id');
                        $table->date('date');
                        $table->string('zoom');
                        $table->timestamp('created_at');
                });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
                Schema::drop('tags');
                Schema::drop('data');
	}

}
