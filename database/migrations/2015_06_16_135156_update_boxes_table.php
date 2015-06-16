<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateBoxesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        DB::table('boxes')->delete();
		Schema::table('boxes', function(Blueprint $table)
		{
            $table->dropColumn('selling_price');
            $table->decimal('selling_price_1',11,2)->unsigned();
            $table->decimal('selling_price_2',11,2)->unsigned();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        DB::table('boxes')->delete();
		Schema::table('boxes', function(Blueprint $table)
		{
			$table->dropColumn('selling_price_1');
			$table->dropColumn('selling_price_2');
            $table->decimal('selling_price')->unsigned();
		});
	}

}
