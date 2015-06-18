<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Box extends Model {

	public function product(){
        return $this->belongsTo('App\Product');   
    }
    
    public function instocks(){
        return $this->HasMany('App\InStock');   
    }
}
