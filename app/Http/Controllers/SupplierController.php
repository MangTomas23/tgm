<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Supplier;
use Redirect;
use Input;
use Validator;

class SupplierController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $suppliers = Supplier::all();
		return view('supplier.home', compact('suppliers'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('supplier.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $input = Input::all();
        $supplier = new Supplier;
        
        $rules = array(
            'name'=>'required'
        );
        
        $validator = Validator::make($input,$rules);
        
        if($validator->passes()){
            $supplier->name = $input['name'];
            $supplier->contact = $input['contact'];
            $supplier->address = $input['address'];
            $supplier->save();
            
            return Redirect::action('SupplierController@index');
        }
        
        return Redirect::Action('SupplierController@create');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(Supplier $supplier)
	{
		return view('supplier.show', compact('supplier'));
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
		$supplier = Supplier::findOrFail($input['id']);
        $supplier->name = $input['name'];
        $supplier->contact = $input['contact'];
        $supplier->address = $input['address'];
        $supplier->save();
        return Redirect::action('SupplierController@index');
	}
    
    public function delete(Supplier $supplier){
        return view('supplier.delete', compact('supplier'));
    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();
        return Redirect::action('SupplierController@index');
	}

}
