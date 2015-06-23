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
        
        $customer = Customer::firstOrNew(['name'=>$input['order_by']]);
        $customer->address = $input['address'];
        $customer->save();
        
        $employees = Employee::orderBy('firstname')->get();
		return view('order.create', compact(['employees','input','customer']));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
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
