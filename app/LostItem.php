<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class LostItem extends Model {

	public function box() {
		return $this->belongsTo('App\Box');
	}

	public function product() {
		return $this->belongsTo('App\Product');
	}

}
