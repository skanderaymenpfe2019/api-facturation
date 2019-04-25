<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRegulationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('regulations', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('invoice_id');
			$table->string('client_id');
			$table->date('date');
			$table->string('payment_mode');
			$table->string('regulation');
			$table->string('remark')->nullable();
			$table->string('status');
			$table->softDeletes();
			$table->timestamps();
			$table->float('devise_converted')->nullable();
			$table->float('taux_exchange', 10, 0)->nullable();
			$table->integer('credit_id')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('regulations');
	}

}
