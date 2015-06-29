<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {

	public function customer(){
        return $this->belongsTo('App\Customer');
    }
	
	public function orderItems(){
		return $this->hasMany('App\OrderItem');
	}
	
	public function scopeTotalAmount($query, $id){
		return Order::find($id)->orderItems->sum('amount');
	}
	
	public function salesman() {
		return $this->belongsTo('App\Employee');
	}
	
	public function returns() {
		return $this->hasMany( 'App\Ret' );
	}
}
