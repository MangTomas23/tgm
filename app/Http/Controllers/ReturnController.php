<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Input;
use Redirect;

use App\Ret;
use App\Order;
use App\ReturnItem;
use App\Employee;
use App\Customer;


class ReturnController extends Controller {

	public function create() {
		$input = Input::all();
		$customers = Customer::all();
		$salesmen = Employee::all();

		return view( 'return.create', 
			compact('input', 'customers', 'salesmen'));
	}
	
	public function index() {
		
		$returns = Ret::all();
		
		
		return view( 'return.home', compact( 'returns' ) );
	}
	
	public function store() {
		
		$input = Input::all();
		
		$customer = Customer::firstOrNew(['name' => $input['customer']]);

		$customer->address = $input['address'];

		$customer->save();
		
	}
	
	public function show( $id ) {
		$returnItems = Ret::find( $id )->returnItems;
		$orderNo = str_pad( $returnItems[0]->ret->order->id, 4, 0,
						   STR_PAD_LEFT );
		
		return view( 'return.show', compact( 'returnItems', 'orderNo' ) );
	}
}