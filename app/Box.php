<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Box extends Model {

	public function product(){
        return $this->belongsTo('App\Product');   
    }
	
	public function orderItems(){
		return $this->hasMany('App\OrderItem');
	}
    
    public function instocks(){
        return $this->hasMany('App\InStock');   
    }
	
//	public function scopeCountInStocks($query, $box_id){
//        $count = Box::find($box_id)->instocks->sum('quantity');
//        return $count==0 ? ' 0 ':$count;
//    }
	
	public function returnItems() {
		return $this->hasMany('App\ReturnItem');
	}
	
	public function scopeCountStock($query, $box_id){
		$box = Box::find($box_id);
		$inStock = $box->instocks->sum('quantity');
        $packsPerBox = $box->no_of_packs;
        $totalPacks = $inStock * $packsPerBox;
		
        $noOfBoxOrdered = $box->orderItems->sum('no_of_box');
        $noOfPacksOrdered =$box->orderItems->sum('no_of_packs');
        
        $totalOrders = ($noOfBoxOrdered * $packsPerBox) + $noOfPacksOrdered;
        $totalNoOfPacksLeft = $totalPacks - $totalOrders;
        $totalNoOfBoxLeft = floor($totalNoOfPacksLeft / $packsPerBox);
		
		$totalLeft = ['no_of_box_available'=>$totalNoOfBoxLeft,
					  'no_of_packs_available'=>($totalNoOfPacksLeft - $totalNoOfBoxLeft * $packsPerBox)];
        
		return $totalLeft;
	}

	public function scopeCountReturns($query, $box_id) {
		$box = Box::find($box_id);

		$packsPerBox = $box->no_of_packs;

		$noOfBoxLeft = $box->returnItems->sum('no_of_box');
		$noOfPacksLeft = $box->returnItems->sum('no_of_packs');



		return $noOfBoxLeft * $packsPerBox + $noOfPacksLeft;
	}
}
