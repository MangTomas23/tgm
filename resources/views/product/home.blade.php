@extends('app')

@section('products') active @endsection

@section('title') TGM - Products @endsection

@section('products') active @endsection

@section('content')
<div class="container">
    <div class="page-header">
        <h1>
            Products
            <a href="{{ action('ProductController@create') }}" class="btn btn-info pull-right">Add</a>
        </h1>
    </div>
    
    {!! Form::open(['url'=>'/products/search', 'class'=>'form']) !!}
    <div class="input-group col-md-3 col-md-offset-9">
        <input name="query" type="text" class="form-control" placeholder="Search" required>
        <span class="input-group-btn">
            <button class="btn btn-primary"><span class="glyphicon glyphicon-search"></span></button>
        </span>
    </div>
    {!! Form::close() !!}
    
    <table class="table table-striped" style="margin-top: 20px">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Category</th>
                <th>Supplier</th>
                <th>Stock</th>
            </tr>
        </thead>
        <tbody>
            @if($products->isEmpty())
                <tr>
                    <td colspan="5">No records found.</td>
                </tr>
            @else
                @foreach($products as $product)
                    <tr>
                        <td><a href="{{ action('ProductController@show', $product->id ) }}">{{ $product->name }}</a></td>
                        <td>{{ $product->product_category->name or null }}</td>
                        <td>{{ $product->supplier->name or null }}</td>
                        <td>0</td>
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