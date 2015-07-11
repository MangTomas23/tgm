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

		return view('badorder.create', compact('salesmen'));	
	}

	public function getNextID() {
		$result = DB::select(DB::raw('SHOW TABLE STATUS LIKE "bad_orders"'));
		return $result[0]->Auto_increment or 0;
	}

	public function store() {
		$badOrder = new BadOrder;


		$badOrder->save();
	}	

}
