@extends('app')

@section('title') TGM - Add Order @endsection

@section('content')

<div class="container">
    <div class="page-header">
        <h1>Add Order</h1>
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
        <div class="alert alert-info alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4>Jelly Cup</h4>
            <div class="box-container">
                <div class="form-group col-sm-2 col-xs-4">
                    <label>&nbsp</label>
                    <p class="form-control-static box-size"><strong>40 x 24</strong></p>
                </div>
                <div class="form-group col-sm-2 col-xs-4">
                    <label>Box</label>
                    <input type="number" class="form-control" min="0" value="0">
                </div>
                <div class="form-group col-sm-2 col-xs-4">
                    <label>Pack</label>
                    <input type="number" class="form-control" min="0" value="0">
                </div>
                <div class="form-group col-sm-2">
                    <label>Price: </label>
                    <select class="form-control select-price">
                        <option value="1" data-price="1200">Selling Price 1</option>
                        <option value="2" data-price="1300">Selling Price 2</option>
                    </select>
                </div>
                <div class="form-group col-sm-2">
                    <label>Price per Box/Pack</label>
                    <p class="form-control-static price">1200.00</p>
                </div>
                <div class="form-group col-sm-2">
                    <label>In Stock</label>
                    <p class="form-control-static">Out of Stock</p>
                </div>
            </div>
            
            <div class="text-right col-xs-12">
                <a href="#" class="btn btn-info">Add</a>
            </div>
            <span class="clearfix"></span>
        </div>
-->
    </div>
    <hr style="margin-top: 100px">
    <div id="invoice">
        
        <p>
            Order Slip
            <span class="pull-right">
                No: 
                <span class="badge">1234</span>
            </span>
        </p>
        <div class="text-center" style="margin-top:24px">
            <h3><strong>Tradeal General Merchandise</strong></h3>
            <p>Pacol, Naga City</p>
        </div>
        <div class="row">
            <div class="col-xs-6">
                <p><strong>Ordered by: </strong> Sample Name</p>
                <p><strong>Address</strong> Sample Address </p>
            </div>
            <div class="col-xs-6 text-right">
                <strong>Date: </strong> 01/01/2015
            </div>
        </div>
        <hr>
        <div class="table-responsive" style="min-height: 280px; margin-top:24px">
            <table class="table table-default">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th class="text-right">Amount</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        <hr>
        <div class="text-right col-xs-12">
            <p><strong>Total: </strong><span id="total-amount">P 0.00</span></p>
        </div>
    </div>
    <hr>
    <div class="col-sm-12 text-right">
        <a id="savePrint" href="#" class="btn btn-xs btn-success">Save and Print</a>
    </div>
</div>

