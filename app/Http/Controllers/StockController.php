<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Supplier;
use App\Employee;
use Input;
use Redirect;


class StockController extends Controller {

	public function index()
	{
        $suppliers = Supplier::orderBy('name')->get();
        $employees = Employee::orderBy('firstname')->get();
		return view('stock.home', compact(['suppliers','employees']));
	}

    public function stockIn(){
        $input = Input::all();
        
        return Redirect::action('StockInController@index', [$input['date'], $input['supplier']]);
    }
}
