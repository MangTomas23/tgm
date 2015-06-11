@extends('app')


@section('content')

<div class="container">
    <div class="page-header">
        <h1>Remove Product</h1>
    </div>
    <div class="alert alert-danger col-sm-8 col-sm-offset-2">
        <p>Are you sure you want to remove {{ $product->name }}?</p>
        <div class="text-right">
            <a href="{{ action('ProductController@index') }}" class="btn btn-default">Cancel</a>
            <a href="{{ action('ProductController@destroy', $product->id) }}" class="btn btn-danger">Delete</a>
        </div>
    </div>
        
       
</div>

@endsection