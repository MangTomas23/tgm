<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Input;
use App\Order;
use App\Employee;

class BadOrderController extends Controller {
	
	public function create() {

		$salesmen = Employee::orderBy('firstname')->get();

		return view('badorder.create', compact('salesmen'));	
	}

}
