@extends('app')

@section('inventory') active @endsection

@section('content')

	<div class="container">
		<div class="text-right">
			<a id="btn-print" class="btn btn-default">
				<span class="glyphicon glyphicon-print"></span>
			</a>
		</div>

		<hr>
		
		<div class="print-area">

			<div class="text-center">
				<h2>Tradeal General Merchandise</h2>
				<p>Smart # 09199980311 / Globe # 09173179285</p>
				<h3>Report Lost Item</h3>
			</div>

			<p>
				<strong>Date: </strong>
				<span>{{ $lost->date }}</span>

				<span class="pull-right">
					<strong>No: </strong>
					<span>{{ str_pad($lost->id, 4, 0, STR_PAD_LEFT) }}</span>
				</span>
			</p>
			
			<p>
				<strong>Checked by: </strong>
				{{ $lost->checked_by }}
			</p>

			<div class="table-responsive" style="min-height: 360px">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Product</th>
							<th>Quantity</th>
							<th>Amount</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						
					</tbody>
				</table>
			</div>

			<hr>

			<p class="text-right">
				<strong>Total Amount: </strong>
			</p>

		</div>
	</div>

@endsection