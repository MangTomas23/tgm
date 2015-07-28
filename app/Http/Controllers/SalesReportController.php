<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Order;
use App\OrderItem;
use DB;

class SalesReportController extends Controller {

	public function index()
	{
		return view('salesreport.home');
	}

	public function getMonthlySales() {

		$sales = array();
		$months = array(
				"January", "February", "March", "April", "May", "June",
				"July", "August", "September", "October", "November", "December"
			);

		for($x = 1; $x <= 12; $x++) {
			$orders = Order::currentYear()->whereRaw('MONTH(date) = ' . $x)->get();

			$amount = 0;

			foreach($orders as $order){
				$amount += $order->orderItems->sum('amount');
			}

			array_push( $sales, $amount );
		}

		return $sales;
	}
	
}
