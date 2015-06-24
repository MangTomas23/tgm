$.fn.digits = function(){ 
    return this.each(function(){ 
        $(this).text( $(this).text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") ); 
    })
}

$(document).ready(function(){
    $data = null;
    
/**********************************************************

    Populate suggestion container

***********************************************************/    
    
    $('#search-product').keyup(function(){
        $query = $(this).val()

        $.get('/order/query',{
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

/******************************************************
    
    Save and Print orders
    
******************************************************/

    
    $('#savePrint').click(function(){
        $('#order-slip').print();
    })

    $(this).on('change','.select-price',function(){
        $price = $(this).find(':selected').data('price')
        $packs = $(this).data('packs')
        $(this).closest('.box-container').find('.perBox').text($price)
        $(this).closest('.box-container').find('.perPack').text(parseFloat($price/$packs).toFixed(2))
    })

    $(this).on('click','#suggestion-container input[type=number]', function(){
        $('#btn-add').removeClass('btn-danger').addClass('btn-info').text('Add')
    })
    
/******************************************************

    Validates and add items to order slip

******************************************************/

    $(this).on('click','#btn-add', function(){
        $str = null
        $isValid = true;



        $(this).removeClass('btn-danger').addClass('btn-success')

        $.each($data['boxes'], function($i, $box){
            $boxVal = parseInt($('.box')[$i]['value'])
            $packsVal = parseInt($('.packs')[$i]['value'])

            $stocks = $data['stocks'][$i]
            $totalNoOfPacks = $box['no_of_packs'] * $stocks

            $totalOrders = $boxVal * $box['no_of_packs'] + $packsVal
            $isExceeded = $totalOrders > $totalNoOfPacks;

            if($isExceeded){
                $('#modal-exceed').modal('show')
                $isValid = false;
                return false;
            }

            console.log($totalNoOfPacks + ' - ' + $totalOrders)

            if(($boxVal==0||!$.isNumeric($boxVal))&&($packsVal==0||!$.isNumeric($packsVal))){ 
                $isValid = false;
                return true
            }
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
            $str += '<td class="text-right hidden-print remove-item">' + 
                        '<a class="btn btn-xs btn-info"><span class="glyphicon glyphicon-remove"></span></a>' +
                    '</td>'
            $str += '</tr>'

        })

        if(!$isValid){
            $(this).removeClass('btn-info').addClass('btn-danger').text('Invalid')
            return;
        }

        $('#order-slip').find('tbody').append($str)
        $('.amount').digits()

        $totalAmount = 0;
        $.each($('.amount'), function(){
            $totalAmount += parseFloat($(this).data('amount'))
        })

        $('#total-amount').text('P ' + parseFloat($totalAmount).toFixed(2)).digits()
        $(this).removeClass('btn-info').addClass('btn-success disabled').text('Added')

        $('#search-product').focus()
    })

/****************************************

    Set customer's address

*****************************************/    

    $("#order-by").focusout(function(){
        $customer_name = $(this).val().toLowerCase()
        $.each($customers, function($i, $customer){
            if($customer.name.toLowerCase() == $customer_name){
                $('input[name=address]').val($customer.address)
                return false;
            }
        })
    });

/****************************************
    
    Set order slip's salesman
    
*****************************************/
    
    $setOSSalesman = function(){
        $.each($salesmen, function($i,$salesman){
            if($salesman.id==$('select[name=salesman]').val()){
                $('#os-salesman').text($salesman.name)
                return false;
            }
        })
    }
    
    $setOSSalesman()
    
    $('select[name=salesman]').change(function(){
        $setOSSalesman()
    })
    
/******************************************

    Set order slip's date

*******************************************/    
    
    
    $setOSDate = function(){
        $d = new Date($('input[name=date]').val());

        $month = $d.getMonth()+1;
        $day = $d.getDate();

        $formattedDate = ($month<10 ? '0' : '') + $month + '/' +
                     ($day<10 ? '0' : '') + $day + '/' +
                     $d.getFullYear();

        $('#os-date').text($formattedDate)
    }
    
    $setOSDate()
    
    $('input[name=date]').change(function(){
        $setOSDate()
    })
    
/********************************************

    Remove items from order slip

*********************************************/    
    
    $(this).on('click', '.remove-item', function(){
        $(this).closest('tr').remove()
    })
    
/********************************************

    Disable enter key to prevent accidental
    form submission

*********************************************/
    
    $('#order-form').on("keyup keypress", function(e) {
        $code = e.keyCode || e.which; 
        if ($code  == 13) {               
            e.preventDefault();
            return false;
        }
    })
    
    
/********************************************

    Set order type

*********************************************/
    
    $('select[name=type]').change(function(){
        $type = $(this).val()
        $('select[name=salesman]').attr('disabled',$type=='In-House')
    })
    
})