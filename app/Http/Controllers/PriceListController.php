<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Product;
use App\Box;

use Input;
use Redirect;

class PriceListController extends Controller {

	public function index()
	{
        $products = Product::orderBy('name')->get();
		return view('pricelist.home', compact('products'));
	}

	
	public function update()
	{
        $input = Input::all();
        
        foreach($input['id'] as $i=>$id){
            $box = Box::find($id);
            $box->purchase_price = $input['purchase_price'][$i];
            $box->selling_price_1 = $input['selling_price_1'][$i];
            $box->selling_price_2 = $input['selling_price_2'][$i];
            $box->save();
        }
        
        return Redirect::action('PriceListController@index');
	}

}
