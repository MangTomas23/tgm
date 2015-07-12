@extends('app')

@section('inventory') active @endsection

@section('title') TGM - Inventory @endsection

@section('content')

<div class="container">
    <div class="page-header">
        <h1>Inventory</h1>
    </div>
    <div class="col-md-10 col-md-offset-1">
        <div class="page-header">
            <h3>
                In Stock 
                <a href="{{ action('InStockController@index') }}" 
                    class="btn btn-default pull-right">
                    <span class="glyphicon glyphicon-list-alt"></span>
                </a>
            </h3>
        </div>
        {!! Form::open(['url'=>'/inventory/stocks/in']) !!}
            <div class="form-group col-sm-6">
                <label>Date</label>
                <input name="date" type="date" class="form-control" required>
            </div>
            <div class="form-group col-sm-6">
                <label>Supplier</label>
                <select name="supplier" class="form-control">
                    @foreach($suppliers as $supplier)
                        <option value="{{ $supplier->id }}">
                            {{ $supplier->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-12 text-right">
                {!! Form::submit('Next', ['class'=>'btn btn-info']) !!}
            </div>
        {!! Form::close() !!}
        <span class="clearfix"></span>
		

<!------------------------ Add Orders ---------------------------------->

        <div class="page-header" style="margin-top: 48px">
            <h3>Add Order 
				<a href="{{ action('OrderController@index') }}" 
                    class="btn btn-default pull-right">
					<span class="glyphicon glyphicon-list-alt"></span>
				</a>
			</h3>
        </div>
		
        
        {!! Form::open(['url'=>'/order/add','method'=>'get']) !!}
            <div class="form-group col-sm-6">
                <label>Order By</label>
                <input name="order_by" type="text" class="form-control" 
                    list="customers-list" required autocomplete="off">
                <datalist id="customers-list">
                    @foreach($customers as $customer)
                        <option>{{ $customer->name }}</option>
                    @endforeach
                </datalist>
            </div>
            <div class="form-group col-sm-6">
                <label>Date</label>
                <input name="date" type="date" class="form-control" required>
            </div>
            <div class="form-group col-sm-8">
                <label>Address</label>
                <input name="address" class="form-control" type="text" 
                    value="{{ $input['address'] or null }}" required 
                    autocomplete="off">
            </div>
            <div class="form-group col-sm-4">
                <label>Salesman </label>
                <select name="salesman" class="form-control">
                    @foreach($employees as $employee)
                        <option value="{{ $employee->id }}">
                            {{ $employee->firstname . ' ' . 
                                $employee->lastname }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-sm-12 text-right">
                {!! Form::submit('Next', ['class'=>'btn btn-info']) !!}
            </div>
        {!! Form::close() !!}
		
		<span class="clearfix"></span>
		
<!----------------------------- Return Items ------------------------------>
		
		<div class="page-header" style="margin-top: 48px">
			<h3>
				Return 
				<a href="{{ action( 'ReturnController@index' ) }}" 
                    class="btn btn-default pull-right">
					<span class="glyphicon glyphicon-list-alt"></span>
				</a>
			</h3>
		</div>
		
		{!! Form::open( [ 'url' => '/return/add', 'method' => 'get' ] ) !!}
		
			<div class="form-group col-sm-6">
                <label>Customer</label>
                <input name="customer" type="text" class="form-control" 
                    list="customers-list" required autocomplete="off">
            </div>

            <div class="form-group col-sm-6">
                <label>Date</label>
                <input name="date" type="date" class="form-control">
            </div>

            <div class="form-group col-sm-12">
                <label>Address</label>
                <input name="address" type="text" class="form-control">
            </div>
		
			<div class="form-group col-sm-12 text-right">
				{!! Form::submit( 'Next', [ 'class' => 'btn btn-info' ] ) !!}
			</div>
		
		{!! Form::close() !!}
		
		<span class="clearfix"></span>

<!-------------------------------- Bad Orders -------------------------------->
		
		{!! Form::open( [ 'url' => '/bad/order/add', 'method' => 'get' ] ) !!}
		
		<div class="page-header" style="margin-top: 48px">
			<h3>
				Bad Orders
				<a href="{{ action('BadOrderController@index') }}" 
                    class="btn btn-default pull-right">
					<span class="glyphicon glyphicon-list-alt"></span>
				</a>
			</h3>
		</div>
		
        <div class="form-group col-sm-6">
            <label>Truck no</label>
            <input name="truck_no" class="form-control" type="text">
        </div>

        <div class="form-group col-sm-6">
            <label>Date</label>
            <input name="date" type="date" class="form-control">
        </div>
		
		<div class="form-group col-sm-12 text-right">
			{!! Form::submit( 'Next', [ 'class' => 'btn btn-info' ] ) !!}
		</div>
		
		{!! Form::close() !!}
		

<!------------------------------ Lost Items ---------------------------------->

    {!! Form::open(['url' => '/lost/items/add', 'method' => 'get']) !!}

    <div class="page-header">
        <h3>Lost Items</h3>
    </div>

    {!! Form::close() !!}

    </div>
</div>

<script>
    $(document).ready( function() {
        Date.prototype.toDateInputValue = (function() {
            var local = new Date(this);
            local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
            return local.toJSON().slice(0,10);
        });
        $('input[type=date]').val(new Date().toDateInputValue());
        
        $customers = []
        
        @foreach($customers as $customer)
            $customers.push({
                id: {{ $customer->id }},
                name: '{{ $customer->name }}',
                address: '{{ $customer->address }}'
            })
        @endforeach
        
        $("input[name=order_by], input[name=customer]").focusout(function(){
            $customer_name = $(this).val().toLowerCase()
            $.each($customers, function($i, $customer){
                if($customer.name.toLowerCase() == $customer_name){
                    $('input[name=address]').val($customer.address)
                    return false;
                }
            })
        });
    });
</script>
@endsection