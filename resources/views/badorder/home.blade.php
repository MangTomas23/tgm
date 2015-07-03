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
				<th>Order No</th>
				<th>Date</th>
			</tr>
		</thead>
	</table>
</div>

@endsection