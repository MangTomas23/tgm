@extends('app')

@section('title') TGM - Products @endsection

@section('content')
<div class="container">
    <div class="page-header">
        <h1>
            Products
            <a href="{{ action('ProductController@create') }}" class="btn btn-info pull-right">Add</a>
        </h1>
    </div>
    
    {!! Form::open(['url'=>'/products/search', 'class'=>'form form-horizontal col-md-4 col-md-offset-8 col-xs-10 col-xs-offset-2 col-sm-6 col-sm-offset-6']) !!}
    <div class="form-group col-md-10 col-xs-11">
        {!! Form::text('search', null, ['class'=>'form-control', 'placeholder'=>'Search..']) !!}
    </div>
    <div class="form-group">
        <button class="btn btn-primary"><span class="glyphicon glyphicon-search"></span></button>
    </div>
    {!! Form::close() !!}
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Category</th>
                <th>Supplier</th>
                <th>Price 1</th>
                <th>Price 2</th>
            </tr>
        </thead>
        <tbody>
            @if($products->isEmpty())
                <tr>
                    <td colspan="4">No records found.</td>
                </tr>
            @else
                @foreach($products as $product)
                    <tr>
                        <td><a href="{{ action('ProductController@show', $product->id ) }}">{{ $product->name }}</a></td>
                        <td>{{ $product->product_category->name or null }}</td>
                        <td>{{ $product->supplier->name or null }}</td>
                        <td>{{ $product->price_1 }}</td>
                        <td>{{ $product->price_2 }}</td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    
    <div class="page-header"></div>
    <p class="text-right">
        <strong>No. of Products: </strong> <span class="badge">{{ count($products) }}</span> 
    </p>
    
</div>
@endsection