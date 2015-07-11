<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Input;
use App\Order;
use App\Employee;
use DB;

class BadOrderController extends Controller {
	
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
		$badOrder = new BadOrder;

		$badOrder->save();
	}	

}
