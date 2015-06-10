<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Employee;
use Redirect;
use Input;
use Validator;
use App\Designation;

class EmployeeController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $employees = Employee::all();
		return view('employee.home', compact('employees'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $designations = Designation::all();
		return view('employee.create', compact('designations'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
        $employee = new Employee;
        
        $rules = array(
            'firstname'=>'required',
            'lastname'=>'required',
            'designation'=>'required'
        );
        
        $validator = Validator::make($input, $rules);
        
        if($validator->passes()){
            $employee->firstname = $input['firstname'];
            $employee->lastname = $input['lastname'];
            $employee->contact = $input['contact'];
            $employee->address = $input['address'];
            $employee->designation_id = $input['designation'];
            $employee->save();
            
            return Redirect::action('EmployeeController@index');
        }
        
        return Redirect::action('EmployeeController@create');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(Employee $employee)
	{
        $designations = Designation::all();
        return view('employee.show', compact('employee'))->with('designations', $designations);
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
        $employee = Employee::find($input['id']);
        
        $rules = array(
            'firstname'=>'required',
            'lastname'=>'required',
            'designation'=>'required'
        );
        
        $validator = Validator::make($input, $rules);
        
        if($validator->passes()){
            $employee->firstname = $input['firstname'];
            $employee->lastname = $input['lastname'];
            $employee->contact = $input['contact'];
            $employee->address = $input['address'];
            $employee->designation_id = $input['designation'];
            $employee->save();
            
            return Redirect::action('EmployeeController@index');

        }
        
        
        return Redirect::action('EmployeeController@show', $employee->id);
	}

    public function delete(Employee $employee){
        return view('employee.delete', compact('employee'));
    }
    
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$employee = Employee::findOrFail($id);
        $employee->delete();
        return Redirect::action('EmployeeController@index');
	}

}
