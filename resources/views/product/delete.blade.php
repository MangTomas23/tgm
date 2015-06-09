@extends('app')


@section('content')

<div class="container">
    <div class="panel panel-danger">
        <div class="panel-heading">
            <h3>Delete</h3>
        </div>
        <div class="panel-body">
            <p>Are you sure you want to delete this product?</p>
        </div>
        <div class="panel-footer text-right">
            <a href="{{ action('ProductController@index') }}" class="btn btn-default">Cancel</a>
            <a href="{{ action('ProductController@destroy', $product->id) }}" class="btn btn-danger">Yes</a>
        </div>
    </div>
</div>

@endsection