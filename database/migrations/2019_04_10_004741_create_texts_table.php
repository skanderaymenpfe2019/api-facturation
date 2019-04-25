<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTextsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('texts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('text', 10000)->nullable();
			$table->string('email')->nullable();
			$table->string('title', 1000)->nullable();
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
		Schema::drop('texts');
	}

}
