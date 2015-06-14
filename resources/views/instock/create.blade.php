@extends('app')

@section('inventory') active @endsection  

@section('title') TGM - In Stock @endsection

@section('content')

<div class="container">
    <div class="page-header">
        <h1>In Stock</h1>
    </div>
    
    <div class="form-group col-sm-3">
        <label>Date</label>
        <input type="date" value="" class="form-control" readonly>
    </div>
    <span class="clearfix"></span>
    <div class="form-group col-sm-3">
        <label>Supplier</label>
        <select class="form-control" disabled>
            @foreach($suppliers as $supplier)
                <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
            @endforeach
        </select>
    </div>
    <span class="clearfix"></span>
    <div class="page-header"></div>
    
    <table class="table table-default">
        <thead>
            <th>Product</th>
            <th>Quantity</th>
            <th class="text-right">Total Amount</th>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>
                        @foreach($product->boxes as $box)
                            <div class="form-group">
                                <label>{{ $box->size }}</label>
                                <input type="number" min="0" class="form-control size">
                            </div>
                        @endforeach
                    </td>
                    <td class="text-right">
                        @foreach($product->boxes as $box)
                            <div class="form-group">
                                <label>&nbsp;</label>
                                <p data-purchase_price="{{ $box->purchase_price }}" class="form-control-static">0.00</p>
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
</div>

<script>
    $(document).ready(function(){

        $(this).on('keyup', '.size', function(){
            console.log('Working!')   
            $quantity = $(this).val();
            $amount = $(this).closest('tr').find('p')
            $amount.text($amount.data('purchase_price') * $quantity)
        })
    })
</script>

@endsection
