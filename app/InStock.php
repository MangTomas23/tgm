<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class InStock extends Model {

	//
    public function box(){
        return $this->belongsTo('App\Box');   
    }
}
