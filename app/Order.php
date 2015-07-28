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

	public function scopeCurrentYear($query) {
		return $this->whereRaw('YEAR(date) = YEAR(NOW())');
	}

	public function scopeCurrentMonth($query) {
		return $this->whereRaw('MONTH(date) = MONTH(NOW())');
	}

	public function scopeToday($query) {
		return $this->whereRaw('date = DATE(NOW())');
	}
}
