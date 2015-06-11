@extends('app')

@section('products') active @endsection

@section('content');

<div class="container">

    <div class="page-header">
        <h1>
            {{ $product->name }}
            <a href="{{ action('ProductController@delete', $product->id) }}" class="btn btn-danger pull-right" title="Delete"><span class="glyphicon glyphicon-trash"></span></a>
        </h1>
    </div>
    
    <div class="page-header">
        <h4>Product Info</h4>
    </div>
    {!! Form::open(['url'=>'/product/update']) !!}
        {!! Form::hidden('id', $product->id) !!}
        <div class="form-group col-sm-12">
            {!! Form::label('name', 'Name') !!}
            {!! Form::text('name', $product->name, ['class'=>'form-control']) !!}
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
        <div class="form-group col-sm-6">
            {!! Form::label('price_1', 'Price 1') !!}
            {!! Form::text('price_1', $product->price_1, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group col-sm-6">
            {!! Form::label('price_2', 'Price 2') !!}
            {!! Form::text('price_2', $product->price_2, ['class'=>'form-control']) !!}
        </div>
    
<!--------------------------------------Product Boxes-------------------------------------------->
        <div class="page-header">
            <h4>Product Boxes</h4>
        </div>
    
        <div class="form-group col-xs-6">
            <label>Size</label>
        </div>
        <div class="form-group col-xs-6">
            <label>No. of Packs</label>
        </div>
    
        <div id="box-container">
            @foreach($product->boxes as $box)
                {!! Form::hidden('box[]', $box->id) !!}
                <div class="form-group col-xs-6">
                    <input name="size[]" type="text" class="form-control" value="{{ $box->size }}">
                </div>
                <div class="form-group col-xs-6">
                    <input name="packs[]" type="number" class="form-control" value="{{ $box->no_of_packs }}" min="0">
                </div>
            
            @endforeach
        </div>
    
<!----------------------------------------Save Product_________________________________________-->    
    
        <div class="form-group col-sm-12 text-right">
            <a href="{{ action('ProductController@index') }}" class="btn btn-default">Cancel</a>
            {!! Form::submit('Update', ['class'=>'btn btn-success']) !!}
        </div>
        
    {!! Form::close() !!}
</div>

@endsection