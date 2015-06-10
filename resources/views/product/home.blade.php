@extends('app')


@section('content')
<div class="container">
    <div class="page-header">
        <h1>
            Products
            <a href="{{ action('ProductController@create') }}" class="btn btn-info pull-right">Add</a>
        </h1>
    </div>
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Product Name</th>
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
                        <td>{{ $product->supplier->name }}</td>
                        <td>{{ $product->price_1 }}</td>
                        <td>{{ $product->price_2 }}</td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>
@endsection