@extends('app')

@section('inventory') active @endsection

@section('title') TGM - Returns @endsection

@section('content')

<div class="container">
	<div class="text-right">
		<a id="btn-print" class="btn btn-default">
			<span class="glyphicon glyphicon-print"></span>
		</a>
	</div>

	<hr>

	{!! Form::open([ 'url' => '/return/store']) !!}
	<div id="print-area">	
		<p>
			<strong>Returned Stocks</strong>

			<span class="pull-right">
				<strong>No: </strong>
				<span id="p-no">
					{{ str_pad($return->id, 4, 0, STR_PAD_LEFT) }}
				</span>
			</span>
		</p>

		<div class="text-center">
			<h2>Tradeal General Merchandise</h2>
			<p>Smart # 09199980311 / Globe # 09173179285</p>
			<h4>RETURNED STOCKS REPORT</h4>	
		</div>

		<p>
			<strong>Customer: </strong>
			<span id="p-customer">
				{{ $return->customer->name }}
			</span>

			<span class="pull-right">
				<strong>Date: </strong>
				<span id="p-date">
					{{ $return->date }}
				</span>
			</span>
		</p>

		<p>
			<strong>Address: </strong>
			<span id="p-address">
				{{ $return->customer->address }}
			</span>

			<span class="pull-right">
				<strong>Ref no: </strong>
				<span id="p-ref_no">
					{{ $return->reference_no }}
				</span>
			</span>
		</p>

		<div class="table-responsive" style="min-height: 360px">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Product</th>
						<th>Quantity</th>
						<th>Amount</th>
						<th class="hidden-print"></th>
					</tr>
				</thead>
				<tbody id="p-table">

				</tbody>
			</table>
		</div>

		<p class="text-right">
			<strong>Total Amount: </strong>
			<span id="p-totalamount"></span>
		</p>

		<hr>

		<p class="text-center">
			I hereby certify the above statement or 
			figure are true and correct.
		</p>

		<p>
			<strong>Salesman: </strong>
			<span id="p-salesman">
				{{ $return->employee->firstname . ' ' .
					$return->employee->lastname }}
			</span>

			<span class="pull-right">
				<strong>Area: </strong>
				<span id="p-area">
					{{ $return->area }}
				</span>
			</span>
		</p>

		<p>
			<strong>Received by: </strong>
			<span id="p-received_by">
				{{ $return->received_by }}
			</span>

			<span class="pull-right">
				<strong>Checked by: </strong>
				<span id="p-checked_by">
					{{ $return->checked_by }}
				</span>
			</span>
		</p>

	</div>
</div>

@endsection