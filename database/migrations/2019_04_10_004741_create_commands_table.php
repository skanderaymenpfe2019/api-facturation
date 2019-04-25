<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCommandsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('commands', function(Blueprint $table)
		{
			$table->increments('id');
			$table->foreign('client_id')->references('id')->on('clients');
			$table->string('ref')->nullable();
			$table->string('regulation')->nullable();
			$table->string('remark')->nullable();
			$table->date('date')->nullable();
			$table->date('date_deadline')->nullable();
			$table->string('ref_client')->references('ref')->on('clients');
			$table->string('name')->nullable();
			$table->string('email', 100)->nullable();
			$table->string('address')->nullable();
			$table->string('postcode')->nullable();
			$table->string('city')->nullable();
			$table->string('tva_client')->references('tva')->on('clients');
			$table->string('country_id')->nullable();
			$table->string('phone')->nullable();
			$table->string('fax')->nullable();
			$table->string('payment_mode')->nullable();
			$table->string('total_price')->nullable();
			$table->string('advance')->nullable();
			$table->string('invoiced')->nullable();
			$table->string('status')->nullable();
			$table->string('currency_id')->nullable();
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
		Schema::drop('commands');
	}

}
