@extends('app')

@section('customers') active @endsection

@section('title') TGM @endsection

@section('content')

<div class="container">

	<div class="page-header">
		<h1>{{ $customer->name }} - Orders</h1>
	</div>

	<table class="table table-default">
		<thead>
			<tr>
				<th>Order No.</th>
				<th>Date</th>
				<th>Quantity</th>
				<th class="text-right">Total Amount</th>
			</tr>
		</thead>
		<tbody>
			@foreach($orders as $order)
				<tr>
					<td>
						<a href="{{ action('OrderController@show', 
							$order->id) }}">
							{{ str_pad($order->id, 4, 0, STR_PAD_LEFT) }}
						</a>
					</td>
					<td>
							{{ $order->date }}
					</td>
					<td>
						{{ $order->orderItems->sum('no_of_box') }} Box, 
						{{ $order->orderItems->sum('no_of_packs') }} Packs
					</td>
					<td class="text-right currency">
						{{ $order->orderItems->sum('amount') }}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

</div>

@endsection