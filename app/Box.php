<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use InStock;

class Box extends Model {

	public function product(){
        return $this->belongsTo('App\Product');   
    }
    
    public function instocks(){
        return $this->HasMany('App\InStock');   
    }
    
    public function scopeStockCount($query, $id){    
        $count = Box::find($id)->instocks->sum('quantity');
        return $count==0 ? 'Out of Stock':$count;
    }
}
