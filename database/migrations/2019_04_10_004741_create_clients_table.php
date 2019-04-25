<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('clients', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('ref')->nullable();
			$table->string('name')->nullable();
			$table->string('email', 100)->nullable();
			$table->string('address')->nullable();
			$table->string('postcode')->nullable();
			$table->string('city')->nullable();
			$table->string('tva')->nullable();
			$table->string('country_id')->nullable();
			$table->string('phone')->nullable();
			$table->string('fax')->nullable();
			$table->string('status')->nullable();
			$table->softDeletes();
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
		Schema::drop('clients');
	}

}
