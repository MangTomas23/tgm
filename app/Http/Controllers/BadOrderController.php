<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Input;
use App\Order;

class BadOrderController extends Controller {
	
	public function create() {
		
		return view('badorder.create');	
	}

}
