<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Lost extends Model {

	public function lostItems() {
		return $this->hasMany('App\LostItem');
	}

}
