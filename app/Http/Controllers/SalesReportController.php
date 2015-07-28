<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Order;
use DB;

class SalesReportController extends Controller {

	public function index()
	{
		return view('salesreport.home');
	}

	public function test() {

		$orders = Order::currentYear()->get();

		$orderItems = array();

		foreach ($orders as $order) {

			 array_push($orderItems, json_decode($order->orderItems));
		}

		return $orderItems;

		// return $orders;
	}
	
}
