@extends('app')

@section('products') active @endsection

@section('content')

<div class="container">
    <div class="page-header">
        <h1>Remove Category</h1>
    </div>
    <div class="alert alert-danger col-sm-8 col-sm-offset-2">
        <p>Are you sure you want to remove {{ $product_category->name }}?</p>
        <div class="text-right">
            <a href="{{ action('ProductCategoryController@index') }}" class="btn btn-default">No</a>
            <a href="{{ action('ProductCategoryController@destroy', $product_category->id) }}" class="btn btn-danger">Yes</a>
        </div>
    </div>
    
</div>

@endsection