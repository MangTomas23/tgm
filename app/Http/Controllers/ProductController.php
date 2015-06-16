<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Product;
use App\Supplier;
use App\ProductCategory;
use App\Box;
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
        $products = Product::orderBy('name')->get();
		return view('product.home', compact('products'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $suppliers = Supplier::orderBy('name')->get();
        $product_categories = ProductCategory::orderBy('name')->get();
        
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
        $status = array();
        
        $rules = array(
            'name'=>'required',
            'supplier'=>'required',
            'product_category'=>'required',
            'size'=>'required',
            'packs'=>'required'
        );
        
        $validator = Validator::make($input, $rules);
        
        if($validator->passes()){
            $product->name = $input['name'];
            $product->supplier_id = $input['supplier'];
            $product->product_category_id = $input['product_category'];

            if($product->save()){
                $product_id = $product->id;
            }
            
            foreach($input['size'] as $i=>$v){
                $box = new Box;
                $box->product_id = $product_id;
                $box->size = $v;
                $box->no_of_packs = $input['packs'][$i];
                $box->purchase_price = $input['purchase_price'][$i];
                $box->selling_price_1 = $input['selling_price_1'][$i];
                $box->selling_price_2 = $input['selling_price_2'][$i];
                $box->save();
            }
            
            $saveSuccessful = true;
            $suppliers = Supplier::orderBy('name')->get();
            $product_categories = ProductCategory::orderBy('name')->get();
            return view('product.create', compact(['input','saveSuccessful','suppliers','product_categories']));
        }
        
        return Redirect::action('ProductController@create', compact('saveSuccessful'));
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
            $product->save();
            
            foreach($input['box'] as $i=>$v){
                $box = Box::find($v);
                $box->size = $input['size'][$i];
                $box->no_of_packs = $input['packs'][$i];
                $box->purchase_price = $input['purchase_price'][$i];
                $box->selling_price_1 = $input['selling_price_1'][$i];
                $box->selling_price_2 = $input['selling_price_2'][$i];
                $box->save();
            }
            
            if(isset($input['asize'])){
                foreach($input['asize'] as $i=>$v){
                    $box = new Box;
                    $box->product_id = $input['id'];
                    $box->size = $v;
                    $box->no_of_packs = $input['apacks'][$i];
                    $box->purchase_price = $input['apurchase_price'][$i];
                    $box->selling_price_1 = $input['aselling_price_1'][$i];
                    $box->selling_price_2 = $input['aselling_price_2'][$i];
                    $box->save();
                }
            }
            
            if(isset($input['trash'])){
                Box::destroy($input['trash']);
            }
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
    
    public function search(){
        return Redirect::action('ProductController@searchResults', Input::get('query'));
    }
    
    public function searchResults($query){
        $products = Product::select('products.*','products.name as product_name')->join('suppliers','products.supplier_id','=','suppliers.id')
                    ->join('product_categories','products.product_category_id','=','product_categories.id')
                    ->whereRaw('
                        products.name like "%'.$query.'%" or
                        suppliers.name like "%'.$query.'%" or 
                        product_categories.name like "%'.$query.'%"
                    ')
                    ->get();
        
        return view('product.search', compact(['products','query']));
    }

}
