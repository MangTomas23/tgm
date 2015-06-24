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
use App\OrderItem;

use Input;
use Redirect;


class OrderController extends Controller {

	public function index()
	{
		//
	}

	
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
		
		print_r($input);
        
		foreach($input['box_id'] as $i=>$box_id){
			$orderItem = new OrderItem;
			$orderItem->order_id = $order->id;
			$orderItem->product_id = Box::find($box_id)->product->id;
			$orderItem->box_id = $box_id;
			$orderItem->no_of_box = $input['no_of_box'][$i];
			$orderItem->no_of_packs = $input['no_of_packs'][$i];
			$orderItem->amount = $input['amount'][$i];
			$orderItem->selling_price = $input['selling_price'][$i];
			$orderItem->save();
			
			echo 'saved: ' . $orderItem->id . '<br>';
		}
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
