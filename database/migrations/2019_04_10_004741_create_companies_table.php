<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompaniesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('companies', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('address');
			$table->string('postcode');
			$table->string('country_id');
			$table->string('city');
			$table->string('phone');
			$table->string('mobile')->nullable();
			$table->string('fax')->nullable();
			$table->string('email');
			$table->string('web')->nullable();
			$table->string('logo')->nullable();
			$table->string('signature')->nullable();
			$table->string('tva');
			$table->string('bank');
			$table->string('bic');
			$table->string('status');
			$table->string('invoice_prefix');
			$table->string('credit_prefix');
			$table->string('quotation_prefix');
			$table->string('invoice_separator_prefix');
			$table->string('credit_separator_prefix');
			$table->string('quotation_separator_prefix');
			$table->timestamps();
			$table->string('command_prefix');
			$table->string('command_separator_prefix');
			$table->string('currency_id')->nullable();
			$table->integer('invoice_nbr')->nullable();
			$table->integer('credit_nbr')->nullable();
			$table->integer('quotation_nbr')->nullable();
			$table->integer('command_nbr')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('companies');
	}

}
