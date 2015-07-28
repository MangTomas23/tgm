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
		$orders = Order::currentYear()->get();

		$totalSales = 0;

		foreach ($orders as $order) {
			$totalSales += $order->orderItems->sum('amount');
		}


		return view('salesreport.home', ['totalSales' => $totalSales]);
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

	public function getDailySales() {

		$noOfDays = cal_days_in_month(CAL_GREGORIAN, date('n'), date('Y'));

		$response = array();
		$response['sales'] = array();

		for($x = 0; $x < $noOfDays; $x++) {
			$orders = Order::currentYear()->currentMonth()->whereRaw('DAY(date) = ' . $x)->get();

			$amount = 0;

			foreach ($orders as $order) {
				$amount += $order->orderItems->sum('amount');
			}

			array_push($response['sales'], $amount);
		}

		$response['no_of_days'] = $noOfDays;

		return $response;
	}
	
}
