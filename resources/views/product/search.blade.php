@extends('app')

@section('products') active @endsection

@section('title') TGM - Search Product @endsection


@section('content')

<div class="container">
    <div class="page-header">
        <h1>
            @if($products->isEmpty())
                No results for "{{ $query }}"
            @else
                Search Results for "{{ $query }}"
            @endif
            <span class="visible-xs-block" style="padding:20px"></span>
            {!! Form::open(['url'=>'/products/search', 'class'=>'form col-md-4 pull-right']) !!}
            <div class="input-group">
                <input type="text" name="query" class="form-control" required>
                <span class="input-group-btn">
                    <button class="btn btn-primary"><span class="glyphicon glyphicon-search"></span></button>
                </span>
            </div>
            {!! Form::close()  !!}
        </h1>
    </div>
    
    @if(!$products->isEmpty())
    
    <table class="table table-default">
        <thead>
            <tr>
                <th>#</th>
                <th>Product Name</th>
                <th>Category</th>
                <th>Supplier</th>
                <th>Box</th>
                <th>Stock</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $i=>$product)
                <tr>
                    <td>{{ $i+1 }}</td>
                    <td>
                        <a href="{{ action('ProductController@show',$product->id) }}">
                            {{ $product->name }}
                        </a>
                    </td>
                    <td>{{ $product->product_category->name or null }}</td>
                    <td>{{ $product->supplier->name or null }}</td>
                    <td>
                        @foreach($product->boxes as $box)
                            <p>{{ $box->size }}</p>
                        @endforeach
                    </td>
                    <td>
                        @foreach($product->boxes as $box)
                            <?php
                                $str = "";
                                $b = App\Box::countStock($box->id)['no_of_box_available'];
                                $p = App\Box::countStock($box->id)['no_of_packs_available'];
                                if($b==0 && $p==0){
                                    $str = 'Out of Stock';
                                }else{
                                    $str =  $b . ' Box, ' . $p . ' Packs'; 
                                }
                            ?>
                            <p class="text-nowrap {{ $str=='Out of Stock' ? 'text-danger':'' }}">
                                {{ $str }}
                            </p>
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </tbody>
            
    </table>
    
    @endif
</div>

@endsection