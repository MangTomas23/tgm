<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProductIdOnBoxes extends Migration {

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
			$table->integer('product_id')->unsigned()->nullable();
            $table->foreign('product_id')
                  ->references('id')
                  ->on('products')
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
        DB::table('boxes')->delete();
        
		Schema::table('boxes', function(Blueprint $table)
		{
			$table->dropForeign('boxes_product_id_foreign');
            $table->dropColumn('product_id');
		});
	}

}
