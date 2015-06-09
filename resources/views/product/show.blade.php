@extends('app')

@section('content');

<div class="container">

    <div class="page-header">
        <h1>
            {{ $product->name }}
            <a href="{{ action('ProductController@delete', $product->id) }}" class="btn btn-danger pull-right" title="Delete"><span class="glyphicon glyphicon-trash"></span></a>
        </h1>
    </div>
    {!! Form::open(['url'=>'/product/update']) !!}
        <div class="form-group col-sm-12">
            {!! Form::label('name', 'Name') !!}
            {!! Form::text('name', $product->name, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group col-sm-6">
            {!! Form::label('price_1', 'Price 1') !!}
            {!! Form::text('price_1', $product->price_1, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group col-sm-6">
            {!! Form::label('price_2', 'Price 2') !!}
            {!! Form::text('price_2', $product->price_2, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group col-sm-12 text-right">
            <a href="{{ action('ProductController@index') }}" class="btn btn-default">Cancel</a>
            {!! Form::submit('Update', ['class'=>'btn btn-success']) !!}
        </div>
        
    {!! Form::close() !!}
</div>

@endsection