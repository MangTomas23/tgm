<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ReturnItem extends Model {

	//
	public function ret() {
		return $this->belongsTo( 'App\Ret' );
	}
	
	public function box() {
		return $this->belongsTo('App\Box');
	}
	
}
