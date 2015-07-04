<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Customer;
use Redirect;
use Session;
use Input;

class CustomerController extends Controller {
    
    public function store(){
        $input = Session::get('input');
        $customer = Customer::firstOrNew(['name'=>$input['order_by']]);
        $customer->address = $input['address'];
        $customer->save();
        
        return Redirect::action('OrderController@create', compact('input'));
    }

    public function index() {
    	$customers = Customer::orderBy('name')->get();

    	return view('customer.home', compact('customers'));
    }

    public function delete($id) {

    	$customer = Customer::find($id);

    	return view('customer.delete', compact('customer'));
    }

    public function destroy($id) {

    	$customer = Customer::findOrFail($id);
    	$customer->delete();

    	return Redirect::action('CustomerController@index');
    }

    public function edit($id) {
    	$customer = Customer::find($id);

    	return view('customer.edit', compact('customer'));
    }

    public function update() {
		$input = Input::all();    	

		$customer = Customer::find($input['id']);

		$customer->name = $input['name'];
		$customer->address = $input['address'];
		$customer->save();

		return Redirect::action('CustomerController@index');
    }

    public function show ($id) {
        $customer = Customer::find($id);
        $orders = $customer->orders;


        return view('customer.show', compact('customer', 'orders'));
    }

}