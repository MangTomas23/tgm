<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropColumnsPrices extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        DB::table('products')->delete();
		Schema::table('products', function(Blueprint $table)
		{
			$table->dropColumn('price_1');
			$table->dropColumn('price_2');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        DB::table('products')->delete();
		Schema::table('products', function(Blueprint $table)
		{
            $table->decimal('price_1', 11,2);
            $table->decimal('price_2', 11,2);
		});
	}

}
