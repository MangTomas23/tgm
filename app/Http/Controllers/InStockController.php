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

	public function index()
	{
        $instocks = Instock::groupBy('date')->orderBy('date')->get();
        return view('instock.home', compact('instocks'));
	}

	public function create($date, $s)
	{
        
        $suppliers = Supplier::all();
        $products = Product::where('supplier_id','=',$s->id)->orderBy('name')->get();
		return view('instock.create', compact(['s','suppliers','products','date']));
	}

	public function store()
	{
        $input = Input::all();
        
        foreach($input['boxes'] as $i=>$box){
            if($input['quantity'][$i]==0){
                continue;
            }
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
	}
    
    
    public function showByDate($date){
        $instocks = InStock::where('date',$date)->get();
        return view('instock.showasdate', compact('instocks'));
    }
}
