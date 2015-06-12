@extends('app')

@section('products') active @endsection

@section('content')

<div class="container">
    <div class="page-header">
        <h1>Add Product</h1>
    </div>
    
    {!! Form::open(['url'=>'/product/create', 'class'=>'form col-sm-8 col-sm-offset-2']) !!}
        <div class="page-header">
            <h4>Product Info</h4>
        </div>
        <div class="form-group col-sm-12">
            {!! Form::label('name', 'Product Name') !!}
            {!! Form::text('name','', ['class'=>'form-control', 'required'=>'true']) !!}
        </div>
        <div class="form-group col-sm-12">
            <label for="product_category">
                Category
                <a href="{{ action('ProductCategoryController@index') }}" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-cog"></span></a>
            </label>
            @if($product_categories->isEmpty())
                <p class="form-control-static">Please add category first.</p>
            @else
                <select name="product_category" class="form-control">
                    @foreach($product_categories as $product_category)
                        <option value="{{ $product_category->id }}">{{ $product_category->name }}</option>
                    @endforeach
                </select>
            @endif
        </div>
        <div class="form-group col-sm-12">
            {!! Form::label('supplier', 'Supplier') !!}
            <select name="supplier" class="form-control">
                @foreach($suppliers as $supplier)
                    <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-sm-6">
            {!! Form::label('price_1', 'Price 1') !!}
            {!! Form::input('number','price_1', null, ['class'=>'form-control','min'=>'0.01','step'=>'0.01', 'required'=>'true']) !!}
        </div>
        <div class="form-group col-sm-6">
            {!! Form::label('price_2', 'Price 2') !!}
            {!! Form::input('number','price_2', null, ['class'=>'form-control','min'=>'0.01','step'=>'0.01']) !!}
        </div>
    
<!-----------------------------------------Product Boxes---------------------------------->    
    
        <div class="page-header">
            <h4>Product Boxes</h4>
        </div>
        <div class="form-group col-xs-6">
            <label>Size</label>
        </div>
        <div class="form-group col-xs-6">
            <label>Number of Packs</label>
        </div>
    
        <div class="form-group col-xs-6">
            {!! Form::text('size[]', null, ['class'=>'form-control','placeholder'=>'e.g. 2x3']) !!}
        </div>
        <div class="form-group col-xs-6">
            {!! Form::input('number','packs[]', null, ['class'=>'form-control', 'min'=>'0']) !!}
        </div>
    
        <div id="box-container">
    
        </div>
    
        <div class="col-sm-12">
            <a id="btnAddMore" class="btn btn-default btn-xs">Add More</a>
        </div>
        
<!---------------------------------------Save Product-------------------------------------->    
    
        <div class="page-header"></div>
    
        <div class="col-sm-12 text-right">
            <a href="{{ action('ProductController@index') }}" class="btn btn-default">Cancel</a>
            {!! Form::submit('Save', ['class'=>'btn btn-success']) !!}
        </div>
    
    {!! Form::close() !!}
</div>

<script>
    $(document).ready(function(){
        $('#btnAddMore').click(function(){
            $('#box-container').append(
                '<div class="form-group col-xs-6">' +
                    '<input name="size[]" type="text" class="form-control">' +
                '</div>' +
                '<div class="form-group col-xs-6">' +
                    '<input name="packs[]" type="number" min="0" class="form-control">' + 
                '</div>'
            )
        })
        
    });
</script>

@endsection