<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Supplier;
use App\Product;
use App\InStock;
use App\Box;

use Input;
use Redirect;

class InStockController extends Controller {

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
	public function create($date, $s)
	{
        
        $suppliers = Supplier::all();
        $products = Product::where('supplier_id','=',$s->id)->orderBy('name')->get();
		return view('instock.create', compact(['s','suppliers','products','date']));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $input = Input::all();
        
        foreach($input['boxes'] as $i=>$box){
            $instock = new InStock;

            $instock->date = $input['date'];
            $instock->supplier_id = $input['supplier'];
            $instock->box_id = $box;
            $b = Box::find($box);
            $instock->product_id = $b->product_id;
            $instock->quantity = $input['quantity'][$i];
            $instock->amount = $input['quantity'][$i] * $b->purchase_price;
            
            $instock->save();
        }
        
        return Redirect::action('InventoryController@index');
        
        
        
//        return Redirect::action('InventoryController@index');
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
		//
	}

}
