@extends('app')

@section('inventory') active @endsection

@section('title') TGM - Bad Order @endsection

@section('content')

<div class="container">
	<div class="page-header">
		<h1>Add Bad Order</h1>
	</div>
	
	<div class="form-group col-sm-6">
		<label for="order_no">Order No</label>
		<input name="order_no" type="text" class="form-control" readonly
			   value="{{ $input['order_no'] }}">
	</div>
	
	<div class="form-group col-sm-6">
		<label for="date">Date</label>
		<input name="date" type="date" class="form-control" readonly
			   value="{{ $input['date'] }}">
	</div>
	<span class="clearfix"></span>
	<hr>
	
	<table class="table table-default">
		<thead>
			<tr>
				<th>Product</th>
				<th>Box</th>
				<th>No of Packs Ordered</th>
				<th>No of Box Ordered</th>
				<th>No of Bad Orders (Box)</th>
				<th>No of Bad Orders (Packs)</th>
			</tr>
		</thead>
		<tbody>
			@foreach($orderItems as $orderItem)
				<tr>
					<td>{{ $orderItem->product->name }}</td>
					<td>{{ $orderItem->box->size }}</td>
					<td>{{ $orderItem->no_of_box }}</td>
					<td>{{ $orderItem->no_of_packs }}</td>
					<td>
						<input type="number" min="0" value="0"
							   class="form-control">	
					</td>
					<td>
						<input type="number" min="0" value="0"
							   class="form-control">
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	
	{!! Form::submit( 'Save', [ 'class' => 'btn btn-success' ] ) !!}
</div>

@endsection