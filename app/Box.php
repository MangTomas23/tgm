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
        $noOfPacksLeft = $totalPacks - $totalOrders;
        $noOfBoxLeft = floor($noOfPacksLeft / $packsPerBox);
		
		$totalLeft = ['no_of_box_available'=>$noOfBoxLeft,
					  'no_of_packs_available'=>($noOfPacksLeft - $noOfBoxLeft * $packsPerBox)];
        
		return $totalLeft;
	}
}
