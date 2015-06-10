<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Designation;
use Input;
use Redirect;
use Validator;

class DesignationController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $designations = Designation::all();
		return view('designation.home', compact('designations'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
//		return 'create';
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
        $designation = new Designation;
        $rules = array( 'name'=>'required' );
        
        $validator = Validator::make($input, $rules);
        
        if($validator->passes()){
            $designation->name = $input['name'];
            $designation->save();
        }
        
        return Redirect::action('DesignationController@index');
        
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
	public function edit(Designation $designation)
	{
		return view('designation.update', compact('designation'));
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
        $designation = Designation::find($input['id']);
        
        $rules = array(
            'name' => 'required'
        );
        
        $validator = Validator::make($input, $rules);
        
        if($validator->passes()){
            $designation->name = $input['name'];
            $designation->save();
            return Redirect::action('DesignationController@index');
        }
        
        return Redirect::action('DesignationController@edit', $input['id']);
	}
    
    public function delete(Designation $designation){
        return view('designation.delete', compact('designation'));   
    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        Designation::find($id)->delete();
        return Redirect::action('DesignationController@index');
	}

}
