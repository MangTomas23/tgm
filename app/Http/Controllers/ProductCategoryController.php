<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\ProductCategory;
use Redirect;
use Validator;
use Input;

class ProductCategoryController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $product_categories = ProductCategory::all();
		return view('productcategory.home', compact('product_categories'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $product_category = new ProductCategory;
        $input = Input::all();
        
        $rules = array(
            'name'=>'required'
        );
        
        $validator = Validator::make($input, $rules);
            
        if($validator->passes()){
            $product_category->name = Input::get('name');
            $product_category->save();
        }
        
        return Redirect::action('ProductCategoryController@index');
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
	public function edit(ProductCategory $product_category)
	{
		return view('productcategory.edit', compact('product_category'));
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
        $id = $input['id'];
        $product_category = ProductCategory::findOrFail($id);
        
        $rules = array(
            'name'=>'required'
        );
        
        $validator = Validator::make($input, $rules);
        
        if($validator->passes()){
            $product_category->name = $input['name'];
            $product_category->save();
            
            return Redirect::action('ProductCategoryController@index');
        }
        
        return Redirect::action('ProductCategoryController@edit', $id);
	}
    
    public function delete(ProductCategory $product_category){
        return view('productcategory.delete', compact('product_category'));
    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        ProductCategory::findOrFail($id)->delete();
        
        return Redirect::action('ProductCategoryController@index');
	}

}
