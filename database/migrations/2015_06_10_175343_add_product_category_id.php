<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProductCategoryId extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('products', function(Blueprint $table)
		{
			$table->integer('product_category_id')->unsigned()->nullable();
            $table->foreign('product_category_id')->references('id')->on('product_categories')->onDelete('set null');
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
            $table->dropForeign('products_product_category_id_foreign');
            $table->dropColumn('product_category_id');
		});
	}

}
