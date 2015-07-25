@extends('app')

@section('inventory') active @endsection

@section('title') Lost Items @endsection

@section('content')

<div class="container">

	<div class="page-header">
		<h1>Lost Items</h1>		
	</div>

	<div class="table-responsive">
		<table class="table table-default">
			<thead>
				<tr>
					<th>Date</th>
					<th>Quantity</th>
					<th>Checked by</th>
					<th>Total Amount</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($losts as $lost)
					<tr>
						<td>
							<a href="{{ '/lost/item/' . $lost->id }}">
								{{ str_pad($lost->id, 4, 0, STR_PAD_LEFT) }}</td>
							</a>
						<td>{{ $lost->date }}</td>
						<td>{{ $lost->checked_by }}</td>
						<td>0.00</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>

	<hr>
	
</div>

@endsection