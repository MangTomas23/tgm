<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Designation;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		 $this->call('DesignationTableSeeder');
	}

}

class DesignationTableSeeder extends Seeder {
    public function run(){
     
        Designation::create([
            'name'=>'Magsasaka'
        ]);
    }
}
