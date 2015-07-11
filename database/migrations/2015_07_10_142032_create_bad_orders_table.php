<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBadOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bad_orders', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->string('truck_no')->nullable();
			$table->date('date');
			$table->string('received_by')->nullable();
			$table->integer('salesman')->unsigned()->nullable();
			$table->foreign('salesman')->references('id')->on('employees')
					->onDelete('set null');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('bad_orders');
	}

}
