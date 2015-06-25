<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model {

    public function designation(){
        return $this->belongsTo('App\Designation');   
    }

	public function orders(){
		return $this->hasMany('App\Order');
	}
}
