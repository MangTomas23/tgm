<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Input;
use App\Order;

class BadOrderController extends Controller {
	
	public function create() {
		$input = Input::all();
		
		$orderItems = Order::find($input['order_no'])->orderItems;
		
		return view('badorder.create', compact( 'input','orderItems' ));
	}
	
	public function index() {
		return view('badorder.home');
	}
}
