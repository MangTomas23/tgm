<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Box;

class InStock extends Model {

	//
    public function box(){
        return $this->belongsTo('App\Box');   
    }
    
    public function scopeCount($query, $box_id){
        $count = Box::find($box_id)->instocks->sum('quantity');
        return $count==0 ? 'Out of Stock':$count;
    }
}
