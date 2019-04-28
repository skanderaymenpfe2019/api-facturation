<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDesignationInvoicesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('designation_invoices', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('invoice_id')->references('id')->on('invoice');
			$table->text('designation', 65535)->nullable();
			$table->string('unit_price');
			$table->string('tva');
			$table->string('qty');
			$table->string('unit_id');
			$table->timestamps();
			$table->integer('category_id')->nullable();
			$table->float('devise_converted')->nullable();
			$table->float('taux_exchange', 10, 0)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('designation_invoices');
	}

}
