@extends('app')

@section('stocks') active @endsection

@section('title') TGM - Stock In @endsection

@section('content')

<div class="container">
    <div class="page-header">
        <h1>Stock In</h1>
    </div>
    <p><strong>Date:</strong> {{ $date }}</p>
    <p><strong>Supplier:</strong> {{ $supplier->name }}</p>
    <div class="page-header">
        <h4>Products</h4>
    </div>
    {!! Form::open(['url'=>'/stock/in/save', 'class'=>'form']) !!}
        <table class="table">
            <thead>
                <th>Product Name</th>
                <th>Box</th>
                <th class="col-sm-2">Quantity</th>
                <th class="text-center">Total Amount</th>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>
                            @foreach($product->boxes as $box)
                                <div class="form-group">
                                    <label style="margin-top: 8px">{{ $box->size }}</label>
                                </div>
                            @endforeach
                        </td>
                        <td>
                            @foreach($product->boxes as $box)
                                <div class="form-group">
                                    <input name="quantity[]" type="number" class="form-control quantity" min="0" value="0">
                                </div>
                            @endforeach
                        </td>
                        <td class="text-center">
                            @foreach($product->boxes as $box)
                                <div class="form-group">
                                    <p data-price="{{ $product->price_1 }}">0</p>
                                </div>
                            @endforeach
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="page-header"></div>
            
        <div class="page-header"></div>
        <div class="form-group text-right">
            {!! Form::submit('Save', ['class'=>'btn btn-success']) !!}
        </div>
    
        <script>
            $(document).ready(function(){
                $(this).on('change', '.quantity', function(){
                    $quantity = $(this).val()
                    $p = $(this).closest('tr').find('p');
                    
                    $p.text($p.data('price') * $quantity);
                })
            })
        </script>
    {!! Form::close() !!}
</div>

@endsection