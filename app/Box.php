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

        $ret = Box::countReturns($box_id);
        $rbox = $ret['no_of_box'];
        $rpacks = $ret['no_of_packs'];

        $totalNoOfBoxLeft += $rbox;
		
		$totalLeft = ['no_of_box_available'=>$totalNoOfBoxLeft,
					  'no_of_packs_available'=>(($totalNoOfPacksLeft - ($totalNoOfBoxLeft * $packsPerBox)) + $rpacks)];
        
		return $totalLeft;
	}

	public function scopeCountReturns($query, $box_id) {
		$returnItems = Box::find($box_id)->returnItems;

		$no_of_box = $returnItems->sum('no_of_box');
		$no_of_packs = $returnItems->sum('no_of_packs');

		$data = [ 'no_of_box' => $no_of_box, 'no_of_packs' => $no_of_packs ];

		return $data;
	}

	public function scopeCountReturns2($query, $box_id) {
		$box = Box::find($box_id);
		$inStock = $box->instocks->sum('quantity');
        $packsPerBox = $box->no_of_packs;
        $totalPacks = $inStock * $packsPerBox;
		
        $noOfBoxOrdered = $box->orderItems->sum('no_of_box');
        $noOfPacksOrdered =$box->orderItems->sum('no_of_packs');
        
        $totalOrders = ($noOfBoxOrdered * $packsPerBox) + $noOfPacksOrdered;
        $totalNoOfPacksLeft = $totalPacks - $totalOrders;
        $totalNoOfBoxLeft = floor($totalNoOfPacksLeft / $packsPerBox);

        $totalNoOfBoxLeft == null ? 0:$totalNoOfBoxLeft;
        $totalNoOfPacksLeft == null ? 0:$totalNoOfPacksLeft;


        $ret = Box::countReturns($box_id);
        $rbox = $ret['no_of_box'];
        $rpacks = $ret['no_of_packs'];


        $totalNoOfBoxLeft += $rbox;
		
		$totalLeft = ['no_of_box_available'=>$totalNoOfBoxLeft,
					  'no_of_packs_available'=>(($totalNoOfPacksLeft - ($totalNoOfBoxLeft * $packsPerBox)) + $rpacks)];
        
		return $totalLeft;
	}
}
