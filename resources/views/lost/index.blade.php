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
					<th>Total Amount</th>
					<th></th>
				</tr>
			</thead>
		</table>
	</div>

	<hr>
	
</div>

@endsection