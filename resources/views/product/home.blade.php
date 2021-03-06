@extends('app')

@section('products') active @endsection

@section('title') TGM - Products @endsection

@section('products') active @endsection

@section('content')
<div class="container">
    <div class="page-header">
        <h1>
            Products
            <a href="{{ action('ProductController@create') }}" class="btn btn-info pull-right">Add</a>
            <a id="print" href="#" class="btn btn-default" title="Print"><span class="glyphicon glyphicon-print"></span></a>
        </h1>
    </div>
    
    {!! Form::open(['url'=>'/products/search', 'class'=>'form']) !!}
    <div class="input-group col-md-3 col-md-offset-9">
        <input name="query" type="text" class="form-control" placeholder="Search" required>
        <span class="input-group-btn">
            <button class="btn btn-primary"><span class="glyphicon glyphicon-search"></span></button>
        </span>
    </div>
    {!! Form::close() !!}
    
    <div id="print-container">
        <div class="text-center visible-print">
            <p><strong>Tradeal General Merchandise</strong></p>
            <p>Pacol, Naga City</p>
        </div>

        <div class="table-responsive">
            <table class="table table-default" style="margin-top: 20px">
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
                    @if($products->isEmpty())
                        <tr>
                            <td colspan="5">No records found.</td>
                        </tr>
                    @else
                        <?php $num = $products->currentPage() * $products->perPage() - $products->perPage(); $n = $num<=0 ? 0:$num?>
                        @foreach($products as $product)
                            <tr>
                                <td><?php $n++; echo $n ?></td>
                                <td><a href="{{ action('ProductController@show', $product->id ) }}">{{ $product->name }}</a></td>
                                <td>{{ $product->product_category->name or null }}</td>
                                <td>{{ $product->supplier->name or null }}</td>
                                <td>
                                    @foreach($product->boxes as $box)
                                        <p class="text-nowrap">{{ $box->size }}</p>
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
                                        <p class="text-nowrap {{ $str=='Out of Stock' ? 'text-danger':'' }}">{{ $str }}</p>
                                    @endforeach
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>

        {!! $products->render() !!}
        <div class="page-header"></div>
        <p class="text-right">
            <strong>Total Products: </strong> <span class="badge">{{ $products->total() }}</span> 
        </p>
    
</div>
<script>
    $(document).ready(function(){
        $('#print').click(function(){
            $('#print-container').print()
        })
    })
</script>

@endsection