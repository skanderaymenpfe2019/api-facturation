<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDesignationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('designations', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('quotation_id');
			$table->text('designation', 65535)->nullable();
			$table->string('unit_price');
			$table->string('tva');
			$table->string('qty');
			$table->string('unit_id');
			$table->timestamps();
			$table->integer('category_id')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('designations');
	}

}
