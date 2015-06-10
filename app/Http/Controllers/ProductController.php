<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Product;
use App\Supplier;
use App\ProductCategory;
use Redirect;
use Input;
use Validator;

class ProductController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $products = Product::all();
		return view('product.home', compact('products'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $suppliers = Supplier::all();
        $product_categories = ProductCategory::all();
        
		return view('product.create', compact('suppliers'))->with('product_categories', $product_categories);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $input = Input::all();
        $product = new Product;
        
        $product->name = $input['name'];
        $product->supplier_id = $input['supplier'];
        $product->price_1 = $input['price_1'];
        $product->price_2 = $input['price_2'];
        $product->product_category_id = $input['product_category'];
        
        $product->save();
        
		return Redirect::action('ProductController@index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(Product $product)
	{
        $product_categories = ProductCategory::all();
        $suppliers = Supplier::all();
		return view('product.show', compact('product'))
            ->with('product_categories', $product_categories)
            ->with('suppliers', $suppliers);
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
	public function update()
	{
        $input = Input::all();
        $product = Product::find($input['id']);
        
        $rules = array(
            'name' => 'required',
            'product_category' => 'required',
            'supplier' => 'required'
        );
        
        $validator = Validator::make($input, $rules);
        
        if($validator->passes()){
            $product->name = $input['name'];
            $product->product_category_id = $input['product_category'];
            $product->supplier_id = $input['supplier'];
            $product->price_1 = $input['price_1'];
            $product->price_2 = $input['price_2'];
            $product->save();
            
            return Redirect::action('ProductController@index');
        }
        
        return Redirect::action('ProductController@show', $input['id']);
	}

    public function delete(Product $product){
        return view('product.delete', compact('product'));
    }
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $product = Product::findOrFail($id);
        $product->delete();
		return Redirect::action('ProductController@index');
	}

}
