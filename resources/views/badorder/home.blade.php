@extends('app')
 
@section('inventory') active @endsection

@section('title') TGM - Bad Orders @endsection

@section('content')

<div class="container">
	<div class="page-header">
		<h1>Bad Orders</h1>
	</div>
	
	<table class="table table-default">
		<thead>
			<tr>
				<th>No</th>
				<th>Date</th>
				<th>Total Amount</th>
			</tr>
		</thead>
		<tbody>
			@foreach($bad_orders as $bad_order)			
				<tr>
					<td>
						<a href="{{ action('BadOrderController@show', 
						$bad_order->id) }}">
							{{ str_pad($bad_order->id, 4, 0, STR_PAD_LEFT) }}
						</a>
					</td>
					<td>{{ $bad_order->date }}</td>
					<td>{{ $bad_order->badOrderItems->sum('amount') }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>

@endsection