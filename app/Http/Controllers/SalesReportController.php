<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class SalesReportController extends Controller {

	public function index()
	{
		return view('salesreport.home');
	}
	
}
