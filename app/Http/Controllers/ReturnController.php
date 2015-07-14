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
use App\Box;
use DB;


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
	

	/**
	 * Store the return items data 
	 * 
	 * @return ReturnController@index
	 */
	public function store() {
		
		$input = Input::all();
		
		$customer = Customer::firstOrNew(['name' => $input['customer']]);

		$customer->address = $input['address'];

		$customer->save();

		$ret = new Ret;
		$ret->customer_id = $customer->id;
		$ret->date = $input['date'];
		$ret->reference_no = $input['ref_no'];
		$ret->salesman = $input['salesman'];
		$ret->area = $input['area'];
		$ret->received_by = $input['received_by'];
		$ret->checked_by = $input['checked_by'];

		$ret->save();

		foreach ($input['boxes'] as $i => $box) {
			$retItem = new ReturnItem;

			$retItem->ret_id = $ret->id;
			$retItem->box_id = $box;
			$retItem->no_of_box = $input['no_of_box'][$i];
			$retItem->no_of_packs = $input['no_of_packs'][$i];
			$retItem->amount = $input['amount'][$i];
			$retItem->product_id = Box::find($box)->product->id;

			$retItem->save();
		}

		return Redirect::action('InventoryController@index');
	}
	
	public function show( $id ) {

		$return = Ret::find($id);
		$retItems = $return->returnItems;

		return view('return.show', compact('return', 'retItems'));
	}

	public function getNextID() {
		$result = DB::select(DB::raw('SHOW TABLE STATUS LIKE "returns"'));

		if($result == null){
			return str_pad(1, 4, 0, STR_PAD_LEFT);
		}

		return str_pad($result[0]->Auto_increment, 4, 0, STR_PAD_LEFT);
	}

}