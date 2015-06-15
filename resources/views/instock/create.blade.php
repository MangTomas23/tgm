@extends('app')

@section('inventory') active @endsection  

@section('title') TGM - In Stock @endsection

@section('content')

<div class="container">
    <div class="page-header">
        <h1>In Stock</h1>
    </div>
    
    <div class="form-group col-sm-6">
        <label>Date</label>
        <input type="date" value="{{ $date }}" class="form-control" readonly>
    </div>
    <div class="form-group col-sm-6">
        <label>Supplier</label>
        <select class="form-control" disabled>
            @foreach($suppliers as $supplier)
                <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
            @endforeach
        </select>
    </div>
    <span class="clearfix"></span>
    <div class="page-header"></div>
    
    @if($products->isEmpty())
        <div class="alert alert-info col-md-12">
            This supplier has no products. <a href="{{ action('ProductController@create') }}" class="alert-link">Add</a> now.
        </div>
    @else
        <table class="table table-default">
            <thead>
                <th>Product</th>
                <th>Quantity</th>
                <th class="text-right">Total Amount</th>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td><a href="{{ action('ProductController@show', $product->id) }}">{{ $product->name }}</td>
                        <td>
                            @foreach($product->boxes as $box)
                                <div class="form-group">
                                    <label>{{ $box->size }}</label>
                                    <input type="number" min="0" class="form-control size" data-id="{{ $box->id }}">
                                </div>
                            @endforeach
                        </td>
                        <td class="text-right">
                            @foreach($product->boxes as $box)
                                <div class="form-group">
                                    <label>&nbsp;</label>
                                    <p id="{{ $box->id }}" data-purchase_price="{{ $box->purchase_price }}" class="form-control-static">0.00</p>
                                </div>
                            @endforeach
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="form-group text-right">
            {!! Form::submit('Save', ['class'=>'btn btn-success']) !!}
        </div>
    @endif
</div>

<script>
    $(document).ready(function(){

        $(this).on('keyup', '.size', function(){
            $totalAmount($(this));
        })
        
        $(this).on('change', '.size', function(){
            $totalAmount($(this));   
        })
        
        $totalAmount = function(q){
            $box_id = $(q).data('id');
            $quantity = $(q).val();
            
            $amount = $(q).closest('tr').find('#' + $box_id)
            $total = $amount.data('purchase_price') * $quantity
            $amount.text($amount.data('purchase_price') != 0 ? $total:'Price not set!')
        }
    })
</script>

@endsection
