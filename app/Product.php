<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

	public function supplier(){
        return $this->belongsTo('App\Supplier');   
    }

    public function product_category(){
        return $this->belongsTo('App\ProductCategory');   
    }
    
    public function boxes(){
        return $this->hasMany('App\Box');   
    }
}
