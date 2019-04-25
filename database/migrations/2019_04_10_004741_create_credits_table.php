<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCreditsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('credits', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('client_id')->nullable();
			$table->string('ref')->nullable();
			$table->string('remark')->nullable();
			$table->date('date')->nullable();
			$table->string('ref_client')->nullable();
			$table->string('name')->nullable();
			$table->string('email', 100)->nullable();
			$table->string('address')->nullable();
			$table->string('postcode')->nullable();
			$table->string('city')->nullable();
			$table->string('tva_client')->nullable();
			$table->string('country_id')->nullable();
			$table->string('phone')->nullable();
			$table->string('fax')->nullable();
			$table->string('status')->nullable();
			$table->string('refund')->nullable();
			$table->timestamps();
			$table->string('currency_id')->nullable();
			$table->integer('invoice_id')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('credits');
	}

}
