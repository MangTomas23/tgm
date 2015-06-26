@extends('app')

@section('inventory') active @endsection

@section('title') TGM - In Stock @endsection

@section('content')

<div class="container">
	<div class="page-header">
		<h1>{{ $date }}</h1>
	</div>
	<table class="table table-default">
		<thead>
			<tr>
				<th>Product</th>
				<th>Box</th>
				<th>Quantity</th>
				<th>Amount</th>
			</tr>
		</thead>
		<tbody>
			@foreach($instocks as $instock)
				<tr>
					<td>{{ $instock->product->name }}</td>
					<td>{{ $instock->box->size }}</td>
					<td>{{ $instock->quantity }}</td>
					<td>{{ $instock->amount }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>

@endsection