<script>
    $.fn.digits = function(){ 
        return this.each(function(){ 
            $(this).text( $(this).text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") ); 
        })
    }
    $(document).ready(function(){
        $data = null;
        
        $('#search-product').keyup(function(){
            $query = $(this).val()
            
            $.get('{{ action('OrderController@query') }}',{
                query: $query     
            }, function(data){
                $data = data
                
                $str = '<div class="alert alert-info alert-dismissable">' +
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                            '<h4>' + data['product']['name'] + '</h4>';
                
                $.each(data['boxes'], function($i,$box){
                    $isOutOfStock = data['stocks'][$i] == 'Out of Stock' ? true:false;
                    $str += '<div class="box-container">' +
                                '<div class="form-group col-sm-2 col-xs-4">' +
                                    '<label>&nbsp</label>' +
                                    '<p class="form-control-static"><strong>' + $box['size'] + '</strong></p>' +
                                '</div>' +
                                '<div class="form-group col-sm-2 col-xs-4">' +
                                    '<label>' + ($i!=0 ? '&nbsp;':'Box') + '</label>' +
                                    '<input type="number" class="form-control box" min="0" value="0" ' + ($isOutOfStock ? "readonly":"") + '>' +
                                '</div>' +
                                '<div class="form-group col-sm-2 col-xs-4">' +
                                    '<label>' + ($i!=0 ? '&nbsp;':'Packs') + '</label>' +
                                    '<input type="number" class="form-control packs" min="0" value="0" ' + ($isOutOfStock ? "readonly":"") + '>' +
                                '</div>' +
                                '<div class="form-group col-sm-2">' +
                                    '<label>' + ($i!=0 ? '&nbsp;':'Price') + '</label>' +
                                    '<select class="form-control select-price" data-packs="' + $box['no_of_packs'] + '">' +
                                        '<option value="1" data-price="' + $box['selling_price_1'] + '">Selling Price 1</option>' +
                                        '<option value="2" data-price="' + $box['selling_price_2'] + '">Selling Price 2</option>' +
                                    '</select>' +
                                '</div>' +
                                '<div class="form-group col-sm-2">' +
                                    '<label>' + ($i!=0 ? '&nbsp;':'Price per Box/Pack') + '</label>' +
                                    '<p class="form-control-static price"><span class="perBox">' + $box['selling_price_1'] + '</span> / <span class="perPack">' + parseFloat($box['selling_price_1']/$box['no_of_packs']).toFixed(2) + '</span></p>' +
                                '</div>' +
                                '<div class="form-group col-sm-2">' +
                                    '<label>'+ ($i!=0 ? '&nbsp;':'In Stock') +'</label>' +
                                    '<p class="form-control-static">' + data['stocks'][$i] + (data['stocks'][$i]!='Out of Stock' ? ' Box':'') + '</p>' +
                                '</div>' +
                            '</div>';
                })
                
                $str += '<div class="text-right col-xs-12">' +
                            '<a id="btn-add" class="btn btn-info">Add</a>' +
                        '</div>' +
                        '<span class="clearfix"></span>' +
                    '</div>';
                
                
                $('#suggestion-container').empty().append($str)
            })
        })
        
        $('#savePrint').click(function(){
            $('#invoice').print();
        })
        
        $(this).on('change','.select-price',function(){
            $price = $(this).find(':selected').data('price')
            $packs = $(this).data('packs')
            $(this).closest('.box-container').find('.perBox').text($price)
            $(this).closest('.box-container').find('.perPack').text(parseFloat($price/$packs).toFixed(2))
        })
        
        
        
        $(this).on('click','#btn-add', function(){
            
            
            $str = null
            
            $.each($data['boxes'], function($i, $box){
            $boxVal = parseInt($('.box')[$i]['value']);
            $packsVal = parseInt($('.packs')[$i]['value']);
                if(($boxVal==0||!$.isNumeric($boxVal))&&($packsVal==0||!$.isNumeric($packsVal))) return true
                $str += '<tr>'
                $str += '<td>' + $data['product']['name'] + ' @ ' + $box['size'] +'</td>'
                $str += '<td>'
                
                    if($('.box')[$i]['value']!=0 && $('.packs')[$i]['value']==0){
                        $str += $('.box')[$i]['value'] + ' Box'
                    }else if($('.box')[$i]['value']==0 && $('.packs')[$i]['value']!=0){
                        $str += $('.packs')[$i]['value'] + ' Packs'
                    }else{
                        $str += $('.box')[$i]['value'] + ' Box, ' + $('.packs')[$i]['value'] + ' Packs'
                    }
                $amount = parseFloat($('.box')[$i]['value'] * parseFloat($('.perBox')[$i]['innerText'])).toFixed(2)
                $str += '</td>'
                $str += '<td class="text-right amount" data-amount="'+$amount+'">' + $amount + '</td>'
                $str += '</tr>'

            })
            $('#invoice').find('tbody').append($str)
            $('.amount').digits()
            
            $totalAmount = 0;
            $.each($('.amount'), function(){
                $totalAmount += parseFloat($(this).data('amount'))
            })
            
            $('#total-amount').text('P ' + parseFloat($totalAmount).toFixed(2)).digits()
        })
        
       
    })
</script>

@endsection