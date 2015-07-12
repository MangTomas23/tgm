<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Input;
use App\Order;
use App\Employee;
use App\BadOrder;
use App\BadOrderItem;
use App\Box;
use DB;

class BadOrderController extends Controller {

	public function index() {
		$bad_orders = BadOrder::all();

		return view('badorder.home', compact('bad_orders'));
	}

	public function show($id) {
		$bad_order = BadOrder::find($id);
		$bo_items = $bad_order->badOrderItems;
		return view('badorder.show', compact('bad_order', 'bo_items'));
	}	
	
	public function create() {

		$salesmen = Employee::orderBy('firstname')->get();
		$input = Input::all();

		return view('badorder.create', compact('salesmen', 'input'));	
	}

	public function getNextID() {
		$result = DB::select(DB::raw('SHOW TABLE STATUS LIKE "bad_orders"'));

		if($result == null){
			return str_pad(1, 4, 0, STR_PAD_LEFT);
		}

		return str_pad($result[0]->Auto_increment, 4, 0, STR_PAD_LEFT);
	}

	public function store() {

		$input = Input::all();

		$badOrder = new BadOrder;

		$badOrder->truck_no = $input['truck_no'];
		$badOrder->date = $input['date'];
		$badOrder->received_by = $input['received_by'];
		$badOrder->salesman = $input['salesman'];

		$badOrder->save();

		foreach ($input['boxes'] as $i => $box) {
			$bo_items = new BadOrderItem;

			$bo_items->bad_order_id = $badOrder->id;
			$bo_items->box_id = $box;
			$bo_items->no_of_box = $input['no_of_box'][$i];		
			$bo_items->no_of_packs = $input['no_of_packs'][$i];		
			$bo_items->amount = $input['amount'][$i];		
			$bo_items->product_id = Box::find($box)->product->id;

			$bo_items->save();
		}

		return "success!";
	}	

}
