<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockInsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('stock_ins', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
            $table->integer('product_id')->unsigned()->nullable();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('set null');
            $table->integer('box_id')->unsigned()->nullable();
            $table->foreign('box_id')->references('id')->on('boxes')->onDelete('set null');
            $table->integer('quantity');
            $table->decimal('amount',11,2);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('stock_ins');
	}

}
