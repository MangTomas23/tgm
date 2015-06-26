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
	
	public function supplier(){
		return $this->belongsTo('App\Supplier');
	}
    
	public function product() {
		return $this->belongsTo('App\Product');
	}
	
	public function scopeDate( $query, $date ) {
		return $query->where( 'date', $date );
	}
	
	public function scopeSupplier( $query, $id ) {
		return $query->where( 'supplier_id',$id );
	}
}
