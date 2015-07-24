@extends('app')

@section('pricelist') active @endsection

@section('title') Price List @endsection

@section('content')

<div class="container">
    <div class="page-header">
        <h1>Price List</h1>
    </div>
    
    {!! Form::open(['url'=>'/price-list/update']) !!}
    <table class="table table-default col-md-10 col-mf-offset-1">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Supplier</th>
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
                    <td>{{ $product->supplier->name }}</td>
                    <td>
                        @foreach($product->boxes as $box)
                            <div class="form-group text-nowrap">
                                <p class="form-control-static">{{ $box->size }}</p>
                                {!! Form::hidden('id[]', $box->id) !!}
                            </div>
                        @endforeach
                    </td>
                    <td>
                        @foreach($product->boxes as $box)
                            <div class="form-group">
                                <input name="purchase_price[]" type="number" min="0.00" step="0.01" value="{{ $box->purchase_price }}" class="form-control">
                            </div>
                        @endforeach
                    </td>
                    <td>
                        @foreach($product->boxes as $box)
                            <div class="form-group">
                                <input name="selling_price_1[]" type="number" min="0.00" step="0.01" value="{{ $box->selling_price_1 }}" class="form-control">
                            </div>
                        @endforeach
                    </td>
                    <td>
                        @foreach($product->boxes as $box)
                            <div class="form-group">
                                <input name="selling_price_2[]" type="number" min="0.00" step="0.01" value="{{ $box->selling_price_2 }}" class="form-control">
                            </div>
                        @endforeach
                    </td>   
                </tr>
            @endforeach
        </tbody>        
    </table>
    {!! $products->render() !!}
    <div class="page-header">&nbsp;</div>
    
    <div class="form-group text-right">
        {!! Form::submit('Update Price List', ['class'=>'btn btn-success']) !!}
    </div>
    {!! Form::close() !!}
</div>


@endsection

