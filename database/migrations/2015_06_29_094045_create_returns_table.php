<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReturnsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('returns', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->integer('customer_id')->unsigned()->nullable();
			$table->foreign('customer_id')->references('id')
				  ->on('customers')->onDelete('set null');
			$table->date('date');
			$table->integer('reference_no');
			$table->integer('salesman')->unsigned()->nullable();
			$table->foreign('salesman')->references('id')->on('employees')
				  ->onDelete('set null');
			$table->string('area');
			$table->string('received_by');
			$table->string('checked_by');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('returns');
	}

}
