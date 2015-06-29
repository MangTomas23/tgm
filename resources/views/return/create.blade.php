@extends('app')

@section('inventory') active @endsection

@section('title') TGM - Add Return @endsection

@section('content')

<div class="container">
	
	<div class="page-header">
		<h1>Add Returns</h1>
	</div>

	{!! Form::open( [ 'url' => '/return/store' ] ) !!}

	<div class="form-group col-sm-6">
		<label for="order_no">Order No</label>
		<input name="order_no" type="text" class="form-control" 
			   placeholder="e.g. 0001"
			   value="{{ str_pad( $input['order_no'], 4, 0, STR_PAD_LEFT ) }}"
			   readonly>
	</div>
	
	<div class="form-group col-sm-6">
		<label for="date">Date</label>
		<input name="date" type="date" class="form-control" 
			   value="{{ $input[ 'date' ] }}" readonly>
	</div>

	<span class="clearfix"></span>
	
	<hr>
	
	<table class="table table-default">
		<thead>
			<tr>
				<th>Product</th>
				<th>Box</th>
				<th>No. of Box ordered</th>
				<th>No. of Packs ordered</th>
				<th>No of Box Returned</th>
				<th>No of Packs Returned</th>
			</tr>
		</thead>
		<tbody>
			@foreach($orderItems as $orderItem)
				<tr>
					<td>{{ $orderItem->product->name }}</td>
					<td>
						{{ $orderItem->box->size }}
						<input name="box_id[]" type="hidden" 
							   value="{{ $orderItem->box->id }}">
					</td>
					<td>{{ $orderItem->no_of_box }}</td>
					<td>{{ $orderItem->no_of_packs }}</td>
					<td>
						<input name="no_of_box[]" type="number" 
							   class="form-control" min="0">
					</td>
					<td>
						<input name="no_of_packs[]" type="number" 
							   class="form-control" min="0">
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	
	<div class="form-group col-sm-12 text-right">
		{!! Form::submit( 'Save', [ 'class' => 'btn btn-success' ] ) !!}
	</div>

	{!! Form::close() !!}
	
</div>

@endsection
