<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class BadOrderItem extends Model {

	public function product() {
		return $this->belongsTo('App\Product');
	}

	public function box() {
		return $this->belongsTo('App\Box');
	}

}
