<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBadOrderItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bad_order_items', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->integer('bad_order_id')->unsigned();
			$table->foreign('bad_order_id')->references('id')->on('bad_orders')
					->onDelete('set null');
			$table->integer('box_id')->unsigned()->nullable();
			$table->foreign('box_id')->references('id')->('boxes')
					->onDelete('set null');
			$table->integer('no_of_box');
			$table->integer('no_of_packs');
			$table->decimal('amount', 11, 2);
			$table->integer('product_id')->unsigned()->nullable();
			$table->foreign('product_id')->references('id')->on('products')
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
		Schema::drop('bad_order_items');
	}

}
