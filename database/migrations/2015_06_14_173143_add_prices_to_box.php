<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPricesToBox extends Migration {

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
			$table->decimal('purchase_price',11,2)->unsigned();
			$table->decimal('selling_price',11,2)->unsigned();
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
            $table->dropColumn('purchase_price');
            $table->dropColumn('selling_price');
		});
	}

}
