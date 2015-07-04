<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReturnItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('return_items', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->integer('ret_id')->unsigned()->nullable();
			$table->foreign('ret_id')->references('id')->on('returns')->onDelete('cascade');
			$table->integer('box_id')->unsigned()->nullable();
			$table->foreign('box_id')->references('id')->on('boxes')->onDelete('set null');
			$table->integer('no_of_box')->unsigned();
			$table->integer('no_of_packs')->unsigned();
			$table->decimal('amount', 11, 2);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('return_items');
	}

}
