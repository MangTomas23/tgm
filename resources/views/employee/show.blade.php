@extends('app')

@section('content')

<div class="container">
    <div class="page-header">
        <h1>
            Update Employee
            <a class="btn btn-danger pull-right"><span class="glyphicon glyphicon-trash"></span></a>
        </h1>
    </div>
    
    {!! Form::open(['url'=>'/employee/create', 'class'=>'form col-sm-8 col-sm-offset-2']) !!}
        <div class="form-group col-sm-6">
            {!! Form::label('firstname', 'First Name') !!}
            {!! Form::text('firstname', $employee->firstname, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group col-sm-6">
            {!! Form::label('lastname', 'Last Name') !!}
            {!! Form::text('lastname', $employee->lastname, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group col-sm-8">
            {!! Form::label('address', 'Address') !!}
            {!! Form::text('address', $employee->address, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group col-sm-4">
            {!! Form::label('contact', 'Contact') !!}
            {!! Form::text('contact', $employee->contact, ['class'=>'form-control']) !!}
        </div>
        <div class="Form-group col-sm-12 text-right">
            <a href="{{ action('EmployeeController@index') }}" class="btn btn-default">Cancel</a>
        </div>
        
    
    {!! Form::close() !!}
    
</div>

@endsection