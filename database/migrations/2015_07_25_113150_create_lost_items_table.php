<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLostItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lost_items', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->integer('lost_id')->unsigned();
			$table->integer('no_of_box')->unsigned();
			$table->integer('no_of_packs')->unsigned();
			$table->decimal('amount', 11, 2)->unsigned();
			$table->integer('product_id')->unsigned()->nullable();
			$table->integer('box_id')->unsigned()->nullable();

			$table->foreign('product_id')->references('id')->on('products')
				->onDelete('set null');
			$table->foreign('lost_id')->references('id')->on('losts')
				->onDelete('cascade');
			$table->foreign('box_id')->references('id')->on('boxes')
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
		Schema::drop('lost_items');
	}

}
