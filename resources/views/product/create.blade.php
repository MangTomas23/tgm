@extends('app')

@section('content')

<div class="container">
    <div class="page-header">
        <h1>Add Product</h1>
    </div>
    
    {!! Form::open(['url'=>'/product/create', 'class'=>'form col-sm-8 col-sm-offset-2']) !!}
        <div class="form-group col-sm-12">
            {!! Form::label('name', 'Product Name') !!}
            {!! Form::text('name','', ['class'=>'form-control']) !!}
        </div>
        <div class="form-group col-sm-6">
            {!! Form::label('price_1', 'Price 1') !!}
            {!! Form::text('price_1', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group col-sm-6">
            {!! Form::label('price_2', 'Price 2') !!}
            {!! Form::text('price_2', null, ['class'=>'form-control']) !!}
        </div>
    
        <div class="form-group col-sm-12 text-right">
            <a href="{{ action('ProductController@index') }}" class="btn btn-default">Cancel</a>
            {!! Form::submit('Save', ['class'=>'btn btn-success']) !!}
        </div>
    
    {!! Form::close() !!}
</div>

@endsection