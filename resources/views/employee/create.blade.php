@extends('app')

@section('content')

<div class="container">
    <div class="page-header">
        <h1>
            Add Employee
        </h1>
    </div>
    
    {!! Form::open(['url'=>'/employee/create', 'class'=>'form col-sm-8 col-sm-offset-2']) !!}
        <div class="form-group col-sm-6">
            {!! Form::label('firstname', 'First Name') !!}
            {!! Form::text('firstname', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group col-sm-6">
            {!! Form::label('lastname', 'Last Name') !!}
            {!! Form::text('lastname', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group col-sm-12">
            <label>
                Designation 
                <a href="{{ action('DesignationController@index') }}" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-cog"></span></a>
            </label>
            
            @if($designations->isEmpty())
            <p class="form-control-static">Please Add Designations First</p>
            @else
                <select name="designation" class="form-control">
                    @foreach($designations as $designation)
                        <option value="{{ $designation->id }}">{{ $designation->name }}</option>
                    @endforeach
                </select>
            @endif
        </div>
        
        <div class="form-group col-sm-8">
            {!! Form::label('address', 'Address') !!}
            {!! Form::text('address', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group col-sm-4">
            {!! Form::label('contact', 'Contact') !!}
            {!! Form::text('contact', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group col-sm-12 text-right">
            <a href="{{ action('EmployeeController@index') }}" class="btn btn-default">Cancel</a>
            {!! Form::submit('Save', ['class'=>'btn btn-success']) !!}
        </div>
    {!! Form::close() !!}
    
</div>

@endsection