@extends('app')

@section('content')

<div class="container">
    <div class="page-header">
        <h1>Remove Employee</h1>
    </div>
    
    <div class="alert alert-danger col-sm-8 col-sm-offset-2">
        <p>Are you sure you want to remove {{ $employee->firstname . ' ' . $employee->lastname }}?</p>
        <div class="text-right">
            <a href="{{ action('EmployeeController@index') }}" class="btn btn-default">No</a>
            <a href="{{ action('EmployeeController@destroy', $employee->id)}}" class="btn btn-danger">Yes</a>
        </div>
    </div>
</div>

@endsection