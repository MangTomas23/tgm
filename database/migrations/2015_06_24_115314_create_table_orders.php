<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableOrders extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orders', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
            $table->date('date');
            $table->integer('salesman_id')->unsigned()->nullable();
            $table->foreign('salesman_id')
                  ->references('id')
                  ->on('employees')
                  ->onDelete('set null');
            $table->integer('customer_id')->unsigned()->nullable();
            $table->foreign('customer_id')
                  ->references('id')
                  ->on('customers')
                  ->onDelete('set null');
            $table->string('type');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('orders');
	}

}
