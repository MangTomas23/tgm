@extends('app')

@section('inventory') active @endsection

@section('title') TGM - Returns @endsection

@section('content')

<div class="container">

	<div class="page-header">
		<h1>Returns</h1>
	</div>

	<table class="table table-default">
		<thead>
			<tr>
				<th>Order No</th>
				<th>Date</th>
			</tr>
		</thead>
		<tbody>
			@foreach($returns as $return)
				<tr>
					<td>
						<a href="{{ action( 'ReturnController@show', $return->id ) }}">
						{{ str_pad( $return->order_id, 4, 0, STR_PAD_LEFT ) }}
						</a>
					</td>
					<td>{{ $return->date }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	
</div>

@endsection

