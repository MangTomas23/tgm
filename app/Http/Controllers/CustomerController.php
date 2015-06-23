<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Customer;
use Redirect;
use Session;

class CustomerController extends Controller {
    
    public function store(){
        $input = Session::get('input');
        $customer = Customer::firstOrNew(['name'=>$input['order_by']]);
        $customer->address = $input['address'];
        $customer->save();
        
        return Redirect::action('OrderController@create', compact('input'));
    }
}