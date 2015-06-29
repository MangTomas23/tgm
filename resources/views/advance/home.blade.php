@extends('app')

@section('title') Welcome Dev! @endsection

@section('content')

<div class="container">
	<div class="page-header">
		<h1>Developer Options</h1>
	</div>
	
	{!! Form::open( [ 'url' => '/developer/advance/options/execute' ] ) !!}
		<label class="checkbox">
			<input name="tables[]" type="checkbox" value="orders"> Truncate Orders 
		</label>
		<label class="checkbox">
			<input name="tables[]" type="checkbox" value="order_items"> Truncate Order Items
		</label>
		<label class="checkbox">
			<input name="tables[]" type="checkbox" value="customers"> Truncate Customers
		</label>
		<label class="checkbox">
			<input name="tables[]" type="checkbox" value="in_stocks"> Truncate In Stocks
		</label>

	{!! Form::submit( 'Execute',[ 'class' => 'btn btn-danger' ] ) !!}
	{!! Form::close() !!}
</div>

@endsection