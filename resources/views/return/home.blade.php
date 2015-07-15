@extends('app')

@section('inventory') active @endsection

@section('title') TGM -  @endsection

@section('content')

<div class="container">
	
	<div class="page-header">
		<h1>Returns</h1>
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
			@foreach($returns as $return)
				<tr>
					<td>
						<a href="{{ action('ReturnController@show', 
						$return->id) }}">
							{{ str_pad($return->id, 4, 0, STR_PAD_LEFT) }}
						</a>
					</td>
					<td>
						{{ $return->date }}
					</td>
					<td>
						{{ $return->returnItems->sum('amount') }}
					</td>
					<td>
						<a href="{{ action('ReturnController@delete', 
							$return->id) }}" class="btn btn-danger btn-sm" 
							title="Delete">
							<span class="glyphicon glyphicon-remove"></span>
						</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

</div>

@endsection