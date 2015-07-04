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
				<th>Date</th>
			</tr>
		</thead>
		<tbody>
			@foreach($orders as $order)
				<tr>
					<td>
						<a href="{{ action('OrderController@show', $order->id) }}">
							{{ $order->date }}
						</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

</div>

@endsection