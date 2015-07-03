<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Input;
use Redirect;
use Session;
use DB;

use App\Box;
use App\Employee;
use App\Customer;

class AppController extends Controller {
	
//	public function __construct(){
//		return $this->middleware('auth');
//	}

	public function index()
	{
		return view('home');
	}
	
	public function advance() {
		return view('advance.pass');
	}
	
	public function advancePass() {
		$passcode = Input::get('passcode');
		$authenticated = false;
		
		if( $passcode == 'sarsanimangtomas' ) {
			$authenticated = true;
			return Redirect::action('AppController@advanceHome')->with('authenticated', $authenticated);
		}
		
		return 'Invalid Passcode';
	}
	
	public function advanceHome() {
		$authenticated = Session::get('authenticated');
		
		if( !isset( $authenticated ) || $authenticated == false ) {
			return 'Unauthorized Access!';
		}
		
		return view('advance.home');
	}
	
	public function advanceExecute() {
		$tables = Input::get('tables');
		
		DB::statement( 'SET foreign_key_checks = 0' );
		
		foreach( $tables as $table ) {
			DB::statement( 'TRUNCATE TABLE ' . $table );
		}
		
		DB::statement( 'SET foreign_key_checks = 1' );
	}

	public function test() {

		$salesmen = Employee::all();

		return view('advance.test', compact('salesmen'));
	}

	public function untested() {
		$customers = Customer::all();
		$salesmen = Employee::all();

		return view('advance.untested', compact('customers',
					'salesmen'));
	}
}
