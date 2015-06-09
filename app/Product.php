<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

	public function supplier(){
        $this->belongsTo('App\Supplier');   
    }

}
