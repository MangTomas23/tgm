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
        <div class="form-group col-sm-12">
            <label for="product_category">
                Category
                <a href="{{ action('ProductCategoryController@index') }}" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-cog"></span></a>
            </label>
            <select name="product_category" class="form-control">
                @foreach($product_categories as $product_category)
                    <option value="{{ $product_category->id }}">{{ $product_category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-sm-12">
            {!! Form::label('supplier', 'Supplier') !!}
            <select name="supplier" class="form-control">
                @foreach($suppliers as $supplier)
                    <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                @endforeach
            </select>
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