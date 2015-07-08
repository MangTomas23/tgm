@extends('app')

@section('inventory') active @endsection

@section('title') TGM - Bad Order @endsection

@section('content')

<div class="container">
	<div class="print-area">
		<div class="text-center">
			<h4>Tradeal General Merchandise</h4>
			<p>Smart # 09199980311 / Globe # 09173179285</p>
			<h4>RETURN OF BAD ORDER</h4>
		</div>

		<div>
			<p>Date: </p>
			<p>Truck #: </p>
		</div>

		<div class="table-responsive" style="min-height: 360px">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Product</th>
						<th>Quantity</th>
					</tr>					
				</thead>
				<tbody>

				</tbody>
			</table>
		</div>
	</div>

	<hr>

	<div class="page-header">
		<h2>Bad Orders</h2>
	</div>

	<!-- Form -->

	<div class="form-group col-sm-6">
		<label>Truck #</label>
		<input type="text" class="form-control" required>
	</div>

	<div class="form-group col-sm-6">
		<label>Date</label>
		<input type="date" class="form-control" required>
	</div>

	<div class="form-group col-sm-6">
		<label>Received by</label>
		<input type="text" class="form-control" required>
	</div>

	<div class="form-group col-sm-6">
		<label>Salesman</label>
		<select name="salesman" class="form-control">
			
		</select>
	</div>

	<!-- End Form -->
</div>

@endsection