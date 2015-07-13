<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Ret extends Model {

	protected $table = 'returns';
	
	public function returnItems() {
		return $this->hasMany('App\ReturnItem');
	}
	
	public function order() {
		return $this->belongsTo('App\Order');
	}

	public function customer() {
		return $this->belongsTo('App\Customer');
	}

	public function employee() {
		return $this->belongsTo('App\Employee', 'salesman');
	}
}
