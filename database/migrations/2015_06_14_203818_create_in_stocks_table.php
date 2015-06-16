<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInStocksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::dropIfExists('stock_ins');
		Schema::create('in_stocks', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
            $table->integer('supplier_id')->unsigned()->nullable();
            $table->integer('product_id')->unsigned()->nullable();
            $table->integer('box_id')->unsigned()->nullable();
            $table->integer('quantity')->unsigned();
            $table->decimal('amount',11,2);
            $table->date('date');
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('set null');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('set null');
            $table->foreign('box_id')->references('id')->on('boxes')->onDelete('set null');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('in_stocks');
	}

}
