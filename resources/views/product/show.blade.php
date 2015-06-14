@extends('app')

@section('title') TGM - Update Supplier @endsection

@section('products') active @endsection

@section('content');

<div class="container">

    <div class="page-header">
        <h1>
            Update Product
            <a href="{{ action('ProductController@delete', $product->id) }}" class="btn btn-danger pull-right" title="Delete"><span class="glyphicon glyphicon-trash"></span></a>
        </h1>
    </div>
    
    {!! Form::open(['url'=>'/product/update', 'class'=>'col-sm-8 col-sm-offset-2']) !!}
    <div class="page-header">
        <h4>Product Info</h4>
    </div>
        {!! Form::hidden('id', $product->id) !!}
        <div class="form-group col-sm-12">
            {!! Form::label('name', 'Name') !!}
            {!! Form::text('name', $product->name, ['class'=>'form-control', 'required'=>'true']) !!}
        </div>
        <div class="form-group col-sm-12">
            {!! Form::label('product_category', 'Category') !!}
            
            @if($product_categories->isEmpty())
                <p class="form-control-static">Please add category first.</p>
            @else
                <select name="product_category" class="form-control">
                    @foreach($product_categories as $product_category)
                        <option value="{{ $product_category->id }}" 
                                @if($product->product_category_id == $product_category->id)
                                    selected
                                @endif
                                >{{ $product_category->name }}</option>
                    @endforeach
                </select>
            @endif
        </div>
        <div class="form-group col-sm-12">
            <label>Supplier</label>
            @if($suppliers->isEmpty())
                <p class="form-control-static">Please add suppliers first.</p>
            @else
                <select name="supplier" class="form-control">
                    @foreach($suppliers as $supplier)
                        <option value="{{ $supplier->id }}" 
                                @if($supplier->id == $product->supplier_id)
                                    selected
                                @endif
                                >{{ $supplier->name }}</option>
                    @endforeach
                </select>
            @endif
        </div>
    
<!--------------------------------------Product Boxes-------------------------------------------->
        <div class="page-header">
            <h4>Product Boxes</h4>
        </div>
    
        <div class="form-group col-sm-3">
            <label>Size</label>
        </div>
        <div class="form-group col-sm-2">
            <label>No. of Packs</label>
        </div>
        <div class="form-group col-sm-3">
            <label>Purchase Price</label>
        </div>
        <div class="form-group col-sm-3">
            <label>Selling Price</label>
        </div>
        <div class="form-group col-sm-1">
            <label>Remove</label>
        </div>
    
        <div id="box-container">
            @foreach($product->boxes as $i=>$box)
            <div>    
                {!! Form::hidden('box[]', $box->id) !!}
                <div class="form-group col-sm-3">
                    <input name="size[]" type="text" class="form-control" value="{{ $box->size }}" required>
                </div>
                <div class="form-group col-sm-2">
                    <input name="packs[]" type="number" class="form-control" value="{{ $box->no_of_packs }}" min="0">
                </div>
                <div class="form-group col-sm-3">
                    <input name="purchase_price[]" type="number" min="0.00" value="{{ $box->purchase_price }}" step="0.01" class="form-control">
                </div>
                <div class="form-group col-sm-3">
                    <input name="selling_price[]" type="number" min="0.00" value="{{ $box->selling_price }}" step="0.01" class="form-control">
                </div>
                <div class="form-group col-sm-1 text-right">
                    <a data-id="{{ $box->id }}" class="btn btn-default btn-remove @if($i==0) disabled @endif"><span class="glyphicon glyphicon-minus-sign"></span></a>
                </div>
            </div>
            @endforeach
        </div>
        <div class="form-group col-sm-12">
            <a id="btn-add" class="btn btn-default btn-xs">Add More</a>
        </div>
    
<!----------------------------------------Save Product_________________________________________-->    
    
        <div class="form-group col-sm-12 text-right">
            <a href="{{ action('ProductController@index') }}" class="btn btn-default">Cancel</a>
            {!! Form::submit('Update', ['class'=>'btn btn-success']) !!}
        </div>
        
    {!! Form::close() !!}
</div>

<script>
    $(document).ready(function(){
        $(this).on('click', '.btn-remove', function(){
            $id = $(this).data('id')
            $('#box-container').append(
                '<input type="hidden" name="trash[]" value="' + $id + '">'
            )
            $(this).parent().parent().remove()
        })
        
        $('#btn-add').click(function(){
            $('#box-container').append(
                '<div>' +
                    '<div class="form-group col-sm-3">' +
                        '<input name="asize[]" type="text" class="form-control" required>' +
                    '</div>' +
                    '<div class="form-group col-sm-2">' +
                        '<input name="apacks[]" type="number" class="form-control" value="0" min="0">' +
                    '</div>' +
                    '<div class="form-group col-sm-3">' +
                        '<input name="apurchase_price[]" type="number" min="0.00" value="0.00" step="0.01" class="form-control">' +
                    '</div>' +
                    '<div class="form-group col-sm-3">' +
                        '<input name="aselling_price[]" type="number" min="0.00" value="0.00" step="0.01" class="form-control">' +
                    '</div>' +
                    '<div class="form-group col-sm-1 text-right">' +
                        '<a class="btn btn-default btn-remove"><span class="glyphicon glyphicon-minus-sign"></span></a>' +
                    '</div>' +
                '</div>'
            )
        })
    })
</script>

@endsection