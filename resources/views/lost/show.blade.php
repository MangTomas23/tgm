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
		
		<div id="print-area">

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
							<th class="text-right">Amount</th>
						</tr>
					</thead>
					<tbody>
							@foreach($lostItems as $lostItem)
								<tr>
									<td>{{ $lostItem->product->name }}</td>
									<td>
										{{ $lostItem->no_of_box . ' Box, ' . 
										$lostItem->no_of_packs . ' Packs' }}
									</td>
									<td class="text-right currency">
										{{ $lostItem->amount }}
									</td>
								</tr>
							@endforeach							
					</tbody>
				</table>
			</div>

			<hr>

			<p class="text-right">
				<strong>Total Amount: </strong>
				<span class="currency">
					{{ $lostItems->sum('amount') }}
				</span>
			</p>

		</div>
	</div>

	<script>
		$(document).ready( function() {
			$("#btn-print").click( function() {
				$("#print-area").print();
			});

			$.each($(".currency"), function() {
				$(this).digits();
			});
		});
	</script>

@endsection