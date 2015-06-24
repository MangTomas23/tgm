<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('order_items', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->integer('order_id')->unsigned()->nullable();
			$table->foreign('order_id')->references('id')->on('orders')->onDelete('set null');
			$table->integer('product_id')->unsigned()->nullable();
			$table->foreign('product_id')->references('id')->on('products')->onDelete('set null');
			$table->integer('box_id')->unsigned()->nullable();
			$table->foreign('box_id')->references('id')->on('boxes')->onDelete('set null');
			$table->integer('no_of_box')->unsigned();
			$table->integer('no_of_packs')->unsigned();
			$table->decimal('amount', 11, 2)->unsigned();
			$table->integer('selling_price')->unsigned();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('order_items');
	}

}
