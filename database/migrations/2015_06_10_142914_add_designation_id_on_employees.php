<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDesignationIdOnEmployees extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        DB::table('employees')->delete();
        
		Schema::table('employees', function(Blueprint $table)
		{
            $table->integer('designation_id')->unsigned()->nullable();
            $table->foreign('designation_id')->references('id')->on('designations')->onDelete('set null');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('employees', function(Blueprint $table)
		{
			$table->dropForeign('employees_designation_id_foreign');
            $table->dropColumn('designation_id');
		});
	}

}
