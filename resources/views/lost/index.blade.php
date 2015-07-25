@extends('app')

@section('inventory') active @endsection

@section('title') Lost Items @endsection

@section('content')

<div class="container">

	<div class="page-header">
		<h1>Lost Items</h1>		
	</div>

	<div class="table-responsive" style="min-height: 360px">
		<table class="table table-default">
			<thead>
				<tr>
					<th>No</th>
					<th>Date</th>
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
								{{ str_pad($lost->id, 4, 0, STR_PAD_LEFT) }}
							</a>
						</td>
						<td>{{ $lost->date }}</td>
						<td>{{ $lost->checked_by }}</td>
						<td>{{ $lost->lostItems->sum('amount') }}</td>
						<td>
							<a href="{{ '/lost/item/delete/' . $lost->id }}">Delete</a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>

	</div>

		<p class="text-right">
			<strong>Total Amount Lost: </strong>
			{{ $totalAmount }}
		</p>
	<hr>
	
</div>

@endsection