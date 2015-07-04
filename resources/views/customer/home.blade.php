@extends('app')

@section('customer') active @endsection

@section('title') TGM - Customers @endsection

@section('content')

<div class="container">

	<div class="page-header">
		<h1>Customers</h1>
	</div>

	<div class="table-responsive">
		<table class="table table-default">
			<thead>
				<tr>
					<th>Name</th>
					<th>Address</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($customers as $customer)
					<tr>
						<td>
							<a href="{{ action('CustomerController@show', 
								$customer->id) }}">
								{{ $customer->name }}
							</a>
						</td>
						<td>{{ $customer->address }}</td>
						<td class="text-right">
							<a href="{{ action('CustomerController@edit', 
								$customer->id) }}" 
								class="btn btn-info btn-sm">
								<span class="glyphicon glyphicon-edit"></span>
							</a>

							<a href="{{ action('CustomerController@delete', 
								$customer->id) }}" 
								class="btn btn-danger btn-sm">
								<span class="glyphicon glyphicon-trash"></span>
							</a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>

</div>

@endsection