@extends('app')

@section('inventory') active @endsection

@section('title') TGM - Orders @endsection

@section('content')

<div class="container">
	<div class="page-header">
		<h1>Orders</h1>
	</div>
	<table class="table table-default">
		<thead>
			<tr>
				<th>Order No.</th>
				<th>Type</th>
				<th>Date</th>
				<th>Customer</th>
				<th>Total Amount</th>
			</tr>
		</thead>
		<tbody>
			@foreach($orders as $order)
				<tr>
					<td><a href="{{ action('OrderController@show', $order->id) }}">{{ str_pad($order->id, 4, 0, STR_PAD_LEFT) }}</a></td>
					<td>{{ $order->type }}</td>
					<td>{{ $order->date }}</td>
					<td>{{ $order->customer->name }}</td>
					<td>P {{ $order->totalAmount($order->id) }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>

@endsection
