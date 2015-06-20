@extends('app')

@section('title') TGM - Add Transaction @endsection

@section('content')

<div class="container">
    <div class="page-header">
        <h1>Add Transaction</h1>
    </div>
    <div class="form-group">
        <label>Date</label>
        <input type="datetime-local" class="form-control">
    </div>
    <div class="form-group">
        <label>Product</label>
        <input id="search-product" type="text" class="form-control">
    </div>
    <div id="suggestion-container">
<!--
        <div class="alert alert-info">
            <h4>Jelly Cup</h4>
            <div class="form-group col-sm-2 col-xs-4">
                <label>&nbsp</label>
                <p class="form-control-static"><strong>40 x 24</strong></p>
            </div>
            <div class="form-group col-sm-5 col-xs-4">
                <label>Box</label>
                <input type="number" class="form-control" min="0" value="0">
            </div>
            <div class="form-group col-sm-5 col-xs-4">
                <label>Pack</label>
                <input type="number" class="form-control" min="0" value="0">
            </div>
            
            <div class="text-right col-xs-12">
                <a href="#" class="btn btn-info">Add</a>
            </div>
            <span class="clearfix"></span>
        </div>
-->
    </div>
    
    <div id="invoice">
        <div class="text-center">
            <p><strong>Tradeal General Merchandise</strong></p>
            <p>Pacol, Naga City</p>
            
        </div>
        
        <table class="table table-default" style="min-height: 350px">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th class="text-right">Amount</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Jelly Cup @ 40 x 24</td>
                    <td>5 Box, 8 Packs</td>
                    <td class="text-right text-nowrap">P 24,000.00</td>
                </tr>
            </tbody>
        </table>
        <div class="page-header">&nbsp;</div>
        <div class="text-right col-xs-12">
            <p><strong>Total:</strong>P 24,000.00</p>
        </div>
    </div>
    <div class="page-header">&nbsp;</div>
    <div class="col-sm-12 text-right">
        <a id="savePrint" href="#" class="btn btn-xs btn-success">Save and Print</a>
    </div>
    
</div>

<script>
    $(document).ready(function(){
        $('#search-product').keyup(function(){
            $query = $(this).val()
            
            $.get('{{ action('TransactionController@query') }}',{
                query: $query     
            }, function(data){
                
                $str = '<div class="alert alert-info alert-dismissible">' +
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                            '<h4>' + data['product']['name'] + '</h4>';
                
                $.each(data['boxes'], function($i,$box){
                    $str +=  '<div class="form-group col-sm-2 col-xs-4">' +
                                '<label>&nbsp</label>' +
                                '<p class="form-control-static"><strong>'+ $box['size'] +'</strong></p>' +
                            '</div>' +
                            '<div class="form-group col-sm-5 col-xs-4">' +
                                '<label>Box</label>' +
                                '<input type="number" class="form-control" min="0" value="0">' +
                            '</div>' +
                            '<div class="form-group col-sm-5 col-xs-4">' +
                                '<label>Pack</label>' +
                                '<input type="number" class="form-control" min="0" value="0">' +
                            '</div>';
                })
                
                $str += '<div class="text-right col-xs-12">' +
                            '<a href="#" class="btn btn-info">Add</a>' +
                        '</div>' +
                        '<span class="clearfix"></span>' +
                    '</div>';
                
                
                $('#suggestion-container').empty().append($str)
            })
        })
        
        $('#savePrint').click(function(){
            $('#invoice').print();
        })
    })
</script>

@endsection