@extends('app')

@section('title') TGM - Add Order @endsection

@section('content')

<div class="container">
    {!! Form::open(['url'=>'/order/store','id'=>'order-form']) !!}
    
    <div class="page-header">
        <h1>Add Order</h1>
    </div>
    <div class="form-group col-sm-6">
        <label>Order by</label>
        <input type="hidden" value="{{ $customer->id or null }}">
        <input id="order-by" name="name" type="text" class="form-control" value="{{ $input['order_by'] or null }}" list="customer-list" required autocomplete="off">
        <datalist id="customer-list">
            @foreach($customers as $customer)
                <option>{{ $customer->name }}</option>
            @endforeach
        </datalist>
    </div>
    <div class="form-group col-sm-6">
        <label>Date</label>
        <input name="date" type="date" class="form-control" value="{{ $input['date'] or null }}">
    </div>
    <div class="form-group col-sm-12">
        <label>Address: </label>
        <input name="address" type="text" class="form-control" value="{{ $input['address'] or null }}" required autocomplete="off">
    </div>
    <div class="form-group col-sm-6">
        <label>Type</label>
        <select name="type" class="form-control">
            <option value="Extract">Extract</option>
            <option value="Booking">Booking</option>
            <option value="In-House">In-House</option>
        </select>
    </div>
    <div class="form-group col-sm-6">
        <label>Salesman</label>
        <select class="form-control" name="salesman">
            @foreach($employees as $employee)
                <option value="{{ $employee->id }}">{{ $employee->firstname . ' ' . $employee->lastname }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-sm-12">
        <label>Product</label>
        <input id="search-product" type="text" class="form-control">
    </div>
    <span class="clearfix"></span>
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
    <div id="order-slip">
        
        <p>
            Order Slip
            <span class="pull-right">
                No: 
				<?php
					$result = DB::select(DB::raw('SHOW TABLE STATUS LIKE "orders"'));
					$id = $result[0]->Auto_increment;
				?>
                <span id="os-number"class="badge">{{ str_pad($id, 4, 0, STR_PAD_LEFT) }}</span>
            </span>
        </p>
        <div class="text-center" style="margin-top:24px">
            <h3><strong>Tradeal General Merchandise</strong></h3>
            <p>Smart #: 09199980311 / Globe #: 09173179285</p>
            <p>Pacol, Naga City</p>
        </div>
        <div class="row">
            <div class="col-xs-6">
                <p><strong>Order by: </strong> <span id="os-order-by">{{ $input['order_by'] or null}}</span></p>
                <p><strong>Address</strong> <span id="os-address">{{ $input['address'] or null }}</span></p>
            </div>
            <div class="col-xs-6 text-right">
                <p><strong>Date: </strong> <span id="os-date">01/01/2015</span></p>
                <p><strong>Salesman: </strong><span id="os-salesman"></span></p>
            </div>
        </div>
        <hr>
        <div class="table-responsive" style="min-height: 280px; margin-top:24px">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th class="text-right">Amount</th>
                        <th class="hidden-print"></th>
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
		{!! Form::submit('Save and Print', ['class'=>'btn btn-success','id'=>'savePrint']) !!}
    </div>
    {!! Form::close() !!}
    
</div>
<div id="modal-exceed" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Error</h4>
            </div>
            <div class="modal-body">
                <p>Orders Exceed! / Out of Stock!</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div id="modal-edit" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit</h4>
            </div>
            <div class="modal-body">
                <p>Orders Exceed!</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<script>
    var customers = [],
		salesmen = [];
    
    @foreach($customers as $customer)
        customers.push({
            id: {{ $customer->id }},
            name: "<?php echo $customer->name ?>",
            address: "<?php echo $customer->address ?>"
        })
    @endforeach
    
    @foreach($employees as $employee)
        salesmen.push({
            id: {{ $employee->id }},
            name: "{{ $employee->firstname . ' ' . $employee->lastname}}"
        })
    @endforeach
    
</script>
<script src="{{ asset('/js/addOrders.js') }}"></script>

@endsection