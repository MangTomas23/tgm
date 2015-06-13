@extends('app')

@section('products') active @endsection

@section('title') TGM - Search Product @endsection


@section('content')

<div class="container">
    <div class="page-header">
        <h1>
            @if($products->isEmpty())
                No results for "{{ $query }}"
            @else
                Search Results: "{{ $query }}"
            @endif
            <span class="visible-xs-block" style="padding:20px"></span>
            {!! Form::open(['url'=>'/products/search', 'class'=>'form col-md-4 pull-right']) !!}
            <div class="input-group">
                <input type="text" name="query" class="form-control">
                <span class="input-group-btn">
                    <button class="btn btn-primary"><span class="glyphicon glyphicon-search"></span></button>
                </span>
            </div>
            {!! Form::close()  !!}
        </h1>
    </div>
    
    @if(!$products->isEmpty())
    
    <table class="table table-default">
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
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->product_name }}</td>
                    <td>{{ $product->product_category->name or null }}</td>
                    <td>{{ $product->supplier->name or null }}</td>
                    <td>{{ $product->price_1 }}</td>
                    <td>{{ $product->price_2 }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    @endif
</div>


@endsection