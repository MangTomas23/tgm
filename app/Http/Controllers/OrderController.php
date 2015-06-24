<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Product;
use App\Supplier;
use App\ProductCategory;
use App\Box;
use App\InStock;
use App\Employee;
use App\Customer;
use App\Order;
use Input;
use Redirect;


class OrderController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $input = Input::all();
        
        $customer = null;
        if($input!=null){
            $customer = Customer::firstOrNew(['name'=>$input['order_by']]);
            $customer->address = $input['address'];
            $customer->save();
        }
        
        $employees = Employee::orderBy('firstname')->get();
        $customers = Customer::orderBy('name')->get();
		return view('order.create', compact(['employees','input','customer','customers']));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $input = Input::all();
		$salesman = isset($input['salesman']) ? $input['salesman'] : null;
        
        $customer = Customer::firstOrNew(['name'=>$input['name'], 'address'=>$input['address']]);
        $customer->save();
        
        $order = new Order;
        $order->customer_id = $customer->id;
        $order->salesman_id = $salesman;
        $order->date = $input['date'];
        $order->type = $input['type'];
        
        $order->save();
        
        
        
        echo '<br>';
        echo 'Customer ID: '. $customer->id . '<br>';
        echo 'Salesman ID: '. $salesman . '<br>';
        echo 'Date: ' . $input['date'] . '<br>';
        echo 'Type: ' . $input['type'] . '<br>';
        echo 'Order ID: '. $order->id;
        
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		
	}
    
    public function query(){
        $input = Input::all();
        $response = array();
        $response['product'] = Product::where('name','like',$input['query'].'%')->orderBy('name')->first();
        $response['supplier'] = Supplier::find($response['product']->supplier_id);
        $response['category'] = ProductCategory::find($response['product']->product_category_id);
        $response['boxes'] = Box::where('product_id',$response['product']->id)->get();
        $response['stocks'] = array();
        
        foreach($response['boxes'] as $box){
            array_push($response['stocks'], InStock::count($box->id));
        }
        
        return $response;
    }

}
