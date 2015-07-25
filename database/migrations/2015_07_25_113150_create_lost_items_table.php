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
			$table->integer("lost_id")->unsigned();
			$table->integer("no_of_box")->unsigned();
			$table->integer("no_of_packs")->unsigned();
			$table->decimal("amount", 11, 2)->unsigned();

			$table->foreign("lost_id")->references("id")->on("losts")
				->onDelete("cascade");
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
