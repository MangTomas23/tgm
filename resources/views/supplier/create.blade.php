@extends('app')

@section('content')

<div class="container">
    <div class="page-header">
        <h1>Add Supplier</h1>
    </div>
    
    {!! Form::open(['url'=>'/supplier/create', 'class'=>'col-sm-8 col-sm-offset-2']) !!}
        <div class="form-group col-sm-8">
            {!! Form::label('name', 'Name') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>
    
        <div class="form-group col-sm-4">
            {!! Form::label('contact', 'Contact') !!}
            {!! Form::text('contact', null, ['class'=>'form-control']) !!}
        </div>
    
        <div class="form-group col-sm-12">
            {!! Form::label('address', 'Address') !!}
            {!! Form::text('address', null, ['class'=>'form-control']) !!}
        </div>
    
        <div class="form-group col-sm-12 text-right">
            <a href="{{ action('SupplierController@index') }}" class="btn btn-default">Cancel</a>
            {!! Form::submit('Save', ['class'=>'btn btn-success']) !!}
        </div>
    
        
    {!! Form::close() !!}
</div>

@endsection