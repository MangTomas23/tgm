<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Product;
use App\Supplier;
use App\ProductCategory;
use App\Box;
use App\InStock;
use App\Customer;
use App\OrderItem;
use Redirect;
use Input;
use DB;
use Validator;


class ProductController extends Controller {
    
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $products = Product::paginate(50);
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
        
		return view('product.create', compact('suppliers'))
            ->with('product_categories', $product_categories);
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
        try{
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
                return view('product.create', compact(['input','saveSuccessful',
                    'suppliers','product_categories']));
            }
        }catch(\Illuminate\Database\QueryException $e){
            if($e->getCode()==23000){
                return Redirect::action('ProductController@duplicate');
            }
        }
        return Redirect::action('ProductController@create', 
            compact('saveSuccessful'));
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
        $id = $product->id;
        $previous = Product::where('id', '<', $id)->max('id');
        $next = Product::where('id', '>', $id)->min('id');
        
		return view('product.show', compact(['product','next','previous']))
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
	
	public function destroy($id)
	{
        $product = Product::findOrFail($id);
        $product->delete();
		return Redirect::action('ProductController@index');
	}
    
    public function search(){
        return Redirect::action('ProductController@searchResults', 
            Input::get('query'));
    }
    
    public function searchResults($query){
        $products = Product::where('name','like','%'.$query.'%')
            ->orderBy('name')->get();
        
        return view('product.search', compact(['products','query']));
    }

    public function duplicate(){
        return view('product.duplicate');   
    }

    public function getBestSellingProduct() {
        $products = OrderItem::select(DB::raw('product_id, 
                count(product_id) as count'))->whereRaw('MONTH(created_at)=6')
                ->groupBy('product_id')->take(5)->orderBy('count')->get();
        return $products;
    }
    
    public function test(){
        /* This will be used later
        
        $boxes = Box::all();
        
        foreach($boxes as $box){
            $inStock = intval(InStock::countInStocks($box->id));
            $packsPerBox = $box->no_of_packs; 
            
            echo $box->size . ' - ';
            
            
            echo 'Total Packs: ' . ($inStock * $packsPerBox). '<br>';
        }*/
        
//        $inStock = 10;
//        $packsPerBox = 12;
//        $totalPacks = $inStock * $packsPerBox;
//        
//        $noOfBoxOrdered = 6;
//        $noOfPacksOrdered = 13;
//        
//        $totalOrders = ($noOfBoxOrdered * $packsPerBox) + $noOfPacksOrdered;
//        $noOfPacksLeft = $totalPacks - $totalOrders;
//        $noOfBoxLeft = floor($noOfPacksLeft / $packsPerBox);
//        
//        
//        $totalLeft = $noOfBoxLeft . ' Box, ' . ($noOfPacksLeft - $noOfBoxLeft * $packsPerBox) . ' Packs';
//            
//        echo 'Number of Box: ' . $inStock . '<br>';
//        echo 'Packs Per Box: ' . $packsPerBox . '<br>';
//        echo 'Total Number of Packs: ' . $totalPacks . '<br>';
//        echo '-----------------------------------------------<br>';
//        echo 'No. of Box Ordered: ' . $noOfBoxOrdered . '<br>';
//        echo 'No. of Packs Ordered: ' . $noOfPacksOrdered . '<br>';
//        echo 'No. of Packs Left: ' . $noOfPacksLeft . '<br>';
//        echo 'No. of Box Left: ' . $noOfBoxLeft . '<br>';
//        echo '-----------------------------------------------<br>';
//        echo 'In Stock: ' . $totalLeft;
//        
//		echo '<br><br>';
        
		$customers = Customer::all();
		
		foreach( $customers as $customer ) {
			echo $customer->name . ' - ' . $customer->address . '<br>';
		}
    }

}
