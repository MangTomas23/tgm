<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class BadOrder extends Model {

	public function badOrderItems() {
		return $this->hasMany('App\BadOrderItem');
	}

	public function employee() {
		return $this->belongsTo('App\Employee','salesman');
	}

}
