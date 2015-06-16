@extends('app')

@section('pricelist') active @endsection

@section('title') Price List @endsection

@section('content')

<div class="container">
    <div class="page-header">
        <h1>Price List</h1>
    </div>
    
    <table class="table table-default col-md-10 col-mf-offset-1">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Box Size</th>
                <th>Purchase Price</th>
                <th>Selling Price 1</th>
                <th>Selling Price 2</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>
                        @foreach($product->boxes as $box)
                            <div class="form-group">
                                <label>{{ $box->size }}</label>
                            </div>
                        @endforeach
                    </td>
                    <td>
                        @foreach($product->boxes as $box)
                            <div class="form-group">
                                <input type="number" min="0.00" step="0.01" value="{{ $box->purchase_price }}" class="form-control">
                            </div>
                        @endforeach
                    </td>
                    <td></td>
                    <td></td>   
                </tr>
            @endforeach
        </tbody>        
    </table>
</div>


@endsection

