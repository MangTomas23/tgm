@extends('app')

@section('inventory') active @endsection

@section('title') TGM - Bad Order @endsection

@section('content')

<div class="container">

	<div class="text-right">
		<a id="btn-print" class="btn btn-default">
			<span class="glyphicon glyphicon-print"></span>
		</a>
	</div>

	<div id="print-area">
		<div class="text-center">
			<h4>Tradeal General Merchandise</h4>
			<p>Smart # 09199980311 / Globe # 09173179285</p>
			<h4>RETURN OF BAD ORDER</h4>
		</div>

		<div>
			<p>
				<strong>Date: </strong>
				<span>{{ $bad_order->date }}</span>

				<span class="pull-right">
					<strong>No: </strong>
					<span>{{ str_pad($bad_order->id, 4, 0,
						STR_PAD_LEFT) }}</span>
				</span>
			</p>
			<p>
				<strong>Truck #:</strong> 
				<span>{{ $bad_order->truck_no }}</span>
			</p>
		</div>

		<div class="table-responsive" style="min-height: 360px">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Product</th>
						<th>Quantity</th>
						<th class="text-right">Amount</th>
						<th class="hidden-print"></th>
					</tr>					
				</thead>
				<tbody id="p-table">

				</tbody>
			</table>
		</div>

		<hr>

		<p class="text-right">
			<strong>Total Amount: </strong>			
			<span id="p-total_amount">0.00</span>
		</p>

		<p>
			<strong>Received by: </strong>
			<span>{{ $bad_order->received_by }}</span>
		</p>
		<p>
			<strong>Salesman: </strong>
			<span>
				{{ $bad_order->employee->firstname .
				' ' . $bad_order->employee->lastname }}
			</span>
		</p>

	</div>
	
</div>

<script type="text/javascript">
	
	$(document).ready( function() {

		$("#btn-print").click( function() {
			$("#print-area").print();
		});

	});

</script>

@endsection

