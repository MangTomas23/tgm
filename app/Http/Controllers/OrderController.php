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
use DB;

use Input;
use Redirect;


class OrderController extends Controller {

	public function index()
	{
		$orders = Order::orderBy('date')->get();
		return view('order.home', compact('orders'));
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
			
		}
		
		return view('order.addmore');
	}

    public function query(){
        $input = Input::all();
        $response = array();
        $response['product'] = Product::where('name','like',$input['query'].'%')->orderBy('name')->first();
        $response['supplier'] = Supplier::find($response['product']->supplier_id);
        $response['category'] = ProductCategory::find($response['product']->product_category_id);
        $response['boxes'] = Box::where('product_id',$response['product']->id)->get();
        $response['stocks'] = array();
        
        foreach( $response['boxes'] as $box ){
			$stock = Box::countStock( $box->id );
            array_push($response['stocks'], $stock);
        }
        
        return $response;
    }
	
	public function show($id){
		$orderItems = OrderItem::where('order_id',$id)->get(); 
		return view('order.show', compact('orderItems'));
	}
	
	public function search(){
		$query = intval(Input::get('query'));
		$orders = Order::where('id', $query)->get();
		
		return $orders;
	}
	
	public function getNextID(){
		$result = DB::select(DB::raw('SHOW TABLE STATUS LIKE "orders"'));
		return $result[0]->Auto_increment;
	}
}
