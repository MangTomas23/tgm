@extends('app')

@section('products') active @endsection

@section('title') TGM - Add Products @endsection

@section('content')

<div class="container">
    <div class="page-header">
        <h1>Add Product</h1>
    </div>
    
    @if(isset($saveSuccessful))
        <div class="alert alert-success col-sm-10 col-sm-offset-1">
            <strong>Success!</strong> {{ $input['name'] }} Added. Back to <a href="{{ action('ProductController@index') }}" class="alert-link">Product List</a>.
        </div>
    @endif
    
    {!! Form::open(['url'=>'/product/create', 'class'=>'form col-sm-10 col-sm-offset-1']) !!}
        <div class="page-header">
            <h4>Product Info</h4>
        </div>
        <div class="form-group col-sm-12">
            {!! Form::label('name', 'Product Name') !!}
            {!! Form::text('name','', ['class'=>'form-control', 'required'=>'true', 'autofocus'=>'true']) !!}
        </div>
        <div class="form-group col-sm-6">
            <label for="product_category">
                Category
                <a href="{{ action('ProductCategoryController@index') }}" class="btn btn-xs btn-default" tabindex="-1"><span class="glyphicon glyphicon-cog"></span></a>
            </label>
            @if($product_categories->isEmpty())
                <p class="form-control-static">Please add category first.</p>
            @else
                <select name="product_category" class="form-control">
                    @foreach($product_categories as $product_category)
                        <option value="{{ $product_category->id }}"
                        @if(isset($input))        
                            @if($product_category->id == $input['product_category'])
                                selected
                            @endif
                        @endif
                        >{{ $product_category->name }}</option>
                    @endforeach
                </select>
            @endif
        </div>
        <div class="form-group col-sm-6">
            {!! Form::label('supplier', 'Supplier') !!}
            <select name="supplier" class="form-control">
                @foreach($suppliers as $supplier)
                    <option value="{{ $supplier->id }}"
                        @if(isset($input))        
                            @if($supplier->id == $input['supplier'])
                                selected
                            @endif
                        @endif
                    >{{ $supplier->name }}</option>
                @endforeach
            </select>
        </div>
        <span class="clearfix"></span>
<!-----------------------------------------Product Boxes---------------------------------->    
    
        <div class="page-header">
            <h4>Product Boxes</h4>
        </div>
        <div class="form-group col-sm-3">
            <label>Size</label>
        </div>
        <div class="form-group col-sm-2">
            <label>Number of Packs</label>
        </div>
        <div class="form-group col-sm-2">
            <label>Purchase Price</label>
        </div>
        <div class="form-group col-sm-2">
            <label>Selling Price 1</label>
        </div>
        <div class="form-group col-sm-2">
            <label>Selling Price 2</label>
        </div>
        <div class="form-group col-sm-1">
            <label>Remove</label>
        </div>
        
        <span class="clearfix"></span>
        
        @if(!isset($input))
            <div class="form-group col-sm-3">
                <input name="size[]" type="text" class="form-control size" placeholder="e.g. 2 x 3" value="" required>
            </div>
            <div class="form-group col-sm-2">
                <input name="packs[]" type="number" min="0" value="0" class="form-control pack">
            </div>
            <div class="form-group col-sm-2">
                <input name="purchase_price[]" type="number" min="0.00" value="0.00" step="0.01" class="form-control">
            </div>
            <div class="form-group col-sm-2">
                <input name="selling_price_1[]" type="number" min="0.00" value="0.00" step="0.01" class="form-control">
            </div>
            <div class="form-group col-sm-2">
                <input name="selling_price_2[]" type="number" min="0.00" value="0.00" step="0.01" class="form-control">
            </div>
            <div class="form-group col-sm-1 text-right">
                <a class="btn btn-default disabled"><span class="glyphicon glyphicon-minus-sign"></span></a>
            </div>
        @else
            @foreach($input['size'] as $i=>$v)
                <div class="form-group col-sm-3">
                    <input name="size[]" type="text" class="form-control" placeholder="e.g. 2 x 3" value="{{ $v }}">
                </div>
                <div class="form-group col-sm-2">
                    <input name="packs[]" type="number" min="0" value="{{ $input['packs'][$i] }}" class="form-control">
                </div>
                <div class="form-group col-sm-2">
                    <input name="purchase_price[]" type="number" min="0.00" value="{{ $input['purchase_price'][$i] }}" step="0.01" class="form-control">
                </div>
                <div class="form-group col-sm-2">
                    <input name="selling_price_1[]" type="number" min="0.00" value="{{ $input['selling_price_1'][$i] }}" step="0.01" class="form-control">
                </div>
                <div class="form-group col-sm-2">
                    <input name="selling_price_2[]" type="number" min="0.00" value="{{ $input['selling_price_2'][$i] }}" step="0.01" class="form-control">
                </div>
                <div class="form-group col-sm-1 text-right">
                    <a class="btn btn-default disabled"><span class="glyphicon glyphicon-minus-sign"></span></a>
                </div>
            @endforeach
        @endif
    
        <div id="box-container">
    
        </div>
        <span class="clearfix"></span>
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
    <span class="clearfix"></span>
</div>

<script>
    $(document).ready(function(){
        $('#btnAddMore').click(function(){
            $('#box-container').append(
                '<div>'+
                    '<div class="form-group col-sm-3">' +
                        '<input name="size[]" type="text" class="form-control" placeholder="e.g. 2 x 3" value="" required>' +
                    '</div>' +
                    '<div class="form-group col-sm-2">' +
                        '<input name="packs[]" type="number" min="0" value="0" class="form-control">' +
                    '</div>' +
                    '<div class="form-group col-sm-2">' +
                        '<input name="purchase_price[]" type="number" min="0.00" value="0.00" step="0.01" class="form-control">' +
                    '</div>' +
                    '<div class="form-group col-sm-2">' +
                        '<input name="selling_price_1[]" type="number" min="0.00" value="0.00" step="0.01" class="form-control">'+
                    '</div>' +
                    '<div class="form-group col-sm-2">' +
                        '<input name="selling_price_2[]" type="number" min="0.00" value="0.00" step="0.01" class="form-control">'+
                    '</div>' +
                    '<div class="form-group col-sm-1 text-right">' +
                        '<a class="btn btn-default btn-remove"><span class="glyphicon glyphicon-minus-sign"></span></a>' +
                    '</div>' +
                '</div>'
            )
        })
        
        $(this).on('click','.btn-remove', function(){
            $(this).parent().parent().remove()
        })
    });
</script>

@endsection