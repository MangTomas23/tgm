<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Input;
use Redirect;

use App\Ret;
use App\Order;
use App\ReturnItem;


class ReturnController extends Controller {

	public function create() {
		$input = Input::all();
		$orderItems = Order::find( $input[ 'order_no' ] )->orderItems;
		return view( 'return.create', compact( [ 'input', 'orderItems' ] ) );
	}
	
	public function index() {
		
		$returns = Ret::all();
		
		
		return view( 'return.home', compact( 'returns' ) );
	}
	
	public function store() {
		
		$input = Input::all();
		
		$return  = new Ret;
		$return->order_id = intval( $input[ 'order_no' ] );
		$return->date = $input['date'];
		
		$return->save();
		
		foreach($input['box_id'] as $i=>$box_id) {
			$returnItem = new ReturnItem;
			$returnItem->ret_id = $return->id;
			$returnItem->box_id = $box_id;
			$returnItem->no_of_box = $input['no_of_box'][$i];
			$returnItem->no_of_packs = $input['no_of_packs'][$i];
			$returnItem->save();
		}
		
		return 'Coming Soon!';
	}
	
	public function show( $id ) {
		$returnItems = Ret::find( $id )->returnItems;
		$orderNo = str_pad( $returnItems[0]->ret->order->id, 4, 0,
						   STR_PAD_LEFT );
		
		return view( 'return.show', compact( 'returnItems', 'orderNo' ) );
	}
}